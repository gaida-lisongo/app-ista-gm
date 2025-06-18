<?php
ob_start();
?>

<!-- Section Solde et Transactions -->
<div class="balance-section mb-4">
    <div class="row">
        <div class="col-md-8">
            <div class="balance-card">
                <div class="balance-header">
                    <h4>Mon Solde</h4>
                    <span class="balance-amount">$1,250.00</span>
                </div>
                <div class="balance-footer">
                    <button class="btn btn-primary" onclick="downloadTransactions()">
                        <i class="fa fa-download"></i> Télécharger les transactions
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="transactions-summary">
                <div class="summary-item">
                    <span class="label">Ce mois</span>
                    <span class="value">$450.00</span>
                </div>
                <div class="summary-item">
                    <span class="label">Total retiré</span>
                    <span class="value">$3,750.00</span>
                </div>
            </div>
            <button class="btn btn-withdraw mt-3 w-100" data-toggle="modal" data-target="#withdrawModal">
                <i class="fa fa-money"></i> Faire un retrait
            </button>
        </div>
    </div>
</div>

<!-- Section Charges Horaires -->
<div class="charges-section">
    <h4 class="section-title mb-4">Mes Charges Horaires</h4>
    <div class="row">
        <?php
        // Simulation des charges horaires
        $charges = [
            [
                'id' => 1,
                'cours' => 'Programmation Web',
                'promotion' => 'L2 Info',
                'credits' => 6,
                'heures' => 60,
                'description' => 'HTML, CSS, JavaScript et PHP',
                'travaux' => 12
            ],
            [
                'id' => 2,
                'cours' => 'Base de données',
                'promotion' => 'L1 Info',
                'credits' => 4,
                'heures' => 45,
                'description' => 'SQL et conception de BD',
                'travaux' => 8
            ],
            [
                'id' => 3,
                'cours' => 'Développement Mobile',
                'promotion' => 'L3 Info',
                'credits' => 5,
                'heures' => 50,
                'description' => 'Android et iOS',
                'travaux' => 10
            ],
            [
                'id' => 4,
                'cours' => 'Réseaux Informatiques',
                'promotion' => 'L2 Réseaux',
                'credits' => 3,
                'heures' => 30,
                'description' => 'TCP/IP, LAN, WAN',
                'travaux' => 6
            ],
            [
                'id' => 5,
                'cours' => 'Sécurité Informatique',
                'promotion' => 'L3 Sécurité',
                'credits' => 4,
                'heures' => 40,
                'description' => 'Cryptographie et sécurité des systèmes',
                'travaux' => 8
            ]
        ];

        foreach($charges as $charge): ?>
        <div class="col-12 mb-4">
            <div class="charge-card">
                <div class="charge-header">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 mr-3"><?= $charge['cours'] ?></h5>
                        <span class="promotion-badge"><?= $charge['promotion'] ?></span>
                    </div>
                    <div class="charge-stats">
                        <span class="stat-item"><i class="fa fa-clock-o"></i> <?= $charge['heures'] ?> heures</span>
                        <span class="stat-item"><i class="fa fa-star"></i> <?= $charge['credits'] ?> crédits</span>
                        <span class="stat-item"><i class="fa fa-book"></i> <?= $charge['travaux'] ?> travaux</span>
                    </div>
                </div>
                <div class="charge-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="description"><?= $charge['description'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary w-100 mb-2" onclick="editDescription(<?= $charge['id'] ?>)">
                                    <i class="fa fa-edit"></i> Modifier la description
                                </button>
                                <button class="btn btn-sm btn-outline-info w-100 mb-2" onclick="manageSeances(<?= $charge['id'] ?>)">
                                    <i class="fa fa-calendar"></i> Gérer les séances
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="charge-footer">
                    <div class="btn-group">
                        <a href="travaux.php?charge=<?= $charge['id'] ?>" class="btn btn-outline-success">
                            <i class="fa fa-book"></i> Travaux
                        </a>
                        <a href="cotation.php?charge=<?= $charge['id'] ?>" class="btn btn-outline-warning">
                            <i class="fa fa-table"></i> Cotation
                        </a>
                        <button class="btn btn-outline-danger" onclick="viewAppeals(<?= $charge['id'] ?>)">
                            <i class="fa fa-exclamation-circle"></i> Recours
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Description -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la description</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" id="courseDescription" rows="4"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="saveDescription()">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Séances -->
<div class="modal fade" id="seancesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gérer les séances</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Navigation buttons -->
                <div class="btn-group w-100 mb-4">
                    <button class="btn btn-primary active" data-target="list-seances">
                        <i class="fa fa-list"></i> Liste des séances
                    </button>
                    <button class="btn btn-secondary" data-target="create-seance">
                        <i class="fa fa-plus"></i> Nouvelle séance
                    </button>
                </div>

                <!-- Liste des séances -->
                <div id="list-seances" class="seance-section">
                    <div class="list-group seances-list">
                        <!-- Séances will be loaded here -->
                    </div>
                </div>

                <!-- Création de séance -->
                <div id="create-seance" class="seance-section" style="display: none;">
                    <form id="seanceForm">
                        <div class="form-group">
                            <label>Titre de la séance *</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Description *</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Activités à faire *</label>
                            <textarea class="form-control" name="activities" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date de la séance *</label>
                            <input type="datetime-local" class="form-control" name="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Enregistrer la séance
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Retrait -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Demande de retrait</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="withdrawForm">
                    <div class="form-group">
                        <label>Montant à retirer ($)</label>
                        <input type="number" class="form-control form-control-lg" 
                               name="amount" min="10" max="1250" 
                               placeholder="Entrez le montant">
                        <small class="text-muted">Solde disponible: $1,250.00</small>
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone (Mobile Money)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+243</span>
                            </div>
                            <input type="tel" class="form-control" 
                                   name="phone" placeholder="8xx xxx xxx"
                                   pattern="[0-9]{9}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="submitWithdraw()">
                    Confirmer le retrait
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Recours -->
<div class="modal fade" id="appealsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recours - <span id="courseTitle"></span></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="appeals-list">
                    <!-- Les recours seront chargés ici -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Étudiant</th>
                                <th>Raison</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="appealsTableBody">
                            <!-- Les recours seront insérés ici dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$metier = ob_get_clean();
