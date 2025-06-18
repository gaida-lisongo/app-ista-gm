<?php
    $path = "/views/templates/back/kiaalap/";
    $page = array(
        'title' => "Accueil - IBTP",
        'current' => "Home",
    );

    $template = __DIR__ . '/kiaalap/gabarit.php';
    ob_start();
?>

<style>
/* Hero Section & Carousel */
.hero-section {
    height: 500px;
    overflow: hidden;
}

.carousel-item img {
    height: 500px;
    object-fit: cover;
}

.carousel-caption {
    background: rgba(0,0,0,0.5);
    padding: 20px;
    border-radius: 8px;
}

/* Institution Info */
.institution-title {
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 20px;
    border-bottom: 3px solid #4e73df;
    padding-bottom: 10px;
}

.institution-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
}

/* Announcements Section */
.announcements-slider {
    margin-top: 30px;
}

/* Styles pour les communiqués */
.announcement-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 25px;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.announcement-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.service-badge {
    background: #4e73df;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
}

.announcement-date {
    color: #666;
    font-size: 0.9rem;
}

.announcement-body h3 {
    color: #333;
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.announcement-body p {
    color: #666;
    line-height: 1.6;
}

.announcement-content {
    max-height: 150px;
    overflow: hidden;
    position: relative;
    transition: max-height 0.5s ease;
}

.announcement-content.expanded {
    max-height: 2000px;
}

.announcement-content:not(.expanded)::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 80px;
    background: linear-gradient(transparent, white);
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #4e73df;
    background: none;
    border: none;
    padding: 10px 0;
    margin-top: 15px;
    cursor: pointer;
    font-weight: 500;
}

.read-more-btn:focus {
    outline: none;
}

/* Login Card */
.login-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 35px;
    transition: all 0.3s ease;
    width: 100%;
}

.login-header {
    text-align: center;
    margin-bottom: 35px;
}

.login-logo {
    width: 120px;
    margin-bottom: 25px;
    transition: transform 0.3s ease;
}

.login-logo:hover {
    transform: scale(1.05);
}

.input-group {
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.input-group-text {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-right: none;
    padding: 12px 15px;
}

.form-control {
    border: 1px solid #e9ecef;
    border-left: none;
    padding: 12px 15px;
    height: auto;
}

.form-control:focus {
    box-shadow: none;
    border-color: #4e73df;
}

/* Styles pour la sélection de session */
.session-header {
    text-align: center;
    margin-bottom: 30px;
}

.user-welcome {
    color: #666;
    margin-top: 10px;
}

.session-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-top: 20px;
}

.session-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: #f8f9fa;
    border: none;
    border-radius: 10px;
    transition: all 0.3s ease;
    gap: 10px;
}

.session-btn i {
    font-size: 24px;
    color: #4e73df;
}

.session-btn span {
    color: #333;
    font-weight: 500;
}

.session-btn:hover {
    background: #4e73df;
    transform: translateY(-3px);
}

.session-btn:hover i,
.session-btn:hover span {
    color: white;
}

/* Ajoutez ces styles dans la section style existante */
.site-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    padding: 35px 15px;
}

.container {
    max-width: 1200px;
}

/* Ajustez les colonnes */
.col-lg-8 {
    padding: 0 20px;
}

.col-lg-4 {
    padding: 0 20px;
}

/* Ajustez le slider */
.announcements-slider {
    margin: 0 auto;
    max-width: 800px;
}

/* Ajustez la carte de connexion */
.login-card {
    margin: 0 auto;
    max-width: 400px;
}

/* Mise à jour des styles du formulaire */
.login-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 35px;
    transition: all 0.3s ease;
    width: 100%;
}

.login-form .form-group {
    margin-bottom: 20px;
}

.login-form label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 500;
}

.login-form .form-control {
    width: 100%;
    height: 45px;
    padding: 10px 15px;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s;
}

.login-form .form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 2px rgba(78,115,223,0.1);
}

.selected-session {
    color: #333;
    font-size: 1.5rem;
    margin-bottom: 5px;
}

.login-subtitle {
    color: #666;
    margin-bottom: 25px;
}

