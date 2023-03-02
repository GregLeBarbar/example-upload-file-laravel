# Exemple de mini-application Laravel

Cette mini-application a un formulaire permettant à l'utilisateur d'uploader une image et de la sauvegarder en base de données.

## Dans quel répertoire est stocké l'image ?

L'image est stockée dans /storage/app/public/images/

Pour l'afficher, il faut créer un créer lien symbolique grâce à la commande :

`php artisan storage:link`

Grâce à cela, les images sont aussi présentes sous /public/storage/images
et on peut alors les afficher

## Installation

Prerequis :

-   php > 8.1,
-   composer 2.5.4

Il faut installer les dépendances php :

`composer install`

Puis créer le fichier database.sqlite :

`touch database/database.sqlite`

Renommer le .env.example en `.env` et modifier les configurations suivantes :

```
DB_CONNECTION=sqlite
DB_DATABASE=\absolute\path\to\database.sqlite
DB_FOREIGN_KEYS=true
```

Puis générer une KEY

`php artisan key:generate`

Puis lancer les migrations

`php artisan migrate`

Puis créer un créer lien symbolique pour les images

`php artisan storage:link`

Puis lancer le serveur

`php artisan serve`

et ouvrir le navigateur http://localhost:8000/
