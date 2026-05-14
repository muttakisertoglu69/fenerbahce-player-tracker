<?php
class Database {
    private static ?Database $instance = null;
    private PDO $db;
    
    private function __construct()
    {
        $this->db = new PDO('sqlite:' . __DIR__ . '/database.db');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->createTables();
    }
    
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection(): PDO
    {
        return $this->db;
    }
    
    private function createTables()
    {
        // Créer la table des joueurs officiels
        $this->db->exec('CREATE TABLE IF NOT EXISTS players (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(100) NOT NULL,
            nationality VARCHAR(50) NOT NULL,
            age INTEGER NOT NULL,
            goals INTEGER NOT NULL DEFAULT 0,
            assists INTEGER NOT NULL DEFAULT 0,
            numero INTEGER NOT NULL,
            picture VARCHAR(255) NOT NULL
        )');
        
        // Créer la table des joueurs suggérés
        $this->db->exec('CREATE TABLE IF NOT EXISTS suggested_players (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(100) NOT NULL,
            nationality VARCHAR(50) NOT NULL,
            age INTEGER NOT NULL,
            goals INTEGER NOT NULL DEFAULT 0,
            assists INTEGER NOT NULL DEFAULT 0,
            numero INTEGER NOT NULL,
            picture VARCHAR(255) NOT NULL,
            date_added DATETIME DEFAULT CURRENT_TIMESTAMP
        )');
    }
    
    public function getPlayers(): array
    {
        return $this->db->query('SELECT * FROM players ORDER BY id ASC')->fetchAll();
    }
    
    public function getSuggestedPlayers(): array
    {
        return $this->db->query('SELECT * FROM suggested_players ORDER BY id ASC')->fetchAll();
    }
    
    public function getPlayer(int $id): ?array
    {
        $query = $this->db->prepare('SELECT * FROM players WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch() ?: null;
    }
    
    public function getSuggestedPlayer(int $id): ?array
    {
        $query = $this->db->prepare('SELECT * FROM suggested_players WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch() ?: null;
    }
    
    public function deletePlayer(int $id)
    {
        $query = $this->db->prepare('DELETE FROM players WHERE id = ?');
        return $query->execute([$id]);
    }
    
    public function deleteSuggestedPlayer(int $id)
    {
        $query = $this->db->prepare('DELETE FROM suggested_players WHERE id = ?');
        return $query->execute([$id]);
    }
    
    // Méthode pour approuver un joueur suggéré et le déplacer vers les joueurs officiels
    public function approveSuggestedPlayer(int $id)
    {
        // Récupérer les données du joueur suggéré
        $suggestedPlayer = $this->getSuggestedPlayer($id);
        if (!$suggestedPlayer) {
            return false;
        }
        
        // Insérer dans la table des joueurs officiels
        $query = $this->db->prepare('INSERT INTO players (name, nationality, age, goals, assists, numero, picture) 
                                      VALUES (:name, :nationality, :age, :goals, :assists, :numero, :picture)');
        $result = $query->execute([
            ':name' => $suggestedPlayer['name'],
            ':nationality' => $suggestedPlayer['nationality'],
            ':age' => $suggestedPlayer['age'],
            ':goals' => $suggestedPlayer['goals'],
            ':assists' => $suggestedPlayer['assists'],
            ':numero' => $suggestedPlayer['numero'],
            ':picture' => $suggestedPlayer['picture']
        ]);
        
        // Si l'insertion a réussi, supprimer de la table des joueurs suggérés
        if ($result) {
            return $this->deleteSuggestedPlayer($id);
        }
        
        return false;
    }
}
?> 