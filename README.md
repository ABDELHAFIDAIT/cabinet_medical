# 🏥 Système de Gestion de Cabinet Médical en PHP MVC 🚀

Le projet consiste à migrer un système de gestion de cabinet médical vers une architecture **MVC** en PHP, en améliorant la modularité et la maintenabilité. Il inclut la gestion des patients, des rendez-vous, des utilisateurs et des statistiques avec une interface **responsive**.

---

## 📝 Contexte du Projet

Le cabinet médical utilise actuellement une application développée en **PHP natif** avec une approche procédurale. Afin d'améliorer la modularité et la maintenabilité du projet, une migration vers une architecture **MVC (Modèle-Vue-Contrôleur)** est nécessaire.

---

## 🎯 Objectifs

- Développer le code en suivant le modèle **MVC** pour une meilleure organisation.
- Créer un code lisible et maintenable en appliquant les bonnes pratiques (**SOLID**, **DRY**, etc.).
- Préparer la plateforme à intégrer de futures fonctionnalités.

---

## 🛠️ Fonctionnalités Requises

### 1. Structure MVC

#### 🗂️ Modèle (Model)
- Gérer les interactions avec la base de données (CRUD pour les patients, médecins et rendez-vous).
- Implémenter les relations entre les entités (one-to-many, many-to-many).
- Utiliser des requêtes préparées pour éviter les injections SQL.

#### 🎨 Vue (View)
- Créer des templates réutilisables (header, footer, etc.).
- Assurer un design **responsive**.
- Intégrer la validation côté client avec **HTML5** et **JavaScript natif**.

#### 🎮 Contrôleur (Controller)
- Gérer la logique métier et les interactions entre les modèles et les vues.
- Valider les données côté serveur pour prévenir les attaques **XSS** et **CSRF**.
- Gérer les sessions utilisateurs et les autorisations d'accès.

### 2. Fonctionnalités

#### 🌐 Front Office
- Inscription et connexion des utilisateurs (patients et médecins).
- Prise de rendez-vous en ligne avec choix du médecin.
- Consultation de l'historique des consultations.

#### 🔧 Back Office
- Gestion des utilisateurs.
- Gestion des rendez-vous (confirmation, annulation).
- Tableau de bord avec statistiques sur les patients et les consultations.

---

## ⚙️ Exigences Techniques

- Utiliser **PostgreSQL** comme système de gestion de base de données.
- Respect des principes **OOP** (encapsulation, héritage...).
- Utilisation de sessions PHP pour la gestion des utilisateurs connectés.
- Validation des données côté serveur et client.

---

## 🏗️ Architecture Technique

Le projet suit l'architecture **MVC (Modèle-Vue-Contrôleur)** et utilise des standards PHP modernes. Voici les principaux points techniques :

- **Autoloading avec Composer** : Simplifie le chargement des classes pour une gestion efficace des dépendances.
- **Routing Dynamique** : Utilisation d'un routeur personnalisé pour mapper les URLs vers les contrôleurs correspondants.
- **Configuration via .htaccess** : Redirige toutes les requêtes vers un point d'entrée unique (`index.php`).
- **Séparation des Couches** : Assurer une séparation stricte entre les modèles, les vues et les contrôleurs pour une meilleure maintenabilité.

---

## 🔄 Autres

- Utilisation d’un moteur de templates : **Twig** est recommandé pour séparer l’affichage et la logique dans les vues.
- Utilisation des **Design Patterns** (Repository Pattern).

---

## 🚀 Comment Démarrer

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/votre-projet.git