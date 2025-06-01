<?php
namespace App\View;

class SectionView extends HomeView {
    public function __construct() {
        // Vous pouvez initialiser des propriétés ici si nécessaire
        parent::__construct(); // Appel du constructeur de HomeView
    }

    public function programmes($slug = null) {
        return $this->render('section', [], "Section " . htmlspecialchars($slug));
    }

    public function promotion($slug = null) {
        return $this->render(
            'classe', 
            [
                'promotion' => "L3 Mécanique",
            ], 
            "Promotion " . htmlspecialchars($slug));
    }

    public function cours($slug = null) {
        return $this->render(
            'matiere', 
            [
                'cours' => "Mécanique des fluides",
            ], 
            "Matière " . htmlspecialchars($slug));
    }
}
