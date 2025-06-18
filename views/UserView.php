<?php
namespace App\View;

class UserView extends HomeView
{
    protected $promotions = array();
    protected $promotion = null;

    public function __construct() {
        // Vous pouvez initialiser des propriétés ici si nécessaire
        parent::__construct(); // Appel du constructeur de HomeView

        // if (!$this->auth->isLoggedIn()) {
        //     // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
        //     header("Location: /login");
        //     exit;
        // }
    }
    
    public function dashboard() {
        $this->render(
            'user', 
            [
                
            ], 
            "Tableau de bord"
        );
    }
}