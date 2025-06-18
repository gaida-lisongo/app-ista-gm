<?php
namespace App\View;

class TitulaireView {
    public function index() {
        // Render the home page view
        return $this->render('home', [], "Acceuil");
    } 

    public function dashboard() {
        return $this->render('titulaire', [], "Boite de reception");
    }

    public function chat() {
        // Render the chat page view
        return $this->render('chat', [], "Discussion");
    }

    public function charges($anneeId) {
        return $this->render('charges', ['id' => $anneeId], "Charges Horaire");
    }

    public function charge($id) {
        // Render the about page view
        return $this->render('charge', ['id' => $id], "Charge Horaire");
    }

    public function fiche($data) {
        // Render the profile page view
        return $this->render('fiche', ['data' => $data], "Fiche de cotation");
    }

    public function profile() {
        // Render the profile page view
        return $this->render('profile', [], "Mon Profil");
    }

    protected function back($viewName, $data = [], $title = "Acceuil") {
        // Extract data variables for use in the view
        extract($data);
        require_once __DIR__ . "/templates/back/{$viewName}.php";
    }

    protected function render($viewName, $data = [], $title = "Acceuil") {
        $backView = __DIR__ . "/templates/back/{$viewName}.php";
        try {
            if (file_exists($backView)) {
                $this->back($viewName, $data, $title);
            } else {
                throw new \Exception("View {$viewName} not found in back templates.");
            }
        } catch (\Exception $e) {
            // Handle the exception, log it or display an error message
            header("HTTP/1.0 404 Not Found");
            echo "Error: " . $e->getMessage();
        }
    }
}