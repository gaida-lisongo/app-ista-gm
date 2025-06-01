<?php
namespace App\View;

class HomeView extends View {
    public function index() {
        // Render the home page view
        return $this->render('home', [], "Acceuil");
    }

    public function valves() {
        // Render the valves page view
        return $this->render('valves', [], "Actualités");
    }
    
    public function about() {
        // Render the about page view
        return $this->render('about', [], "A Propos");
    }

    public function contact() {
        // Render the contact page view
        return $this->render('contact', [], "Nous Contacter");
    }
}