<?php
namespace App\View;

class SectionView extends HomeView
{
    protected $promotions = array();
    protected $promotion = null;

    public function __construct() {
        // Vous pouvez initialiser des propriétés ici si nécessaire
        parent::__construct(); // Appel du constructeur de HomeView
        $this->getAnnees(); // Récupérer les années disponibles
        $this->getCurrentAnnee(); // Récupérer l'année en cours
    }

    public function programmes($slug = null) {
        $this->getSection(htmlspecialchars($slug));
        $this->getPromotions(htmlspecialchars($slug));

        return $this->render(
            'section', 
            [
                'section' => $this->section,
                'annees' => $this->annees,
                'currentAnnee' => $this->currentAnnee,
                'promotions' => $this->promotions
            ], 
            $this->section['mention']
        );
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

    public function getPromotions($sectionId) {
        try {
            // Ici on va  recupérer les information de la section depuis l'API
            $response = json_decode(file_get_contents("{$this->urlApi}home/promotions-section/{$sectionId}"), true);

            if ($response['status'] !== 200) {
                // Gérer l'erreur si la requête a échoué
                throw new \Exception("Erreur lors de la récupération des promotions: " . $response['message']);
            }

            $data = $response['data'];
            $this->promotions = $data['rows'] ?? [];

        } catch (\Exception $e) {
            // Gérer l'exception si la requête échoue
            throw new \Exception("Erreur lors de la récupération des promotions: " . $e->getMessage());
        }
    }

    public function setPromotion($selectedPromotion){
        $this->promotion = $selectedPromotion;
    }

    public function getPromotion() {
        return $this->promotion;
    }
}
