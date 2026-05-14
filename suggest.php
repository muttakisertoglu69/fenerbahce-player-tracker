<?php
// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Multilingue
include_once 'assets/PHP/lang.php';
require_once 'assets/PHP/Database.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $name = $_POST['name'] ?? '';
        $number = $_POST['number'] ?? '';
        $nationality = $_POST['nationality'] ?? '';
        $age = $_POST['age'] ?? '';
        $goals = $_POST['goals'] ?? '';
        $assists = $_POST['assists'] ?? '';

        // Vérifications serveur
        if (strlen($name) > 50) throw new Exception($lang['invalid_name']);
        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/u", $name)) throw new Exception($lang['illegal_characters']);
        if (strlen($nationality) > 100) throw new Exception($lang['invalid_nationality']);
        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/u", $nationality)) throw new Exception($lang['illegal_nationality']);
        if (!is_numeric($age) || $age < 16 || $age > 50) throw new Exception($lang['disable_age']);
        if (!is_numeric($number) || $number < 1 || $number > 99) throw new Exception($lang['disable_numbers']);
        if (!is_numeric($goals) || $goals < 0) throw new Exception($lang['invalid_goals']);
        if (!is_numeric($assists) || $assists < 0) throw new Exception($lang['invalid_assists']);

        // Image
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'assets/uploads/';
            $imageName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $imageName;

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
            $allowed = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($mime, $allowed)) throw new Exception($lang['error_image_type']);

            if ($_FILES['image']['size'] > 2 * 1024 * 1024) throw new Exception($lang['max_volum_image']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $db = Database::getInstance();
                $query = "INSERT INTO suggested_players (name, nationality, age, goals, assists, numero, picture)
                          VALUES (:name, :nationality, :age, :goals, :assists, :number, :picture)";
                $stmt = $db->getConnection()->prepare($query);
                $stmt->execute([
                    ':name' => $name,
                    ':nationality' => $nationality,
                    ':age' => $age,
                    ':goals' => $goals,
                    ':assists' => $assists,
                    ':number' => $number,
                    ':picture' => $imageName
                ]);

                $message = $stmt->rowCount() > 0 ? $lang['confirm_player'] : $lang['error_player'];
            } else {
                $message = $lang['error_image'];
            }
        } else {
            $message = $lang['error_upload'];
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenerbahçe - <?php echo $lang['suggest_title']; ?></title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>
<?php include_once 'assets/PHP/header.php'; ?>
<main>
    <section class="suggest-form">
        <h2><?php echo $lang['suggest_player']; ?></h2>
        <form id="suggestForm" action="suggest.php" method="post" enctype="multipart/form-data">
            <label for="name"><?php echo $lang['player_name']; ?></label>
            <input type="text" id="name" name="name" >

            <label for="number"><?php echo $lang['player_number']; ?></label>
            <input type="text" id="number" name="number" >

            <label for="nationality"><?php echo $lang['player_nationality']; ?></label>
            <input type="text" id="nationality" name="nationality" >

            <label for="age"><?php echo $lang['player_age']; ?></label>
            <input type="text" id="age" name="age" >

            <label for="goals"><?php echo $lang['player_goals']; ?></label>
            <input type="text" id="goals" name="goals" >

            <label for="assists"><?php echo $lang['player_assists']; ?></label>
            <input type="text" id="assists" name="assists" >

            <label for="image"><?php echo $lang['player_image']; ?></label>
            <input type="file" id="image" name="image" >

            <button type="submit"><?php echo $lang['submit']; ?></button>
        </form>
    </section>

    <?php if ($message): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            showToast(`<?php echo addslashes($message); ?>`);
        });
    </script>
    <?php endif; ?>
</main>
<div id="toast" class="toast hidden"></div>
<?php include_once 'assets/PHP/footer.php'; ?>

