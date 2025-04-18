
# 🏨 Application Laravel - Mirlana-Motel

## ✅ Prérequis

- PHP 8.x
- Laravel 10.x
- Node.js / npm
- Base de données (MySQL, PostgreSQL…)

---

## 1. 📦 Installation & Authentification

```bash
laravel new hotel-reservation
cd hotel-reservation

composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

---

## 2. 🗃️ Migrations

```bash
php artisan make:migration create_types_table
php artisan make:migration create_chambres_table
php artisan make:migration create_chambre_user_table
```

---

## 3. 🧩 Modèles

```bash
php artisan make:model Type
php artisan make:model Chambre
php artisan make:model Chambre_user
php artisan make:model User
```

---

## 4. 🎮 Contrôleur

```bash
php artisan make:controller ChambreController --resource
```

---

## 5. 🌱 Seeders

```bash
php artisan make:seeder TypeSeeder
php artisan make:seeder ChambreSeeder
php artisan make:seeder UserSeeder
php artisan make:seeder ChambreUserSeeder
```

---

## 6. 🏭 Factories

```bash
php artisan make:factory TypeFactory --model=Type
php artisan make:factory ChambreFactory --model=Chambre
php artisan make:factory UserFactory --model=User
php artisan make:factory ChambreUserFactory --model=ChambreUser
```

---

## 7. 🌐 Routes

Dans `routes/web.php` :

```php
Route::resource('chambres', ChambreController::class);
```

---

## 8. 🧪 Exécution des migrations et seeders

```bash
php artisan migrate
php artisan db:seed
```
