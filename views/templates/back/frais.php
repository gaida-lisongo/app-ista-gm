<?php ob_start(); ?>

<div class="container-fluid py-4">
  <!-- Banner Section -->
    <div class="banner-wrapper mb-4 rounded shadow-lg overflow-hidden position-relative">
    <div class="banner-overlay"></div>
    <div class="banner-content position-relative text-white p-5">
        <div class="row align-items-center">
        <div class="col-md-8">
            <span class="badge bg-white text-primary mb-2" id="rubriqueType"></span>
            <h2 id="rubriqueTitle" class="mb-1 display-6 fw-bold"></h2>
            <p id="rubriqueCode" class="mb-0 fs-6 opacity-75"></p>
        </div>
        <div class="col-md-4 text-md-end">
            <h1 id="rubriqueMontant" class="display-4 mb-0 fw-bold"></h1>
            <span class="opacity-75">Montant de base</span>
        </div>
        </div>
    </div>
    </div>


  <!-- Search Section -->
  <div class="search-container mb-4">
    <div class="form-group search-group">
      <i class="fas fa-search search-icon"></i>
      <input type="text" id="searchStudent" class="form-control search-input" placeholder="Rechercher un étudiant par nom ou matricule...">
    </div>
  </div>

  <!-- Students List -->
  <div id="studentsList" class="row"></div>
</div>

<style>
/* Banner */
.bg-gradient-primary {
  background: linear-gradient(135deg, #0a2dd6, #004e92);
}
.card-body.bg-gradient-primary {
  padding: 2rem;
}

/* Carte étudiant */
.student-card {
  border: none;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  margin-bottom: 25px;
  background: #fff;
}

/* Section photo */
.student-photo-container {
  height: 100%;
  background: #f8f9fc;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 25px;
}

.student-photo {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Section contenu */
.student-content {
  padding: 25px;
}

/* En-tête étudiant */
.student-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 25px;
  padding-bottom: 20px;
  border-bottom: 1px solid #eaecf3;
}

.student-name {
  font-size: 22px;
  font-weight: 600;
  color: #344767;
  margin-bottom: 8px;
}

.student-meta {
  display: flex;
  gap: 15px;
  color: #6e84a3;
  font-size: 14px;
}

.student-meta i {
  color: #4e73df;
  margin-right: 5px;
}

.history-btn {
  border-color: #e0e6ed;
  color: #4e73df;
  padding: 8px 15px;
  font-size: 14px;
  font-weight: 500;
  border-radius: 8px;
}

.history-btn:hover {
  background: #4e73df;
  color: white;
  border-color: #4e73df;
}

/* Statistiques de paiement */
.payment-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-bottom: 25px;
}

.payment-stat {
  background: #f8f9fc;
  padding: 15px;
  border-radius: 10px;
  text-align: center;
}

.stat-value {
  font-size: 24px;
  font-weight: 600;
  color: #344767;
  margin-bottom: 5px;
}

.stat-label {
  font-size: 13px;
  color: #6e84a3;
  margin-bottom: 10px;
}

.progress {
  height: 6px;
  background-color: #e9ecef;
  border-radius: 3px;
  overflow: hidden;
}

/* Actions de paiement */
.payment-actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.amount-input-group {
  position: relative;
  max-width: 200px;
}

.currency-symbol {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: #6e84a3;
}

.amount-input {
  height: 48px;
  border-radius: 8px;
  border: 1px solid #e0e6ed;
  background: #f8f9fc;
  padding-left: 30px;
  width: 100%;
}

.amount-input:focus {
  border-color: #4e73df;
  box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
  outline: none;
}

.credit-btn {
  height: 48px;
  background: #4e73df;
  border: none;
  border-radius: 8px;
  color: white;
  font-weight: 500;
  padding: 0 20px;
  display: flex;
  align-items: center;
}

.credit-btn:hover {
  background: #3a5cca;
}

/* Search Section */
.search-container {
  width: 100%;
  padding: 0;
}

.search-group {
  position: relative;
  margin-bottom: 0;
}

.search-icon {
  position: absolute;
  left: 20px;
  top: 50%;
  transform: translateY(-50%);
  color: #6e84a3;
  z-index: 10;
}

.search-input {
  height: 60px;
  border-radius: 10px;
  padding-left: 50px;
  font-size: 16px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  border: 1px solid #e5e9f2;
  width: 100%;
}

.search-input:focus {
  box-shadow: 0 4px 15px rgba(78, 115, 223, 0.1);
  border-color: #4e73df;
}
</style>

<?php 
$metier = ob_get_clean();
require_once 'dashboard.php';
?>

<script>
// --- Mock Data ---
const rubrique = {
  id: 1,
  code: 'FA2025',
  type: 'Obligatoire',
  intitule: 'Frais Académiques',
  montant: 500
};

