<?php
namespace App\View;

class FinanceView extends TitulaireView {
    public function dashboard() {
        return $this->render('finance', [], "Gestion des frais");
    }

    public function frais($id) {
        // Récupérer les détails du frais
        $frais = [/* Données du frais spécifique */];
        return $this->render('frais', [
            'id' => $id,
            'frais' => $frais
        ], "Paiement des frais");
    }
}