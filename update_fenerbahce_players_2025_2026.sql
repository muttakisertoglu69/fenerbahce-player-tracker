-- Mise à jour effectif Fenerbahçe 2025/2026
-- Source principale : Transfermarkt, effectif détaillé 25/26.
-- Important : les images doivent être ajoutées dans assets/images/ avec les noms ci-dessous.
-- Les buts/passes sont mis à 0 ici pour éviter de mettre de fausses statistiques.

DELETE FROM players;

INSERT INTO players (name, nationality, age, goals, assists, numero, picture) VALUES
('Ederson', 'Brésil', 32, 0, 0, 31, 'ederson.jpg'),
('Mert Günok', 'Turquie', 37, 0, 0, 34, 'mert-gunok.jpg'),
('Tarık Çetin', 'Turquie', 29, 0, 0, 13, 'tarik-cetin.jpg'),
('Engin Can Biterge', 'Turquie', 19, 0, 0, 39, 'engin-can-biterge.jpg'),
('Milan Škriniar', 'Slovaquie', 31, 0, 0, 37, 'milan-skriniar.jpg'),
('Çağlar Söyüncü', 'Turquie', 29, 0, 0, 4, 'caglar-soyuncu.jpg'),
('Jayden Oosterwolde', 'Pays-Bas', 25, 0, 0, 24, 'jayden-oosterwolde.jpg'),
('Yiğit Efe Demir', 'Turquie', 21, 0, 0, 14, 'yigit-efe-demir.jpg'),
('Kamil Efe Üregen', 'Turquie', 18, 0, 0, 67, 'kamil-efe-uregen.jpg'),
('Archie Brown', 'Angleterre', 23, 0, 0, 3, 'archie-brown.jpg'),
('Levent Mercan', 'Turquie', 25, 0, 0, 22, 'levent-mercan.jpg'),
('Mert Müldür', 'Turquie', 27, 0, 0, 18, 'mert-muldur.jpg'),
('Nélson Semedo', 'Portugal', 32, 0, 0, 27, 'nelson-semedo.jpg'),
('Edson Álvarez', 'Mexique', 28, 0, 0, 11, 'edson-alvarez.jpg'),
('İsmail Yüksek', 'Turquie', 27, 0, 0, 5, 'ismail-yuksek.jpg'),
('N''Golo Kanté', 'France', 35, 0, 0, 17, 'ngolo-kante.jpg'),
('Mattéo Guendouzi', 'France', 27, 0, 0, 6, 'matteo-guendouzi.jpg'),
('Fred', 'Brésil', 33, 0, 0, 7, 'fred.jpg'),
('Abdou Aziz Fall', 'Sénégal', 19, 0, 0, 60, 'abdou-aziz-fall.jpg'),
('Marco Asensio', 'Espagne', 30, 0, 0, 21, 'marco-asensio.jpg'),
('Talisca', 'Brésil', 32, 0, 0, 94, 'talisca.jpg'),
('Mert Hakan Yandaş', 'Turquie', 31, 0, 0, 8, 'mert-hakan-yandas.jpg'),
('Kerem Aktürkoğlu', 'Turquie', 27, 0, 0, 9, 'kerem-akturkoglu.jpg'),
('Oğuz Aydın', 'Turquie', 25, 0, 0, 70, 'aydin.jpg'),
('Dorgeles Nene', 'Mali', 23, 0, 0, 45, 'dorgeles-nene.jpg'),
('Anthony Musaba', 'Pays-Bas', 25, 0, 0, 20, 'anthony-musaba.jpg'),
('Emre Mor', 'Turquie', 28, 0, 0, 0, 'emre-mor.jpg'),
('Sidiki Chérif', 'Guinée', 19, 0, 0, 26, 'sidiki-cherif.jpg');