.btn-login {
    width: 100%;
    height: 45px;
    background: #4e73df;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-login:hover {
    background: #375bcc;
    transform: translateY(-1px);
}

#backToSession {
    width: 100%;
}

.login-footer {
    text-align: center;
    margin-top: 20px;
}

/* Styles pour la récupération de mot de passe */
.verification-code {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin: 20px 0;
}

.code-input {
    width: 45px;
    height: 45px;
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    border-radius: 8px;
}

.recovery-step {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.modal-content {
    border-radius: 15px;
    border: none;
}

.modal-header {
    border-bottom: 1px solid #f3f3f3;
    padding: 20px 25px;
}

.modal-body {
    padding: 25px;
}

.modal-title {
    font-weight: 600;
    color: #333;
}

.btn-primary {
    background: #4e73df;
    border: none;
    padding: 12px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-primary:hover {
    background: #375bcc;
    transform: translateY(-1px);
}

/* Profile Card Styles */
.profile-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 25px;
    margin-bottom: 25px;
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f3f3f3;
}

.profile-image-container {
    position: relative;
}

.profile-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #f3f3f3;
}

/* Supprimer ou commenter les styles du bouton d'édition de photo dans la carte
.profile-image-edit {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #4e73df;
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.profile-image-edit:hover {
    background: #375bcc;
    transform: scale(1.1);
} */

.profile-info {
    flex: 1;
}

.user-name {
    margin: 0;
    color: #333;
    font-size: 1.2rem;
}

.user-matricule {
    display: block;
    color: #666;
    font-size: 0.9rem;
    margin-top: 5px;
}

.user-session {
    display: block;
    color: #4e73df;
    font-size: 0.9rem;
    margin-top: 5px;
}

.profile-body {
    margin-bottom: 20px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    color: #666;
}

.info-item i {
    color: #4e73df;
    width: 20px;
}

.profile-footer {
    display: flex;
    gap: 10px;
}

.btn-edit, .btn-logout {
    flex: 1;
    padding: 10px;
    border-radius: 8px;
    border: none;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-edit {
    background: #4e73df;
    color: white;
}

.btn-logout {
    background: #f8f9fa;
    color: #dc3545;
}

.btn-edit:hover {
    background: #375bcc;
}

.btn-logout:hover {
    background: #dc3545;
    color: white;
}

/* Academic Year Card Styles */
.academic-year-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 25px;
}

.year-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.year-btn {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f8f9fa;
    border: none;
    border-radius: 10px;
    transition: all 0.3s;
    text-align: left;
}

.year-btn.active {
    background: #4e73df;
    color: white;
}

.year-btn i {
    font-size: 24px;
}

.year-info {
    flex: 1;
}

.year {
    display: block;
    font-weight: 500;
}

.status {
    display: block;
    opacity: 0.8;
}

/* Modal Styles */
.modal-lg {
    max-width: 800px;
}

.profile-upload {
    text-align: center;
    margin-bottom: 20px;
}

.preview-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
}

.btn-upload {
    width: 100%;
    background: #f8f9fa;
    border: none;
    padding: 10px;
    border-radius: 8px;
    transition: all 0.3s;
}

.btn-upload:hover {
    background: #4e73df;
    color: white;
}

.nav-tabs .nav-link {
    color: #666;
    font-weight: 500;
}

.nav-tabs .nav-link.active {
    color: #4e73df;
    border-bottom: 2px solid #4e73df;
}

/* Ajouter ces styles */
.tab-pane {
    padding: 20px 0;
}

.tab-pane form {
    margin: 0;
}

/* Modifier les styles existants */
.modal-body {
    padding: 25px;
}

.nav-tabs {
    padding: 0 25px;
    margin-bottom: 25px;
    border-bottom: 1px solid #f3f3f3;
}

.nav-tabs .nav-link {
    color: #666;
    font-weight: 500;
    padding: 15px 20px;
    border: none;
    border-bottom: 2px solid transparent;
}

.nav-tabs .nav-link.active {
    color: #4e73df;
    border-bottom: 2px solid #4e73df;
    background: none;
}

.tab-content {
    padding: 0;
}

.tab-pane {
    padding: 0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 8px;
    color: #333;
}

