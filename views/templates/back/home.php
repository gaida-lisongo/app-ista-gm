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
                    <!-- Institution Description -->
                    <div class="institution-info mb-5">
                        <h1 class="institution-title">Institut du Bâtiment et des Travaux Publics</h1>
                        <div class="institution-description">
                            <p>L'IBTP est un établissement d'enseignement supérieur spécialisé dans la formation des techniciens 
                            et ingénieurs du bâtiment et des travaux publics. Notre mission est de former les futurs leaders 
                            du secteur de la construction en alliant excellence académique et innovation technologique.</p>
                        </div>
                    </div>

                    <!-- Announcements Section -->
                    <div class="announcements-section">
                        <h2 class="section-title">Communiqués</h2>
                        <?php
                        $announcements = [
                            [
                                'title' => 'Ouverture des Inscriptions 2025-2026',
                                'service' => 'Service Académique',
                                'date' => '17 Juin 2025',
                                'content' => [
                                    'Les inscriptions pour l\'année académique 2025-2026 débuteront le 1er juillet 2025. Les nouveaux étudiants sont invités à se présenter au service académique munis des documents suivants :',
                                    'Un diplôme d\'État ou son équivalent, 4 photos passeport, une photocopie de la carte d\'identité, un certificat de nationalité, un certificat médical.',
                                    'Les frais d\'inscription s\'élèvent à 50$ et sont payables uniquement par Mobile Money ou carte bancaire. Les inscriptions se dérouleront selon le calendrier suivant :',
                                    'Du 1er au 15 juillet : Filière Construction et Travaux Publics. Du 16 au 31 juillet : Filière Architecture et Urbanisme. Du 1er au 15 août : Filière Génie Civil',
                                    'Les étudiants sont priés de respecter scrupuleusement ce calendrier. Tout retard dans l\'inscription entraînera des pénalités financières conformément au règlement en vigueur.'
                                ]
                            ],
                            [
                                'title' => 'Nouveau Partenariat Industriel',
                                'service' => 'Direction des Relations Industrielles',
                                'date' => '15 Juin 2025',
                                'content' => [
                                    'L\'IBTP est fier d\'annoncer la signature d\'un partenariat stratégique avec le groupe SAFRICAS, leader dans le secteur de la construction en Afrique centrale.',
                                    'Ce partenariat comprend plusieurs volets majeurs : l\'accueil des stagiaires, le renforcement des capacités techniques, l\'équipement des laboratoires et le développement de programmes de formation continue.',
                                    'Les étudiants bénéficieront d\'opportunités de stages rémunérés et de possibilités d\'embauche directe après l\'obtention de leur diplôme.',
                                    'Un programme de mentorat sera également mis en place, permettant aux étudiants d\'être accompagnés par des professionnels expérimentés tout au long de leur cursus.',
                                    'Des séminaires techniques seront organisés chaque trimestre pour présenter les dernières innovations du secteur.'
                                ]
                            ],
                            [
                                'title' => 'Séminaire BIM Management',
                                'service' => 'Département Construction',
                                'date' => '12 Juin 2025',
                                'content' => ['Un séminaire sur le BIM Management sera organisé du 20 au 25 juin 2025. Les inscriptions sont ouvertes.']
                            ],
                            [
                                'title' => 'Résultats du Premier Semestre',
                                'service' => 'Direction des Études',
                                'date' => '10 Juin 2025',
                                'content' => ['Les résultats du premier semestre sont disponibles. Les étudiants peuvent les consulter via leur espace personnel.']
                            ],
                            [
                                'title' => 'Maintenance des Laboratoires',
                                'service' => 'Service Technique',
                                'date' => '8 Juin 2025',
                                'content' => ['Les laboratoires seront fermés du 20 au 25 juin pour maintenance annuelle. Les cours pratiques seront reportés.']
                            ]
                        ];

                        foreach($announcements as $announcement): ?>
                        <div class="announcement-card">
                            <div class="announcement-header">
                                <span class="service-badge"><?= $announcement['service'] ?></span>
                                <span class="announcement-date">
                                    <i class="fa fa-calendar"></i> <?= $announcement['date'] ?>
                                </span>
                            </div>
                            <div class="announcement-body">
                                <h3><?= $announcement['title'] ?></h3>
                                <div class="announcement-content">
                                    <?php foreach($announcement['content'] as $paragraph): ?>
                                        <p><?= $paragraph ?></p>
                                    <?php endforeach; ?>
                                </div>
                                <button class="read-more-btn">Lire la suite</button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right Column: Login Section -->
                <div class="col-lg-4">
                    <div class="login-card">
                        <!-- Session Selection View -->
                        <div id="sessionView">
                            <div class="login-header">
                                <img src="<?= $path ?>img/logo/logo.png" alt="Logo IBTP" class="login-logo">
                                <h2>Sélectionnez votre session</h2>
                            </div>
                            <div class="session-options">
                                <button class="session-btn" data-session="Titulaire">
                                    <i class="fa fa-user"></i>
                                    <span>Titulaire</span>
                                </button>
                                <button class="session-btn" data-session="Section">
                                    <i class="fa fa-users"></i>
                                    <span>Section</span>
                                </button>
                                <button class="session-btn" data-session="Jury">
                                    <i class="fa fa-gavel"></i>
                                    <span>Jury</span>
                                </button>
                                <button class="session-btn" data-session="Inscription">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span>Inscription</span>
                                </button>
                                <button class="session-btn" data-session="Finance">
                                    <i class="fa fa-money"></i>
                                    <span>Finance</span>
                                </button>
                                <button class="session-btn" data-session="Coge">
                                    <i class="fa fa-building"></i>
                                    <span>Coge</span>
                                </button>
                            </div>
                        </div>

                        <!-- Login Form View (Initially Hidden) -->
                        <div id="loginView" style="display: none;">
                            <div class="login-header">
                                <h3 class="selected-session">Session <span id="sessionName">Titulaire</span></h3>
                                <p class="login-subtitle">Veuillez vous authentifier</p>
                            </div>
                            <form id="loginForm" class="login-form">
                                <div class="form-group">
                                    <label>Matricule</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="matricule" 
                                           placeholder="Votre matricule"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" 
                                           class="form-control" 
                                           name="password"
                                           placeholder="Votre mot de passe"
                                           required>
                                </div>
                                <button type="submit" class="btn btn-login">
                                    <i class="fa fa-sign-in"></i> Se connecter
                                </button>
                                <button type="button" class="btn btn-outline-secondary mt-3" id="backToSession">
                                    <i class="fa fa-arrow-left"></i> Changer de session
                                </button>
                                <div class="login-footer">
                                    <a href="#" data-toggle="modal" data-target="#passwordRecoveryModal">Mot de passe oublié ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de récupération de mot de passe -->