require_once __DIR__ . '/dashboard.php';
?>

<style>
/* Styles pour la section solde */
.balance-card {
    background: linear-gradient(45deg, #4e73df, #375bcc);
    color: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(78,115,223,0.2);
}

.balance-header {
    margin-bottom: 20px;
}

.balance-amount {
    font-size: 2.5rem;
    font-weight: 600;
}

.transactions-summary {
    background: white;
    color: #333;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 20px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f3f3f3;
}

.summary-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.summary-item .label {
    color: #666;
}

.summary-item .value {
    font-weight: 600;
    color: #333;
}

/* Styles pour les charges horaires */
.charge-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.charge-card:hover {
    transform: translateY(-3px);
}

.charge-header {
    padding: 25px;
    border-bottom: 1px solid #f3f3f3;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8f9fc;
    border-radius: 15px 15px 0 0;
}

.charge-stats {
    display: flex;
    gap: 20px;
}

.stat-item {
    padding: 8px 15px;
    background: white;
    border-radius: 20px;
    font-size: 0.9rem;
    color: #666;
    border: 1px solid #e9ecef;
}

.stat-item i {
    margin-right: 5px;
    color: #4e73df;
}

.promotion-badge {
    background: #4e73df;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
}

.charge-body {
    padding: 25px;
    background: white;
}

.description {
    color: #666;
    margin: 0;
    line-height: 1.6;
}

.action-buttons {
    padding: 10px;
    background: #f8f9fc;
    border-radius: 10px;
}

.charge-footer {
    padding: 20px 25px;
    background: #f8f9fc;
    border-top: 1px solid #f3f3f3;
    border-radius: 0 0 15px 15px;
}

.charge-footer .btn-group {
    display: flex;
    gap: 10px;
}

.charge-footer .btn-group .btn {
    padding: 10px 20px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.charge-footer .btn i {
    font-size: 1.1rem;
}

/* Styles pour le bouton de retrait */
.btn-withdraw {
    background: linear-gradient(45deg, #2ecc71, #27ae60);
    color: white;
    border: none;
    padding: 12px 20px;
    font-weight: 500;
    border-radius: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(46, 204, 113, 0.2);
}

.btn-withdraw:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
    color: white;
}

/* Styles pour le modal de retrait */
#withdrawModal .modal-content {
    border-radius: 15px;
    border: none;
}

#withdrawModal .modal-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f3f3f3;
}

