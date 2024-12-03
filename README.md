# Evento Platform - Gestion et Réservation d'Événements

**Evento** est une plateforme innovante conçue pour la gestion et la réservation de places d'événements. Elle offre une expérience utilisateur optimale pour les participants, les organisateurs et les administrateurs, permettant de découvrir, réserver, et gérer une variété d'événements.

## 📋 Fonctionnalités Principales

### Utilisateurs
- Inscription et connexion sécurisées (avec support pour Google et Facebook comme bonus).
- Réinitialisation du mot de passe via e-mail.
- Consultation des événements disponibles avec recherche, pagination et filtres (catégorie, date, lieu).
- Visualisation des détails des événements (description, date, lieu, places disponibles).
- Réservation de places et génération de tickets (PDF et par e-mail).

### Organisateurs
- Création et gestion d'événements avec titre, description, date, lieu, catégorie et nombre de places disponibles.
- Accès à des statistiques sur les réservations.
- Possibilité de choisir entre acceptation automatique ou validation manuelle des réservations.

### Administrateurs
- Gestion des utilisateurs avec restriction d'accès.
- Gestion des catégories d'événements (ajout, modification, suppression).
- Validation des événements avant leur publication.
- Accès à des statistiques globales.

## 🚀 Bonus
- Filtrage des événements par date ou lieu.
- Système de paiement intégré pour les réservations.

## 🛠️ Technologies Utilisées
- **Framework** : Laravel
- **Base de données** : MySQL
- **Authentification** : Laravel Breeze avec intégration OAuth (Google, Facebook).
- **Front-end** : Blade Templates, HTML, CSS, JavaScript.
- **Tests** : PHPUnit pour les tests unitaires et fonctionnels.
- **Payment Method** : Stripe.

## ⚙️ Installation et Configuration

1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/KHALID-ZENNOUHI/Evento
   cd Evento