<div class="modal fade" id="passwordRecoveryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Récupération de mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="recovery-steps">
                    <!-- Étape 1: Saisie du matricule -->
                    <div class="recovery-step" id="step1">
                        <p class="mb-4">Entrez votre matricule pour recevoir un code de vérification</p>
                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" class="form-control" id="recoveryMatricule" required>
                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="sendCodeBtn">
                            Envoyer le code
                        </button>
                    </div>

                    <!-- Étape 2: Vérification du code -->
                    <div class="recovery-step" id="step2" style="display: none;">
                        <p class="mb-4">Entrez le code de vérification envoyé à votre email</p>
                        <div class="form-group">
                            <label>Code de vérification</label>
                            <div class="verification-code">
                                <input type="text" class="form-control code-input" maxlength="1" required>
                                <input type="text" class="form-control code-input" maxlength="1" required>
                                <input type="text" class="form-control code-input" maxlength="1" required>
                                <input type="text" class="form-control code-input" maxlength="1" required>
                                <input type="text" class="form-control code-input" maxlength="1" required>
                                <input type="text" class="form-control code-input" maxlength="1" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="verifyCodeBtn">
                            Vérifier le code
                        </button>
                    </div>

                    <!-- Étape 3: Nouveau mot de passe -->
                    <div class="recovery-step" id="step3" style="display: none;">
                        <p class="mb-4">Définissez votre nouveau mot de passe</p>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="resetPasswordBtn">
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </div>
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
                if(session.toLowerCase() === 'section') {
                    window.location.href = `/section/dashboard`;
                } else if(session.toLowerCase() === 'jury') {
                    window.location.href = `/jury/dashboard`;
                } else if(session.toLowerCase() === 'inscription') {
                    window.location.href = `/inscription/dashboard`;
                } else if(session.toLowerCase() === 'finance') {
                    window.location.href = `/finance/dashboard`;
                } else if(session.toLowerCase() === 'coge') {
                    window.location.href = `/coge/dashboard`;
                } else {
                    window.location.href = `/dashboard`;
                }
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
</script>