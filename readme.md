Laravel Test
========

Micro app => "Contact"

# Installation
* Créer une base de données "laravel_test" dans votre MySQL.

* Cloner le projet dans votre répertoire de travail
```
https://github.com/AyouBourichi/Laravel.git
```
* Installer les dépendances
```
 npm install
 npm run dev
```
* Initialiser la base de données

```
php artisan migrate
php artisan db:seed --class=ContactsSeederTable
```

* Lancer le serveur
```
php artisan serv
```

Vous pouvez maintenant accéder à l'application à l'adresse http://localhost:8000

Si vous avez des problèmes contactez-moi à l'adresse mail suivante: ayoubourichi@gmail.com
