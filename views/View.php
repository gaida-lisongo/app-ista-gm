<?php
namespace App\View;

require_once __DIR__ . '/Auth.php';

class View {
    protected $auth;
    protected $menu;

    protected $sections = array();
    protected $section = null;
    protected $currentSection = null;

    protected $annees = array();
    protected $currentAnnee = null;

    protected $urlApi = API . "/";

    public function __construct() {
        $this->auth = new Auth();

        $this->getSections(); // Load sections from the API
        $this->getAnnees(); // Load years from the API
        $this->getCurrentAnnee(); // Load the current year from the API
    }

    protected function front($viewName, $data = [], $title = "Acceuil") {
        // Extract data variables for use in the view
        $file = __DIR__ . "/templates/front/{$viewName}.php";
        if (!file_exists($file)) {
            throw new \Exception("View file not found: {$file}");
        }
        extract($data);
        $this->auth->setCurrentPage($viewName); /// Set the current page for auth
        $auth = $this->auth; // Make auth status available in the view
        require $file;
    }

    protected function back($viewName, $data = [], $title = "Acceuil") {
        // Extract data variables for use in the view
        extract($data);
        ob_start();
        require_once __DIR__ . "/templates/back/{$viewName}.php";
        return ob_get_clean();
    }

    protected function render($viewName, $data = [], $title = "Acceuil") {
        // On essaye d'abord de charger la vue front si elle existe, si non on charge la vue back
        $frontView = __DIR__ . "/templates/front/{$viewName}.php";
        $backView = __DIR__ . "/templates/back/{$viewName}.php";
        try {
            if (file_exists($frontView)) {
                $this->front($viewName, $data, $title);
            } elseif (file_exists($backView)) {
                $this->back($viewName, $data, $title);
            } else {
                throw new \Exception("View {$viewName} not found in both front and back templates.");
            }
        } catch (\Exception $e) {
            // Handle the exception, log it or display an error message
            header("HTTP/1.0 404 Not Found");
            echo "Error: " . $e->getMessage();
        }
    }

    public function getSections() {
        try {
            // Ici on va  recupérer les information des sections depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération des sections: " . $response['message']);
            }

            $data = $response['data'];
            $this->sections = $data['rows'] ?? [];

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération des sections: " . $e->getMessage());
        }
    }

    public function getSection($id){

        try {
            // Ici on va  recupérer les information de la section depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/section/{$id}"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération de la section: " . $response['message']);
            }

            $data = $response['data'];
            $this->section = $data['rows'][0] ?? [];

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération de la section: " . $e->getMessage());
        }
    }

    public function getAnnees() {

        try {
            // Ici on va  recupérer les information de l'année depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/annees"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération des années: " . $response['message']);
            }

            $data = $response['data'];
            $this->annees = $data['rows'] ?? [];

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération de l'année: " . $e->getMessage());
        }
    }

    public function getAnnee($id) {

        try {
            // Ici on va  recupérer les information de l'année depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/annee/{$id}"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération de l'année: " . $response['message']);
            }

            $data = $response['data'];
            $this->annees = $data['rows'] ?? [];

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération de l'année: " . $e->getMessage());
        }
    }

    public function getCurrentAnnee() {

        try {
            // Ici on va  recupérer les information de l'année depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/current-annee"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération des années: " . $response['message']);
            }

            $data = $response['data'];
            $this->currentAnnee = $data['rows'][0] ?? null;

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération de l'année: " . $e->getMessage());
        }
    }
}
