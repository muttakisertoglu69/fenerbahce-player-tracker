document.addEventListener("DOMContentLoaded", function() {
    const players = {
        "livakovic": { name: "#40 Dominik Livaković", age: 30, nationality: "Croatie", goals: 0, assists: 0, since: "25 Aoüt 2023", img: "assets/images/livakovic.jpg" },
        "egribayat": { name: "#1 İrfan Can Eğribayat", age: 26, nationality: "Turquie", goals: 0, assists: 0, since: "1 Juillet 2023", img: "assets/images/egribayat.jpg" },
        "skriniar": { name: "#37 Milan Skriniar", age: 30, nationality: "Slovaquie", goals: 0, assists: 0, since: "30 Janvier 2025", img: "assets/images/skriniar.jpg" },
        "carlos": { name: "#33 Diego Carlos", age: 31, nationality: "Brésil", goals: 0, assists: 0, since: "23 Janvier 2025" , img: "assets/images/carlos.jpg"},
        "soyuncu": { name: "#4 Çağlar Söyüncü", age: 28, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/soyuncu.jpg"},
        "djiku": { name: "#6 Alexander Djiku", age: 30, nationality: "Cameroun", goals: 0, assists: 0, since: "2023", img: "assets/images/djiku.jpg" },
        "akcicek": { name: "#95 Yusuf Akçiçek", age: 19, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/akcicek.jpg" },
        "kostic": { name: "#18 Filip Kostić", age: 32, nationality: "Serbie", goals: 0, assists: 0, since: "2023", img: "assets/images/kostic.jpg" },
        "samuel": { name: "#21 Bright Osayi-Samuel", age: 27, nationality: "Nigeria", goals: 0, assists: 0, since: "2023", img: "assets/images/samuel.jpg" },
        "muldur": { name: "#16 Mert Müldür", age: 25, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/muldur.jpg" },
        "amrabat": { name: "#34 Sofyan Amrabat", age: 28, nationality: "Maroc", goals: 0, assists: 0, since: "2023", img: "assets/images/amrabat.jpg" },
        "yuksek": { name: "#5 İsmail Yüksek", age: 26, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/yuksek.jpg" },
        "fred": { name: "#13 Fred", age: 31, nationality: "Brésil", goals: 0, assists: 0, since: "2023", img: "assets/images/fred.jpg" },
        "szymanski": { name: "#53 Sebastian Szymański", age: 25, nationality: "Pologne", goals: 0, assists: 0, since: "2023", img: "assets/images/szymanski.jpg" },
        "talisca": { name: "#94 Anderson Talisca", age: 31, nationality: "Brésil", goals: 0, assists: 0, since: "2023", img: "assets/images/talisca.jpg" },
        "yandas": { name: "#8 Mert Hakan Yandaş", age: 30, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/yandas.jpg" },
        "saint-maximin": { name: "#97 Allan Saint-Maximin", age: 27, nationality: "France", goals: 0, assists: 0, since: "2023", img: "assets/images/maximin.jpg" },
        "aydin": { name: "#70 Oğuz Aydın", age: 24, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/aydin.jpg" },
        "kahveci": { name: "#17 Irfan Can Kahveci", age: 29, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/kahveci.jpg" },
        "tadic": { name: "#10 Dusan Tadic", age: 36, nationality: "Serbie", goals: 0, assists: 0, since: "2023", img: "assets/images/tadic.jpg" },
        "dzeko": { name: "#9 Edin Dzeko", age: 38, nationality: "Bosnie-Herzegovine", goals: 0, assists: 0, since: "2023", img: "assets/images/dzeko.jpg" },
        "enyri": { name: "#19 Youssef En-Nesyri", age: 27, nationality: "Maroc", goals: 0, assists: 0, since: "2023", img: "assets/images/nesyri.jpg" },
        "tosun": { name: "#23 Cenk Tosun", age: 33, nationality: "Turquie", goals: 0, assists: 0, since: "2023", img: "assets/images/tosun.jpg" },
    };

    const params = new URLSearchParams(window.location.search);
    const playerKey = params.get("player");

    console.log("Paramètre récupéré :", playerKey); // Ajout du log
    
    if (playerKey && players[playerKey]) {
        const player = players[playerKey];

        document.getElementById("player-name").textContent = player.name;
        document.getElementById("player-age").textContent = player.age;
        document.getElementById("player-nationality").textContent = player.nationality;
        document.getElementById("player-goals").textContent = player.goals;
        document.getElementById("player-assists").textContent = player.assists;
        document.getElementById("player-since").textContent = player.since;
        document.getElementById("player-image").src = player.img;
    } else {
        document.querySelector(".player-details-card").innerHTML = "<p style='text-align:center; font-size:20px;'>Joueur non trouvé.</p>";}
}); 