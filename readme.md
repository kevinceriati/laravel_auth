# Mini Projet Authentication avec Laravel

## Installation 

```
git clone git@github.com:le-campus-numerique/PHP_LARAVEL_AUTH.git
cd PHP_LARAVEL_AUTH
composer install
```

## ✍️ Configuration

### Fichier `.env`
```
cp .env.example .env
php artisan key:generate
```

### 🎒 Base de données 

* Créer une base de données vide via phpMyAdmin
* Mettre à jours les informations de BDD en conséquence dans le fichier `.env`

````
DB_DATABASE=laravel_auth
DB_USERNAME=root
DB_PASSWORD=root

````

## 🔚 Finalisation 

* Exécuter les `migrations` pour créer la structure de la BDD

```
 php artisan migrate
```

* Exécuter les `Seeders` pour créer des données dans votre BDD

```
php artisan db:seed
```

* lancer le serveur pour afficher le projet dans votre navigateur

```
php artisan serve
```