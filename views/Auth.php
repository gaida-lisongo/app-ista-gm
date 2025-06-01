<?php
namespace App\View;

class Auth {
    private $isLoggedIn = false;
    private $name = null;
    private $profilePicture = null;

    private $currentPage = 'home'; // Page actuelle, par défaut 'home'

    public function setCurrentPage($page) {
        $this->currentPage = $page;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }
    
    public function __construct() {
        // Ici vous pourrez plus tard ajouter la logique de vérification de session
        $this->isLoggedIn = false;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

    public function getName() {
        return $this->name ?? 'Connexion';
    }

    public function getProfilePicture() {
        return $this->profilePicture ?? '/views/templates/front/sona/img/default-avatar.jpg';
    }

    public function getMenu() {
        if ($this->isLoggedIn) {
            return '
                <li><a href="/profile">Mon Profil</a></li>
                <li><a href="/documents">Mes Documents</a></li>
                <li><a href="/logout">Déconnexion</a></li>
            ';
        }
        return '
            <li><a href="/login">Se connecter</a></li>
            <li><a href="/forgot">Mot de passe oublié</a></li>
        ';
    }
}