#withdrawModal .modal-body {
    padding: 25px;
}

#withdrawModal .form-control {
    height: 50px;
    border-radius: 8px;
    border: 2px solid #e9ecef;
}

#withdrawModal .form-control:focus {
    border-color: #4e73df;
    box-shadow: none;
}

#withdrawModal .input-group-text {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-right: none;
}

#withdrawModal .form-control-lg {
    font-size: 1.5rem;
    font-weight: 600;
}

/* Styles pour le modal des recours */
#appealsModal .modal-content {
    border-radius: 15px;
    border: none;
}

#appealsModal .modal-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f3f3f3;
}

#appealsModal .modal-body {
    padding: 25px;
}

.table th, .table td {
    vertical-align: middle;
}

.table th {
    background: #f8f9fa;
    color: #333;
    font-weight: 500;
}

.table td {
    color: #666;
}

.badge-warning {
    background-color: #ffc107;
    color: #212529;
}

/* Styles pour le modal des séances */
#seancesModal .modal-content {
    border-radius: 15px;
    border: none;
}

#seancesModal .btn-group .btn {
    padding: 10px 20px;
}

.seances-list .seance-item {
    padding: 15px;
    margin-bottom: 10px;
    border: 1px solid #e9ecef;
    border-radius: 10px;
    background: #fff;
    transition: all 0.3s ease;
}

.seances-list .seance-item:hover {
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
}

.seance-item .seance-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.seance-item .seance-title {
    font-weight: 600;
    font-size: 1.1rem;
    color: #333;
}

.seance-item .seance-date {
    color: #666;
    font-size: 0.9rem;
}

.seance-item .seance-content {
    color: #666;
    margin-bottom: 15px;
}

.seance-item .seance-activities {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.seance-item .actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}
/* Styles pour le modal des recours */
.appeal-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    border: 1px solid #e9ecef;
}

.appeal-header {
    padding: 15px;
    border-bottom: 1px solid #e9ecef;
    background: #f8f9fc;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.appeal-student-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.appeal-student-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: #4e73df;
}

.appeal-content {
    padding: 15px;
}

.appeal-details {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-bottom: 15px;
}

.appeal-claim {
    background: #fff8e1;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.appeal-proof {
    background: #f5f5f5;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.grades-section {
    background: #f8f9fc;
    padding: 15px;
    border-radius: 8px;
}

.grades-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

.grade-item {
    background: white;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #e9ecef;
}

.grade-item input {
    width: 80px;
    text-align: center;
    margin-left: 10px;
}

.appeal-actions {
    padding: 15px;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}
</style>

<script>
// Fonction pour télécharger les transactions
function downloadTransactions() {
    // Simulation du téléchargement
    window.location.href = 'download.php?type=transactions';
}

// Gestion de la description du cours
function editDescription(chargeId) {
    $('#descriptionModal').modal('show');
    // Charger la description actuelle
    // ...
}

function saveDescription() {
    // Sauvegarder la nouvelle description
    // ...
    $('#descriptionModal').modal('hide');
}

// Gestion des séances
function manageSeances(chargeId) {
    $('#seancesModal').modal('show');
    loadSeances(chargeId);
}

function loadSeances(chargeId) {
    // Simuler le chargement des séances
    const seances = [
        {
            id: 1,
            title: "Introduction au HTML",
            description: "Bases du HTML et structure des documents",
            activities: "Créer une page web simple avec les balises de base",
            date: "2025-06-20T14:30"
        }
        // Add more seances here
    ];

    const seancesList = $('.seances-list');
    seancesList.empty();

    seances.forEach(seance => {
        seancesList.append(`
            <div class="seance-item">
                <div class="seance-header">
                    <h6 class="seance-title">${seance.title}</h6>
                    <span class="seance-date">
                        <i class="fa fa-calendar"></i> 
                        ${new Date(seance.date).toLocaleString()}
                    </span>
                </div>
                <div class="seance-content">
                    <p><strong>Description:</strong> ${seance.description}</p>
                    <div class="seance-activities">
                        <strong>Activités:</strong>
                        <p class="mb-0">${seance.activities}</p>
                    </div>
                </div>
                <div class="actions">
                    <button class="btn btn-sm btn-danger" onclick="deleteSeance(${seance.id})">
                        <i class="fa fa-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        `);
    });
}


