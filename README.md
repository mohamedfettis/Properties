# Système de Gestion de Location Immobilière MFTS

<p align="center"><img src="public/images/mfts.png" width="200" alt="MFTS Logo"></p>

## À propos du projet

Ce projet est une application web de gestion de location immobilière développée avec Laravel. Elle permet aux propriétaires de gérer leurs biens immobiliers et aux locataires de réserver des propriétés.

## Fonctionnalités principales

### Gestion des propriétés
- Ajout, modification et suppression de propriétés
- Upload de photos (principale + 2 photos secondaires)
- Description détaillée et prix par nuit
- Liste des propriétés avec filtrage

### Système de réservation
- Réservation de propriétés avec dates de check-in/check-out
- Calcul automatique du prix total
- Affichage des jours restants avant le check-in
- Annulation de réservation par le locataire

### Tableau de bord
- Vue d'ensemble des réservations actives
- Gestion des propriétés personnelles
- Interface intuitive et responsive

### Authentification et sécurité
- Système d'inscription et de connexion
- Protection des routes et des actions
- Politiques d'autorisation pour les propriétés et réservations

## Technologies utilisées

- **Backend**: Laravel 11.43.0
- **Frontend**: Blade, TailwindCSS
- **Base de données**: SQLite
- **Authentification**: Laravel Breeze

## Guide d'Installation et d'Utilisation

### Prérequis
- PHP 8.4.1 ou supérieur
- Composer
- Node.js et NPM
- Serveur XAMPP (ou équivalent avec Apache et MySQL)

### 1. Téléchargement et Installation

#### A. Installation de XAMPP
1. Téléchargez XAMPP depuis [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Installez XAMPP en suivant les instructions
3. Démarrez les services Apache et MySQL

#### B. Installation du Projet
1. Ouvrez un terminal et naviguez vers le dossier htdocs :
```bash
cd /opt/lampp/htdocs
```

2. Clonez le projet :
```bash
git clone [url-du-projet] projet
cd projet
```

3. Installez les dépendances PHP :
```bash
composer install
```

4. Installez les dépendances JavaScript :
```bash
npm install
```

5. Configurez l'environnement :
```bash
cp .env.example .env
php artisan key:generate
```

6. Créez la base de données :
```bash
php artisan migrate
```

7. Créez le lien symbolique pour le stockage :
```bash
php artisan storage:link
```

8. Compilez les assets :
```bash
npm run dev
```

### 2. Utilisation de l'Application

#### A. Démarrage
1. Assurez-vous que XAMPP est en cours d'exécution (Apache et MySQL)
2. Ouvrez votre navigateur et accédez à : `http://localhost/projet`

#### B. Fonctionnalités Principales

1. **Inscription et Connexion**
   - Cliquez sur "S'inscrire" pour créer un compte
   - Remplissez le formulaire avec vos informations
   - Connectez-vous avec vos identifiants

2. **Gestion des Propriétés**
   - Cliquez sur "Ajouter une propriété"
   - Remplissez les informations :
     * Nom de la propriété
     * Description détaillée
     * Prix par nuit
     * Photos (principale + secondaires)
   - Pour modifier : cliquez sur l'icône "Modifier"
   - Pour supprimer : cliquez sur l'icône "Supprimer"

3. **Réservations**
   - Parcourez la liste des propriétés
   - Cliquez sur une propriété pour voir les détails
   - Choisissez vos dates de séjour
   - Confirmez la réservation
   - Consultez vos réservations actives dans le tableau de bord

4. **Gestion des Réservations**
   - Accédez à "Mes réservations" depuis le tableau de bord
   - Visualisez les détails de chaque réservation
   - Possibilité d'annuler une réservation si nécessaire

### 3. Résolution des Problèmes Courants

1. **Erreur de permission**
```bash
chmod -R 777 storage/
chmod -R 777 bootstrap/cache/
```

2. **Base de données**
- Si la migration échoue :
```bash
php artisan migrate:fresh
```

3. **Images non visibles**
- Vérifiez que le lien symbolique est créé :
```bash
rm public/storage
php artisan storage:link
```

### 4. Maintenance

1. **Mise à jour du projet**
```bash
git pull
composer update
npm update
php artisan migrate
```

2. **Nettoyage du cache**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Structure du projet

- `app/Models/`: Modèles de données (Property, Booking, User)
- `app/Http/Controllers/`: Contrôleurs de l'application
- `app/Policies/`: Politiques d'autorisation
- `resources/views/`: Templates Blade
- `public/images/`: Images publiques (logo MFTS)
- `database/migrations/`: Schémas de base de données

## Fonctionnalités détaillées

### Gestion des propriétés
- Création avec validation des données
- Upload de photos avec prévisualisation
- Modification des informations
- Suppression sécurisée

### Système de réservation
- Vérification des disponibilités
- Calcul automatique du prix total
- Gestion des dates de séjour
- Système d'annulation

### Interface utilisateur
- Design moderne et responsive
- Navigation intuitive
- Formulaires avec validation
- Messages de confirmation

## Sécurité

- Protection CSRF
- Authentification requise
- Vérification des propriétaires
- Validation des données

## Maintenance

### Base de données
- Migrations pour les modifications
- Seeders pour les données de test

### Images
- Stockage dans public/storage
- Gestion des images par défaut

## Contribution

1. Fork le projet
2. Créer une branche
3. Commiter les changements
4. Pousser vers la branche
5. Créer une Pull Request

## License

MFTS © 2024. Tous droits réservés.