.form-control {
    height: 45px;
    padding: 10px 15px;
    border: 1px solid #e9ecef;
    border-radius: 8px;
}

/* Styles pour le nouveau modal de profil */
.profile-edit-buttons {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
}

.btn-edit-section {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #f8f9fa;
    color: #666;
    transition: all 0.3s;
}

.btn-edit-section.active {
    background: #4e73df;
    color: white;
}

.btn-edit-section:hover {
    transform: translateY(-2px);
}

.profile-photo-edit {
    margin-bottom: 20px;
}

.profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #f3f3f3;
}

.modal-body {
    padding: 25px;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .site-wrapper {
        padding: 0 10px;
    }
    
    .col-lg-8, 
    .col-lg-4 {
        padding: 0 10px;
    }
}
</style>

<div class="container-fluid mt-15">
    <div class="site-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Left Column: Institution Info + Announcements -->
                <div class="col-lg-8">
                    <?php echo $metier ?>
                </div>

                <!-- Right Column: User Profile & Academic Year -->
                <div class="col-lg-4">
                    <!-- User Profile Card -->
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-image-container">
                                <img src="<?= $path ?>img/profile/1.jpg" alt="Photo de profil" class="profile-image" id="profileImage">
                            </div>
                            <div class="profile-info">
                                <h4 class="user-name">John Kahindo Mumbere</h4>
                                <span class="user-matricule">ISTA001/2023</span>
                                <span class="user-session">Session: Titulaire</span>
                            </div>
                        </div>
                        <div class="profile-body">
                            <div class="info-item">
                                <i class="fa fa-envelope"></i>
                                <span>john.kahindo@gmail.com</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-phone"></i>
                                <span>+243 853 102 426</span>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <button class="btn btn-edit" data-toggle="modal" data-target="#profileModal">
                                <i class="fa fa-edit"></i> Modifier profil
                            </button>
                            <button class="btn btn-logout">
                                <i class="fa fa-sign-out"></i> Déconnexion
                            </button>
                        </div>
                    </div>

                    <!-- Academic Year Selection Card -->
                    <div class="academic-year-card">
                        <h5 class="card-title">Année académique</h5>
                        <div class="year-options">
                            <button class="year-btn active" data-year="2024-2025">
                                <i class="fa fa-calendar"></i>
                                <div class="year-info">
                                    <span class="year">2024-2025</span>
                                    <small class="status">En cours</small>
                                </div>
                            </button>
                            <button class="year-btn" data-year="2023-2024">
                                <i class="fa fa-calendar"></i>
                                <div class="year-info">
                                    <span class="year">2023-2024</span>
                                    <small class="status">Clôturée</small>
                                </div>
                            </button>
                            <button class="year-btn" data-year="2022-2023">
                                <i class="fa fa-calendar"></i>
                                <div class="year-info">
                                    <span class="year">2022-2023</span>
                                    <small class="status">Archivée</small>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Edit Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <!-- Boutons de sélection -->
                <div class="profile-edit-buttons mb-4">
                    <button class="btn btn-edit-section active" data-section="identity">
                        <i class="fa fa-user"></i> Identité
                    </button>
                    <button class="btn btn-edit-section" data-section="contact">
                        <i class="fa fa-address-card"></i> Coordonnées
                    </button>
                    <button class="btn btn-edit-section" data-section="security">
                        <i class="fa fa-lock"></i> Sécurité
                    </button>
                </div>

                <!-- Sections de formulaire -->
                <div class="profile-sections">
                    <!-- Section Identité -->
                    <div class="profile-section active" id="identity-section">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-photo-edit text-center">
                                    <img src="<?= $path ?>img/profile/1.jpg" alt="Photo" class="profile-photo mb-3">
                                    <button type="button" class="btn btn-light btn-block" onclick="document.getElementById('profilePicture').click()">
                                        <i class="fa fa-camera"></i> Changer la photo
                                    </button>
                                    <input type="file" id="profilePicture" accept="image/*" style="display: none;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="nom" value="Kahindo">
                                </div>
                                <div class="form-group">
                                    <label>Post-nom</label>
                                    <input type="text" class="form-control" name="post_nom" value="Mumbere">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input type="text" class="form-control" name="prenom" value="John">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Coordonnées -->
                    <div class="profile-section" id="contact-section" style="display: none;">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="john.kahindo@gmail.com">
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="tel" class="form-control" name="telephone" value="+243 853 102 426">
                        </div>
                    </div>

                    <!-- Section Sécurité -->
                    <div class="profile-section" id="security-section" style="display: none;">
                        <div class="form-group">
                            <label>Ancien mot de passe</label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input type="password" class="form-control" name="new_password">
                        </div>
                        <div class="form-group">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" class="form-control" name="confirm_password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="saveProfile">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<?php
    $contenu = ob_get_clean();
    require_once $template;