const mockStudents = [
  {
    id: 1,
    matricule: '20B001',
    nom: 'Jean Dupont',
    photo: '/config/inbtp-assets/images/students/1.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 300, remaining: 200 }
  },
  {
    id: 2,
    matricule: '20B002',
    nom: 'Marie Claire',
    photo: '/config/inbtp-assets/images/students/2.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 500, remaining: 0 }
  },
  {
    id: 3,
    matricule: '20B003',
    nom: 'Patrick Mbala',
    photo: '/config/inbtp-assets/images/students/3.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 150, remaining: 350 }
  },
  {
    id: 4,
    matricule: '20B004',
    nom: 'Sarah Kabongo',
    photo: '/config/inbtp-assets/images/students/4.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 400, remaining: 100 }
  },
  {
    id: 5,
    matricule: '20B005',
    nom: 'David Mutombo',
    photo: '/config/inbtp-assets/images/students/1.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 0, remaining: 500 }
  },
  {
    id: 6,
    matricule: '20B006',
    nom: 'Sophie Kalonga',
    photo: '/config/inbtp-assets/images/students/3.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 250, remaining: 250 }
  },
  {
    id: 7,
    matricule: '20B007',
    nom: 'Emmanuel Nseka',
    photo: '/config/inbtp-assets/images/students/2.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 450, remaining: 50 }
  },
  {
    id: 8,
    matricule: '20B008',
    nom: 'Alice Mulumba',
    photo: '/config/inbtp-assets/images/students/4.jpg',
    classe: 'L2 Info',
    payments: { total: 500, paid: 350, remaining: 150 }
  }
];

// --- Functions ---
function loadRubriqueDetails() {
  $('#rubriqueType').text(rubrique.type);
  $('#rubriqueTitle').text(rubrique.intitule);
  $('#rubriqueCode').text(rubrique.code);
  $('#rubriqueMontant').text('$' + rubrique.montant);
}

function generateStudentCard(student) {
  return `
    <div class="col-12 mb-4">
      <div class="card student-card">
        <div class="row g-0">
          <!-- Section Photo -->
          <div class="col-md-3">
            <div class="student-photo-container">
              <img src="${student.photo}" class="student-photo" alt="${student.nom}">
            </div>
          </div>
          
          <!-- Section Informations -->
          <div class="col-md-9">
            <div class="student-content">
              <!-- En-tête étudiant -->
              <div class="student-header">
                <div>
                  <h4 class="student-name">${student.nom}</h4>
                  <div class="student-meta">
                    <span class="student-id"><i class="fas fa-id-card"></i> ${student.matricule}</span>
                    <span class="student-class"><i class="fas fa-user-graduate"></i> ${student.classe}</span>
                  </div>
                </div>
                <button class="btn btn-outline-primary history-btn" onclick="downloadPayments(${student.id})">
                  <i class="fas fa-download me-2"></i>Historique
                </button>
              </div>
              
              <!-- Statistiques de paiement -->
              <div class="payment-stats">
                <div class="payment-stat">
                  <div class="stat-value">${student.payments.paid}$</div>
                  <div class="stat-label">Déjà payé</div>
                  <div class="progress">
                    <div class="progress-bar bg-success" style="width: ${(student.payments.paid / student.payments.total) * 100}%"></div>
                  </div>
                </div>
                
                <div class="payment-stat">
                  <div class="stat-value">${student.payments.remaining}$</div>
                  <div class="stat-label">Reste à payer</div>
                  <div class="progress">
                    <div class="progress-bar bg-danger" style="width: ${(student.payments.remaining / student.payments.total) * 100}%"></div>
                  </div>
                </div>
                
                <div class="payment-stat">
                  <div class="stat-value">${student.payments.total}$</div>
                  <div class="stat-label">Montant total</div>
                </div>
              </div>
              
              <!-- Actions de paiement -->
              <div class="payment-actions">
                <div class="amount-input-group">
                  <span class="currency-symbol">$</span>
                  <input type="number" class="amount-input" placeholder="Montant" min="0" max="${student.payments.remaining}">
                </div>
                <button class="btn btn-primary credit-btn" onclick="crediterCompte(${student.id})">
                  <i class="fas fa-plus-circle me-2"></i>Créditer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `;
}

$('#searchStudent').on('input', function() {
  const searchTerm = $(this).val().toLowerCase();
  const filteredStudents = mockStudents.filter(student =>
    student.matricule.toLowerCase().includes(searchTerm) ||
    student.nom.toLowerCase().includes(searchTerm)
  );
  displayStudents(filteredStudents);
});

function displayStudents(students) {
  const studentsList = $('#studentsList');
  studentsList.empty();$('#studentsList');
  students.forEach(student => {
    studentsList.append(generateStudentCard(student));
  });
}

function crediterCompte(studentId) {
  const student = mockStudents.find(s => s.id === studentId);
  const amount = parseFloat($(event.target).closest('.payment-action').find('input').val());
  if (!amount || amount <= 0) {
    alert('Veuillez entrer un montant valide');
    return;
  }
  console.log(`Crédit de $${amount} pour l'étudiant ${student.nom}`);
  console.log(`Crédit de $${amount} pour l'étudiant ${student.nom}`);
  alert('Paiement enregistré avec succès!');
}

function downloadPayments(studentId) {
  const student = mockStudents.find(s => s.id === studentId);
  console.log(`Téléchargement des paiements pour ${student.nom}`);
  // Implémenter la logique de téléchargement ici
}   
$(document).ready(function() {
  loadRubriqueDetails();
  displayStudents(mockStudents);
});
</script>