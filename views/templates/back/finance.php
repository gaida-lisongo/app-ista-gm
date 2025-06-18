<?php 
ob_start();
?>


<div class="container-fluid">
    <div class="search-section mb-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="search-bar">
                    <input type="text" id="searchFrais" class="form-control" 
                           placeholder="Rechercher par code, intitulé ou type...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="fraisGrid"></div>
</div>

<style>
.search-bar {
    position: relative;
    margin-bottom: 2rem;
}

.search-bar input {
    height: 50px;
    padding-left: 45px;
    border-radius: 8px;
    border: 2px solid #e9ecef;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    transition: all 0.3s;
}

.search-bar input:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
}

.search-bar i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

.frais-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.frais-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Modification de la grille pour une colonne unique */
.frais-item {
    width: 100%;
}

/* Ajustement du layout de la carte */
.frais-card {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    height: auto;
    padding: 0;
}

.frais-header {
    width: 200px;
    border-bottom: 0;
    border-right: 1px solid #f1f1f1;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

.badge {
    padding: 8px 12px;
    border-radius: 6px;
    font-weight: 500;
}

.badge-Obligatoire { background: #4e73df; color: white; }
.badge-Académique { background: #1cc88a; color: white; }

.frais-content {
    flex: 1;
    padding: 20px;
    display: flex;
    align-items: center;
}

.frais-info {
    flex: 1;
    padding-right: 20px;
}

.frais-code {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.frais-title {
    font-size: 1.25rem;
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.frais-amount {
    font-size: 1.5rem;
    color: #4e73df;
    font-weight: 700;
    margin-bottom: 20px;
}

.promotions-list {
    width: 300px;
    margin-left: auto;
    background: #f8f9fc;
    border-radius: 8px;
    padding: 15px;
}

.promo-item {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    color: #444;
    border-radius: 6px;
    margin-bottom: 5px;
    transition: all 0.2s;
    text-decoration: none;
}

.promo-item:hover {
    background: white;
    text-decoration: none;
    color: #4e73df;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
}

.dropdown-item {
    padding: 8px 15px;
}
</style>


<?php 
$metier = ob_get_clean();
require_once 'dashboard.php';
?>
<script>
// Données mockées
const mockFrais = [
    {
        id: 1,
        code: 'FA2025',
        intitule: 'Frais Académiques',
        type: 'Obligatoire',
        montant: 500,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 500},
            {id: 2, nom: 'L2 Info', montant: 550},
            {id: 3, nom: 'L3 Info', montant: 600}
        ]
    },
    {
        id: 2,
        code: 'FS2025',
        intitule: 'Frais de Stage',
        type: 'Académique',
        montant: 150,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 100},
            {id: 2, nom: 'L2 Info', montant: 150}
        ]
    },
    {
        id: 3,
        code: 'FAS2025',
        intitule: 'Frais d\'Assurance',
        type: 'Obligatoire',
        montant: 200,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 200},
            {id: 2, nom: 'L2 Info', montant: 250},
            {id: 3, nom: 'L3 Info', montant: 300}
        ]
    },
    {
        id: 4,
        code: 'FAS2025',
        intitule: 'Frais d\'Assurance',
        type: 'Obligatoire',
        montant: 200,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 200},
            {id: 2, nom: 'L2 Info', montant: 250},
            {id: 3, nom: 'L3 Info', montant: 300}
        ]
    },
    {
        id: 4,
        code: 'FAS2025',
        intitule: 'Frais d\'Assurance',
        type: 'Obligatoire',
        montant: 200,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 200},
            {id: 2, nom: 'L2 Info', montant: 250},
            {id: 3, nom: 'L3 Info', montant: 300}
        ]
    },
    {
        id: 5,
        code: 'FAS2025',
        intitule: 'Frais d\'Assurance',
        type: 'Obligatoire',
        montant: 200,
        promotions: [
            {id: 1, nom: 'L1 Info', montant: 200},
            {id: 2, nom: 'L2 Info', montant: 250},
            {id: 3, nom: 'L3 Info', montant: 300}
        ]
    }
    // Ajoutez plus de données mockées ici
];

// Fonction pour générer une carte de frais
function generateFraisCard(frais) {
    return `
        <div class="col-12 mb-4 frais-item">
            <div class="frais-card">
                <div class="frais-header">
                    <div>
                        <span class="badge badge-${frais.type} mb-3">${frais.type}</span>
                        <div class="frais-code">${frais.code}</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm" data-toggle="dropdown">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" onclick="generateReport(${frais.id}, 'daily')">
                                Rapport journalier
                            </a>
                            <a class="dropdown-item" onclick="generateReport(${frais.id}, 'monthly')">
                                Rapport mensuel
                            </a>
                            <a class="dropdown-item" onclick="generateReport(${frais.id}, 'semestrial')">
                                Rapport semestriel
                            </a>
                            <a class="dropdown-item" onclick="generateReport(${frais.id}, 'annual')">
                                Rapport annuel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="frais-content">
                    <div class="frais-info">
                        <h5 class="frais-title">${frais.intitule}</h5>
                        <div class="frais-amount">$${frais.montant}</div>
                    </div>
                    <div class="promotions-list">
                        ${frais.promotions.map(promo => `
                            <a href="/finance/frais/${frais.id}" 
                               class="promo-item">
                                <span>${promo.nom}</span>
                                <span>$${promo.montant}</span>
                            </a>
                        `).join('')}
                    </div>
                </div>
            </div>
        </div>
    `;
}

// Fonction pour afficher les frais
function displayFrais(fraisArray) {
    const fraisGrid = $('#fraisGrid');
    fraisGrid.empty();
    
    fraisArray.forEach(frais => {
        fraisGrid.append(generateFraisCard(frais));
    });
}

// Fonction de recherche améliorée
$('#searchFrais').on('input', function() {
    const searchTerm = $(this).val().toLowerCase();
    
    const filteredFrais = mockFrais.filter(frais => 
        frais.code.toLowerCase().includes(searchTerm) ||
        frais.intitule.toLowerCase().includes(searchTerm) ||
        frais.type.toLowerCase().includes(searchTerm)
    );
    
    displayFrais(filteredFrais);
});

// Fonction pour générer un rapport
function generateReport(fraisId, type) {
    const types = {
        daily: 'journalier',
        monthly: 'mensuel',
        semestrial: 'semestriel',
        annual: 'annuel'
    };
    
    console.log(`Génération du rapport ${types[type]} pour le frais ${fraisId}`);
    // Implémentez la logique de génération de rapport ici
}

// Initialisation
$(document).ready(function() {
    displayFrais(mockFrais);
});
</script>
