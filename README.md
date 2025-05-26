# projet 3legant

**3legant** est une application web e-commerce moderne dédiée à la vente de meubles.  
Ce projet fullstack combine **Laravel** pour le backend (API sécurisée, authentification, policies, CRUD) et **Vue.js** pour le frontend (Vue Router, Pinia).

---

## ⚙️ Fonctionnalités

### Backend (Laravel)

- Authentification via Laravel Sanctum
- Enregistrement et gestion des utilisateurs
- CRUD des produits immobiliers
- Validation robuste des données
- Gestion des images (upload)
- API REST sécurisée
- Filtres et recherche des produits

### Frontend (Vue.js)

- Interface utilisateur moderne
- Vue Router pour la navigation
- Pinia pour la gestion d’état globale
- Authentification (login / register)
- Affichage de la liste des produits
- Détails d’un produit
- Ajout de produits (pour les admins)

---

## 🚀 Installation

### Prérequis

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- NPM ou Yarn
- SQLite
- Laravel installer

---

### Étapes d'installation

#### 1. Cloner le projet

```bash
git clone https://github.com/votre-utilisateur/3legant.git
cd 3legant
```
---

#### 2. Configuration du backend

```bash
cd 3legantBackend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
---

#### 3. Configuration du frontend

```bash
cd ../3legantFront
npm install
npm run dev
```