// Navigation entre les sections
$('#seancesModal .btn-group .btn').click(function() {
    const target = $(this).data('target');
    
    // Update active state
    $(this).addClass('active').siblings().removeClass('active');
    
    // Show target section
    $('.seance-section').hide();
    $(`#${target}`).show();
});

// Handle seance form submission
$('#seanceForm').submit(function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const seanceData = Object.fromEntries(formData.entries());
    
    // Here you would normally send this to your server
    console.log('New seance:', seanceData);
    
    // Reset form and show success message
    this.reset();
    alert('Séance créée avec succès!');
    
    // Switch back to list view
    $('#seancesModal .btn-group .btn[data-target="list-seances"]').click();
    loadSeances(currentChargeId); // Reload the list
});

function deleteSeance(seanceId) {
    if(confirm('Êtes-vous sûr de vouloir supprimer cette séance?')) {
        // Here you would normally send a delete request to your server
        console.log('Deleting seance:', seanceId);
        alert('Séance supprimée avec succès!');
        loadSeances(currentChargeId); // Reload the list
    }
}

// Soumission du formulaire de retrait
function submitWithdraw() {
    const amount = $('#withdrawForm input[name="amount"]').val();
    const phone = $('#withdrawForm input[name="phone"]').val();

    if (!amount || !phone) {
        alert('Veuillez remplir tous les champs');
        return;
    }

    if (amount > 1250) {
        alert('Le montant demandé dépasse votre solde disponible');
        return;
    }

    const $btn = $('#withdrawModal .btn-primary');
    const originalText = $btn.html();
    
    $btn.html('<i class="fa fa-spinner fa-spin"></i> Traitement...').prop('disabled', true);

    // Simulation de l'envoi
    setTimeout(() => {
        alert('Votre demande de retrait a été enregistrée avec succès');
        $('#withdrawModal').modal('hide');
        $btn.html(originalText).prop('disabled', false);
        $('#withdrawForm')[0].reset();
    }, 1500);
}

// Gestion des recours
function viewAppeals(chargeId) {
    $('#appealsModal').modal('show');
    
    // Simuler le chargement des recours
    const appeals = [
        {
            date: '2025-06-15',
            student: 'Jean Dupont',
            reason: 'Contestation note TP2',
            status: 'En attente',
            id: 1
        },
        // Ajouter d'autres recours simulés ici
    ];

    const tbody = $('#appealsTableBody');
    tbody.empty();

    appeals.forEach(appeal => {
        tbody.append(`
            <tr>
                <td>${appeal.date}</td>
                <td>${appeal.student}</td>
                <td>${appeal.reason}</td>
                <td><span class="badge badge-warning">${appeal.status}</span></td>
                <td>
                    <button class="btn btn-sm btn-info" onclick="viewAppealDetails(${appeal.id})">
                        <i class="fa fa-eye"></i> Voir
                    </button>
                </td>
            </tr>
        `);
    });
}

function viewAppealDetails(appealId) {
    // Implémenter la vue détaillée d'un recours
    alert('Détails du recours ' + appealId);
}

// Validation du formulaire
$('#withdrawForm input[name="amount"]').on('input', function() {
    const amount = $(this).val();
    if (amount > 1250) {
        $(this).addClass('is-invalid');
    } else {
        $(this).removeClass('is-invalid');
    }
});

$('#withdrawForm input[name="phone"]').on('input', function() {
    const phone = $(this).val();
    if (phone.length === 9 && /^\d+$/.test(phone)) {
        $(this).removeClass('is-invalid');
    } else {
        $(this).addClass('is-invalid');
    }
});
</script>