?>

<script>
    // Initialiser le carousel
    $('#mainCarousel').carousel({
        interval: 5000
    });

    // Initialiser le slider des communiqués
    $('.announcements-slider').slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    dots: true
                }
            }
        ]
    });

    // Gestion du formulaire et de la sélection de session
    $(document).ready(function() {
        // Empêcher le scroll automatique au chargement
        window.scrollTo(0, 0);
        
        // Modifier la gestion du modal de réinitialisation
        $('.login-footer a').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Empêcher la propagation de l'événement
            
            $('#passwordRecoveryModal').modal({
                backdrop: 'static', // Empêcher la fermeture en cliquant à l'extérieur
                keyboard: false // Empêcher la fermeture avec la touche ESC
            });
        });

        // Gérer uniquement la fermeture via le bouton close
        $('.modal .close').on('click', function() {
            $('#passwordRecoveryModal').modal('hide');
        });

        // Gestion des boutons de session
        $('.session-btn').on('click', function() {
            const session = $(this).data('session');
            $('#sessionName').text(session);
            
            $('#sessionView').fadeOut(300, function() {
                $('#loginView').fadeIn(300);
            });
        });

        // Retour à la sélection de session
        $('#backToSession').on('click', function() {
            $('#loginView').fadeOut(300, function() {
                $('#sessionView').fadeIn(300);
            });
        });

        // Gestion du formulaire de connexion
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            const $btn = $(this).find('button[type="submit"]');
            const originalText = $btn.html();
            const session = $('#sessionName').text();

            $btn.html('<i class="fa fa-spinner fa-spin"></i> Connexion...').prop('disabled', true);

            // Simulation d'authentification (à remplacer par votre vraie logique)
            setTimeout(() => {
                window.location.href = `/dashboard`;
            }, 1500);
        });

        // Gestion des inputs du code de vérification
        $('.code-input').on('keyup', function(e) {
            const $input = $(this);
            const value = $input.val();
            
            // Si un chiffre est entré
            if (value.length === 1) {
                // Passer au champ suivant
                $input.next('.code-input').focus();
            } else if (e.key === 'Backspace') {
                // Revenir au champ précédent
                $input.prev('.code-input').focus();
            }
        });

        // Envoi du code
        $('#sendCodeBtn').on('click', function() {
            const matricule = $('#recoveryMatricule').val();
            if (!matricule) {
                alert('Veuillez entrer votre matricule');
                return;
            }

            $(this).html('<i class="fa fa-spinner fa-spin"></i> Envoi...').prop('disabled', true);

            // Simulation d'envoi de code
            setTimeout(() => {
                $('#step1').hide();
                $('#step2').show();
                $(this).html('Envoyer le code').prop('disabled', false);
            }, 1500);
        });

        // Vérification du code
        $('#verifyCodeBtn').on('click', function() {
            const code = Array.from($('.code-input')).map(input => input.value).join('');
            if (code.length !== 6) {
                alert('Veuillez entrer le code complet');
                return;
            }

            $(this).html('<i class="fa fa-spinner fa-spin"></i> Vérification...').prop('disabled', true);

            // Simulation de vérification
            setTimeout(() => {
                $('#step2').hide();
                $('#step3').show();
                $(this).html('Vérifier le code').prop('disabled', false);
            }, 1500);
        });

        // Réinitialisation du mot de passe
        $('#resetPasswordBtn').on('click', function() {
            const newPassword = $('#newPassword').val();
            const confirmPassword = $('#confirmPassword').val();

            if (!newPassword || !confirmPassword) {
                alert('Veuillez remplir tous les champs');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas');
                return;
            }

            $(this).html('<i class="fa fa-spinner fa-spin"></i> Réinitialisation...').prop('disabled', true);

            // Simulation de réinitialisation
            setTimeout(() => {
                alert('Mot de passe réinitialisé avec succès');
                $('#passwordRecoveryModal').modal('hide');
                $(this).html('Réinitialiser le mot de passe').prop('disabled', false);
                // Réinitialiser le formulaire
                $('.recovery-step').hide();
                $('#step1').show();
            }, 1500);
        });

        // Modification de la gestion du "Lire la suite"
        $('.read-more-btn').each(function() {
            const $btn = $(this);
            const $content = $btn.siblings('.announcement-content');
            
            $btn.on('click', function(e) {
                e.preventDefault();
                $content.toggleClass('expanded');
                
                if ($content.hasClass('expanded')) {
                    $btn.html('Voir moins <i class="fa fa-angle-up"></i>');
                } else {
                    $btn.html('Lire la suite <i class="fa fa-angle-down"></i>');
                }
            });
            
            // Ne pas déclencher automatiquement le clic
            $btn.html('Lire la suite <i class="fa fa-angle-down"></i>');
        });

        // Gestion du modal de profil
        $('#profileModal').on('show.bs.modal', function(e) {
            // Force l'affichage de l'onglet Identité
            $('.nav-tabs a[href="#identite"]').tab('show');
        });

        // Gestion du clic sur le bouton d'édition de photo
        $('.profile-image-edit').on('click', function(e) {
            e.preventDefault();
            $('#profileModal').modal('show');
            // Force l'affichage de l'onglet Identité
            setTimeout(() => {
                $('.nav-tabs a[href="#identite"]').tab('show');
            }, 150);
        });

        // Preview de l'image de profil (dans le modal et la carte)
        $('#profilePicture').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Met à jour l'image dans le modal
                    $('.preview-image').attr('src', e.target.result);
                    // Met à jour l'image dans la carte de profil
                    $('#profileImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Gestion des années académiques
        $('.year-btn').on('click', function() {
            $('.year-btn').removeClass('active');
            $(this).addClass('active');
            
            const year = $(this).data('year');
            // Ajouter ici la logique pour charger les données de l'année sélectionnée
        });

        // Sauvegarde du profil
        $('#saveProfile').on('click', function() {
            const $btn = $(this);
            const originalText = $btn.html();
            
            $btn.html('<i class="fa fa-spinner fa-spin"></i> Enregistrement...').prop('disabled', true);

            // Simulation de sauvegarde
            setTimeout(() => {
                alert('Profil mis à jour avec succès');
                $('#profileModal').modal('hide');
                $btn.html(originalText).prop('disabled', false);
            }, 1500);
        });

        // Gestion de la déconnexion
        $('.btn-logout').on('click', function() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = '/logout';
            }
        });
    });

    // Gestion du bouton "Lire la suite"
    $('.read-more-btn').each(function() {
        $(this).on('click', function() {
            const $content = $(this).siblings('.announcement-content');
            const $btn = $(this);
            
            $content.toggleClass('expanded');
            
            if ($content.hasClass('expanded')) {
                $btn.html('Voir moins <i class="fa fa-angle-up"></i>');
            } else {
                $btn.html('Lire la suite <i class="fa fa-angle-down"></i>');
                
                // Scroll vers le haut du communiqué
                $('html, body').animate({
                    scrollTop: $content.offset().top - 100
                }, 500);
            }
        });
        
        // Déclencher le clic pour initialiser le texte du bouton
        $(this).trigger('click');
    });

    // Gestion des sections du modal de profil
    $(document).ready(function() {
        $('.btn-edit-section').on('click', function() {
            const section = $(this).data('section');
            
            // Activer le bouton
            $('.btn-edit-section').removeClass('active');
            $(this).addClass('active');
            
            // Afficher la section correspondante
            $('.profile-section').hide();
            $(`#${section}-section`).fadeIn(300);
        });

        // Preview de la photo de profil
        $('#profilePicture').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-photo').attr('src', e.target.result);
                    $('#profileImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>