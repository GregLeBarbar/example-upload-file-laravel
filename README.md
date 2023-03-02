# Exemple de mini-application Laravel

Cette mini-application a un formulaire permettant à l'utilisateur d'uploader une image et de la sauvegarder en base de données.

## Dans quel répertoire est stocké l'image ?

L'image est stockée dans /storage/app/public/images/

Pour l'afficher, il faut créer un créer lien symbolique grâce à la commande :

`php artisan storage:link`

Grâce à cela, les images sont aussi présentes sous /public/storage/images
et on peut alors les afficher

## Installation

dans le .env

DB_CONNECTION=sqlite
DB_DATABASE=\absolute\path\to\database.sqlite
DB_FOREIGN_KEYS=true

php artisan migrate

php artisan serve
