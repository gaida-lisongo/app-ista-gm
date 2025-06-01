<?php
namespace App\View;

require_once __DIR__ . '/Auth.php';

class View {
    protected $auth;
    protected $menu;

    public function __construct() {
        $this->auth = new Auth();
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
}
