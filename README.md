# Projet Web - Site Fenerbahçe Spor Kulübü

## Description
Ce projet est un site web dédié au club **Fenerbahçe Spor Kulübü**.  
Il présente l'effectif officiel, les résultats récents, les classements, et propose aux utilisateurs de **suggérer de nouveaux joueurs** via un formulaire interactif.

Le site est **bilingue** (Français / Anglais) et entièrement **responsive** (ordinateur, tablette, mobile).

---

## Fonctionnalités principales

- 🔵 **Affichage des joueurs** (effectif officiel + suggestions fans)
- 🔵 **Formulaire GET** : Recherche de joueurs dans l'effectif
- 🔵 **Formulaire POST** : Proposition de nouveaux joueurs
- 🔵 **Validation des formulaires** côté **JS et PHP**
- 🔵 **Upload d'image sécurisé** pour les joueurs suggérés
- 🔵 **AJAX** pour la recherche dynamique (sans rechargement)
- 🔵 **Protection** contre les **injections SQL** et la **faille XSS**
- 🔵 **Support multilingue** : Français 🇫🇷 et Anglais 🇬🇧
- 🔵 **Responsive Design** (Mobile/Ordinateur)
- 🔵 **Gestion via PDO + SQLite** pour la base de données

---

## Structure du projet
```
├── index.php 
├── matches.php 
├── players.php 
├── player.php 
├── suggest.php 
├── suggested-player.php 
├── full-ranking.php 
├── assets/ 
├── CSS/
│   └── styles.css
|   └── fenerbahce.jpeg
│
├── JS/
│   └── player.js
│
├── PHP/
│   ├── Database.php
│   ├── lang.php
│   ├── lang/
│   │   ├── en.php
│   │   └── fr.php
│   ├── header.php
│   ├── footer.php
│   ├── api/
│   │   └── search_players.php
│   └── database.db
│
├── images/
│   └── (logos, joueurs officiels)
│
└── uploads/
    └── (photos joueurs suggérés)
```


## Technologies utilisées

- PHP (PDO + SQLite)
- HTML5 / CSS
- JavaScript (AJAX avec Fetch)
- SQLite3 pour la base de données

## Analyse Critères OFFICIELS du Projet

| N° | Critère | Status | Où dans le projet |
|:--:|:--------|:------:|:------------------|
| 1 | AJAX client (fetch, créer dynamiquement HTML) | ✅ | `players.php` → `fetch()` vers `search_players.php`, création dynamique des cartes joueurs |
| 2 | AJAX serveur (API PHP) | ✅ | `assets/PHP/api/search_players.php` (reçoit requête AJAX et retourne JSON) |
| 3 | Extraction de données en BdD | ✅ | `Database.php`, méthodes `getPlayers()`, `getSuggestedPlayers()` |
| 4 | Formulaire et HTML corrects | ✅ | `suggest.php` (`<form>`, `<input type="text">`, `<input type="file">`, etc.) |
| 5 | Formulaires fonctionnels (GET + POST + validation JS) | ✅ | Formulaire GET : `players.php` <br> Formulaire POST : `suggest.php` |
| 6 | Inclusions éléments redondants (`header.php`, `footer.php`) | ✅ | `include_once 'assets/PHP/header.php';` et `footer.php` inclus sur toutes les pages |
| 7 | Insertion en BdD (PDO + SQL) | ✅ | `suggest.php`, insertion dans la table `suggested_players` |
| 8 | Données projet fournies | ✅ | Base `database.db` fournie + mention dans le `README.md` |
| 9 | Éléments HTML pertinents | ✅ | Balises appropriées (`<section>`, `<header>`, `<main>`, etc.) |
| 10 | Protection contre injection SQL (prepare/bind) | ✅ | Utilisation de `prepare()` et `execute()` (`Database.php`, `suggest.php`) |
| 11 | Protection contre XSS | ✅ | Utilisation de `htmlspecialchars()` dans `players.php`, `player.php`, etc. |
| 12 | Respect architecture projet | ✅ | Structure propre (`assets/`, `CSS/`, `JS/`, `PHP/`, `uploads/`, etc.) |
| 13 | Respect règles accessibilité (alt images, labels) | ✅| `alt` les fichiers lang.php  |
| 14 | Responsive design | ✅ | `assets/CSS/styles.css`, media queries utilisées pour tablette/mobile |
| 15 | Système de traduction | ✅ | `assets/PHP/lang.php` + `lang/fr.php`, `lang/en.php` |
| 16 | Tous éléments HTML obligatoires | ✅ | Doctype, `<html lang>`, `<meta charset>`, etc., présents partout |
| 17 | Utilisation balises HTML nommées | ✅ | Usage correct de `<header>`, `<footer>`, `<section>`, `<main>` |
| 18 | Utilisation de classes PHP (OOP) | ✅ | `Database.php` sous forme de classe (`getInstance()`) |
| 19 | Utilisation de PDO | ✅ | Connexion à la base de données via PDO |
| 20 | Sélecteurs CSS pertinents | ✅ | `styles.css` : bonnes pratiques, peu de `#id` inutiles |
| 21 | Vérification des données avant envoi (JS) | ✅ | Validation JavaScript dans `suggest.php` |
| 22 | Vérification des données en PHP (server side) | ✅ | Validation serveur dans `suggest.php` (`try-catch`, regex, contrôle des tailles, etc.) |

---

## Remarque

- Le fichier **database.db** est fourni avec le projet.
- Les images uploadées par les utilisateurs sont stockées dans `/assets/uploads/`.

## Lancer le projet en local

### Prérequis

- PHP installé
- Extension SQLite activée (`pdo_sqlite`)
- Navigateur web

### Installation SQLite (Ubuntu / Debian)

```bash
sudo apt install php-sqlite3
```

### Lancer le serveur local

Depuis le dossier du projet :

```bash
php -S localhost:8000
```

Puis ouvrir dans le navigateur :

```text
http://localhost:8000
```

---

## Aperçu du site

### Accueil

![Accueil](assets/README/page1.png)

### Page joueurs

![Joueurs](assets/README/page1.png)

### Suggerer un joueur

![Suggestion](assets/README/page3.png)


##  Auteur

> Réalisé par SERTOGLU Müttaki 

