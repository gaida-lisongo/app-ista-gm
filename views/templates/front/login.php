<?php
    $path = "/config/ista-assets/images";
    ob_start();
?>

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-5">
                    <div class="login-image-container">
                        <img src="<?= $path ?>/students.jpg" alt="ISTA-GM Logo">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form action="#" class="contact-form" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Connexion Étudiante</h2>
                                <p class="login-description">
                                    Bienvenue sur votre espace étudiant de l'ISTA/GM. Connectez-vous pour :
                                </p>
                                <ul class="login-benefits">
                                    <li><i class="fa fa-book"></i> Accéder à vos ressources pédagogiques</li>
                                    <li><i class="fa fa-edit"></i> Consulter vos notes et résultats</li>
                                    <li><i class="fa fa-comments"></i> Interagir avec vos professeurs</li>
                                    <li><i class="fa fa-user"></i> Mettre à jour vos informations personnelles</li>
                                </ul>
                                <p class="login-info">
                                    <i class="fa fa-info-circle"></i> Votre matricule vous est communiqué par le service académique. 
                                    Pour votre première connexion, utilisez le mot de passe temporaire fourni par l'administration.
                                </p>
                                <table class="login-form-table">
                                    <tbody>
                                        <tr>
                                            <td class="label-col">Matricule:</td>
                                            <td class="input-cell">
                                                <input type="text" 
                                                       class="matricule-etudiant" 
                                                       placeholder="Votre Matricule" 
                                                       autocomplete="off"
                                                       name="matricule">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-col">Mot de passe:</td>
                                            <td class="input-cell">
                                                <input type="password" 
                                                       class="mdp-etudiant" 
                                                       placeholder="Votre Mot de passe" 
                                                       autocomplete="new-password"
                                                       name="password">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit">Se connecter</button>
                            </div>
                            <div class="col-lg-12">
                                <div class="loading-spinner" style="display: none;">
                                    <div class="spinner"></div>
                                    <span>Connexion en cours...</span>
                                </div>
                                <div class="msg-error"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
<style>
.login-image-container {
    height: 100%;
    min-height: 500px; /* Hauteur minimale */
    position: relative;
    overflow: hidden;
    border-radius: 5px;
}

.login-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    position: absolute;
    top: 0;
    left: 0;
}

/* Ajustement pour maintenir le formulaire aligné */
.contact-section .row {
    min-height: 500px;
}

/* Assurer que le conteneur du formulaire prend toute la hauteur */
.contact-text {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.login-description {
    color: #19191a;
    margin-bottom: 20px;
    font-size: 16px;
}

.login-benefits {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
}

.login-benefits li {
    color: #707079;
    margin-bottom: 12px;
    padding-left: 25px;
    position: relative;
}

.login-benefits li i {
    color: #dfa974;
    position: absolute;
    left: 0;
    top: 4px;
}

.login-info {
    background: rgba(223, 169, 116, 0.1);
    padding: 15px;
    border-radius: 5px;
    color: #707079;
    font-size: 14px;
    margin-bottom: 25px;
}

.login-info i {
    color: #dfa974;
    margin-right: 8px;
}

/* Style du tableau de formulaire */
.login-form-table {
    width: 100%;
    margin-bottom: 25px;
}

.login-form-table tr {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.login-form-table td.label-col {
    min-width: 120px;
    color: #707079;
    font-weight: 500;
    padding-right: 20px;
}

.login-form-table td.input-cell {
    flex: 1;
}

.login-form-table input {
    width: 100%;
    height: 46px;
    border: 1px solid #ebebeb;
    border-radius: 4px;
    padding: 0 15px;
    color: #19191a;
    transition: all 0.3s;
}

.login-form-table input:focus {
    border-color: #dfa974;
    outline: none;
}

.login-form-table input::placeholder {
    color: #707079;
}

/* Style pour le message d'erreur/succès */
.msg-error {
    display: none;
    padding: 15px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: center;
    background-color: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

.msg-error.success {
    background-color: rgba(40, 167, 69, 0.1);
    color: #28a745;
}

/* Style pour le spinner */
.loading-spinner {
    display: none;
    text-align: center;
    margin-top: 20px;
}

.spinner {
    display: inline-block;
    width: 40px;
    height: 40px;
    border: 4px solid rgba(223, 169, 116, 0.1);
    border-left-color: #dfa974;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.loading-spinner span {
    display: block;
    margin-top: 10px;
    color: #707079;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Style pour le formulaire désactivé */
.form-disabled {
    opacity: 0.7;
    pointer-events: none;
}
</style>
<script>
    $(document).ready(function() {
        try {
            $('.contact-form').on('submit', function(e) {
                e.preventDefault();
                const matricule = $('.matricule-etudiant').val().trim();
                const password = $('.mdp-etudiant').val().trim();
    
                if (matricule === '' || password === '') {
                    $('.msg-error').text('Veuillez remplir tous les champs.').show();
                    return;
                }
    
                // Simulate a login request
                $('.msg-error').hide();
                $('.contact-form').addClass('form-disabled');
                $('.loading-spinner').show();

                const payload = {
                    matricule: matricule,
                    mdp: password
                };

                console.log('Payload:', payload);

                $.ajax({
                    url: '<?= API ?>/etudiant/login',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(response) {
                        console.log('Response:', response);
                        if (response.success) {
                            const {user, token} = response.data
                            
                            // Stocker les données dans localStorage
                            localStorage.setItem('user', JSON.stringify(user));
                            localStorage.setItem('token', token);
                            
                            // Afficher le message de succès
                            $('.msg-error')
                                .text('Connexion réussie ! Redirection...')
                                .addClass('success')
                                .show();

                            // Rediriger vers le tableau de bord après 1.5 secondes
                            setTimeout(() => {
                                window.location.href = '/user/dashboard';
                            }, 1500);
                        } else {
                            $('.msg-error').text(response.message || 'Échec de la connexion.').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur de connexion :', error);
                        $('.msg-error').text('Une erreur est survenue. Veuillez réessayer plus tard.').show();
                    }
                });
    
                setTimeout(() => {
                    $('.loading-spinner').hide();
                    $('.contact-form').removeClass('form-disabled');
                    $('.msg-error').text('Connexion réussie !').addClass('success').show();
                }, 2000);
            });
        } catch (error) {
            console.error('Erreur lors de la soumission du formulaire :', error);
            $('.msg-error').text('Une erreur est survenue. Veuillez réessayer plus tard.').show();
            
        }
    });
</script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