<script>
// Transfert des textes en JS dynamiquement
const langMessages = {
    illegal_characters: "<?php echo addslashes($lang['illegal_characters']); ?>",
    invalid_name: "<?php echo addslashes($lang['invalid_name']); ?>",
    disable_numbers: "<?php echo addslashes($lang['disable_numbers']); ?>",
    illegal_nationality: "<?php echo addslashes($lang['illegal_nationality']); ?>",
    invalid_nationality: "<?php echo addslashes($lang['invalid_nationality']); ?>",
    invalid_age: "<?php echo addslashes($lang['invalid_age'] ?? 'Invalid age (16-50 years)'); ?>",
    disable_age: "<?php echo addslashes($lang['disable_age']); ?>",
    invalid_goals: "<?php echo addslashes($lang['invalid_goals']); ?>",
    invalid_assists: "<?php echo addslashes($lang['invalid_assists']); ?>",
    error_image_type: "<?php echo addslashes($lang['error_image_type']); ?>",
    max_volum_image: "<?php echo addslashes($lang['max_volum_image']); ?>"
};

// Validation du formulaire en JS
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    toast.className = `toast show ${type}`;
    toast.textContent = message;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 500);
    }, 4000);
}

// Validation JS formulaire

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('suggestForm').addEventListener('submit', function (e) {
        let isValid = true;

        const name = document.querySelector('input[name="name"]');
        const number = document.querySelector('input[name="number"]');
        const nationality = document.querySelector('input[name="nationality"]');
        const age = document.querySelector('input[name="age"]');
        const goals = document.querySelector('input[name="goals"]');
        const assists = document.querySelector('input[name="assists"]');
        const image = document.querySelector('input[name="image"]');

        const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;

        function showError(input, message) {
            let errorSpan = input.nextElementSibling;
            if (!errorSpan || !errorSpan.classList.contains('error-message')) {
                errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message');
                input.parentNode.insertBefore(errorSpan, input.nextSibling);
            }
            errorSpan.textContent = message;
            input.classList.add('error');
        }

        function clearError(input) {
            let errorSpan = input.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains('error-message')) {
                errorSpan.remove();
            }
            input.classList.remove('error');
        }

        if (!name.value.trim().match(nameRegex)) {
            showError(name, langMessages.illegal_characters);
            isValid = false;
        } else if (name.value.length > 50) {
            showError(name, langMessages.invalid_name);
            isValid = false;
        } else {
            clearError(name);
        }

        if (!/^[0-9]+$/.test(number.value) || number.value < 1 || number.value > 99) {
            showError(number, langMessages.disable_numbers);
            isValid = false;
        } else {
            clearError(number);
        }

        if (!nationality.value.trim().match(nameRegex)) {
            showError(nationality, langMessages.illegal_nationality);
            isValid = false;
        } else if (nationality.value.length > 100) {
            showError(nationality, langMessages.invalid_nationality);
            isValid = false;
        } else {
            clearError(nationality);
        }

        if (!/^[0-9]+$/.test(age.value)) {
            showError(age, langMessages.invalid_age);
            isValid = false;
        } else if (age.value < 16 || age.value > 50) {
            showError(age, langMessages.disable_age);
            isValid = false;
        } else {
            clearError(age);
        }

        if (!/^[0-9]+$/.test(goals.value)) {
            showError(goals, langMessages.invalid_goals);
            isValid = false;
        } else {
            clearError(goals);
        }

        if (!/^[0-9]+$/.test(assists.value)) {
            showError(assists, langMessages.invalid_assists);
            isValid = false;
        } else {
            clearError(assists);
        }

        if (image.files.length > 0) {
            const file = image.files[0];
            const validTypes = ["image/jpeg", "image/png", "image/gif"];
            if (!validTypes.includes(file.type)) {
                showError(image, langMessages.error_image_type);
                isValid = false;
            } else if (file.size > 2 * 1024 * 1024) {
                showError(image, langMessages.max_volum_image);
                isValid = false;
            } else {
                clearError(image);
            }
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>
</body>
</html>
