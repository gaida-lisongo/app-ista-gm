<?php
$path = "/config/ista-assets/images";
$page = array(
    'title' => "Formulaire d'inscription",
    'current' => "Inscription",
);

ob_start();
require_once 'components/breadcrumb.php';
?>

<style>
    /* Style général du formulaire */
    .contact-section form {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    /* Style des étapes */
    .form-step-header {
        margin-bottom: 30px;
        position: relative;
    }

    .form-step-header h4 {
        color: #19191a;
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 10px;
    }

    .form-step-header h4:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background: #dfa974;
    }

    /* Style des champs */
    .form-control, select, input[type="text"], input[type="email"], 
    input[type="tel"], input[type="number"], textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        font-size: 15px;
        color: #19191a;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        background: #f9f9f9;
    }

    .form-control:focus, select:focus, input:focus, textarea:focus {
        border-color: #dfa974;
        box-shadow: 0 0 0 3px rgba(223, 169, 116, 0.1);
        outline: none;
    }

    /* Style des labels */
    label {
        display: block;
        margin-bottom: 8px;
        color: #19191a;
        font-weight: 500;
        font-size: 14px;
    }

    /* Style du bouton photo */
    .photo-upload {
        background: #f8f9fa;
        border: 2px dashed #dfa974;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .photo-upload:hover {
        background: #fff;
        border-color: #be8c5c;
    }

    .photo-upload i {
        font-size: 24px;
        color: #dfa974;
        margin-bottom: 10px;
        display: block;
    }

    #photo-preview {
        width: 150px;
        height: 150px;
        border-radius: 8px;
        margin-top: 15px;
        background-color: #f8f9fa;
        border: 2px solid #dfa974;
        display: none;
    }

    /* Style des boutons */
    button {
        padding: 12px 25px;
        border-radius: 5px;
        font-weight: 500;
        font-size: 15px;
        transition: all 0.3s ease;
        margin: 5px;
    }

    button.next-btn {
        background: #dfa974;
        color: white;
    }

    button.prev-btn {
        background: #f8f9fa;
        color: #19191a;
    }

    button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    button.next-btn:hover {
        background: #be8c5c;
    }

    button.prev-btn:hover {
        background: #e8e8e8;
    }

    /* Style des select */
    select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23dfa974' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        padding-right: 40px;
    }

    /* Options de section */
    .section-options {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .radio-card {
        flex: 1;
        min-width: 150px;
        position: relative;
        cursor: pointer;
    }

    .radio-card input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .card-content {
        padding: 20px;
        text-align: center;
        border: 2px solid #e8e8e8;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .card-content i {
        font-size: 24px;
        color: #dfa974;
        margin-bottom: 10px;
        display: block;
    }

    .card-content span {
        display: block;
        color: #19191a;
        font-weight: 500;
    }

    .radio-card input[type="radio"]:checked + .card-content {
        border-color: #dfa974;
        background: rgba(223, 169, 116, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .radio-card:hover .card-content {
        border-color: #dfa974;
    }

    /* Filière card styles */
    .filiere-card {
        display: block;
        width: 100%;
        position: relative;
        cursor: pointer;
    }

    .filiere-card input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .filiere-card .card-content {
        padding: 20px;
        text-align: center;
        border: 2px solid #e8e8e8;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .filiere-card .card-content i {
        font-size: 24px;
        color: #dfa974;
        margin-bottom: 10px;
        display: block;
    }

    .filiere-card .card-content span {
        display: block;
        color: #19191a;
        font-weight: 500;
    }

    .filiere-card input[type="radio"]:checked + .card-content {
        border-color: #dfa974;
        background: rgba(223, 169, 116, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .filiere-card:hover .card-content {
        border-color: #dfa974;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .contact-section form {
            padding: 20px;
        }
        
        button {
            width: 100%;
            margin: 5px 0;
        }
    }

    /* Ajout des styles pour le loader */
.loading-spinner {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    flex-direction: column;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #dfa974;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 10px;
}

.loading-spinner span {
    color: #dfa974;
    font-size: 14px;
    font-weight: 500;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Pour désactiver les boutons pendant le chargement */
.loading .submit-data,
.loading .prev-btn {
    opacity: 0.5;
    pointer-events: none;
}
    </style>

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <p>
                            Merci de remplir le formulaire ci-dessous pour vous inscrire à l'ISTA-GM. Veuillez fournir toutes les informations requises. Nous vous contacterons bientôt pour confirmer votre inscription.
                        </p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Requérant:</td>
                                    <td class="noms-etudiant"><?= $data['nom'] ?> <?= $data['postNom'] ?> <?= $data['preNom'] ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Téléphone:</td>
                                    <td class="telephone-etudiant"><?= $data['telephone'] ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td class="email-etudiant"><?= $data['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Dossier:</td>
                                    <td class="dossier-etudiant"><?= $data['numRef'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <!-- Formulaire étape 1 : Identités -->
                    <form action="#" class="data-identites">
                        <div class="form-step-header">
                            <h4 class="mb-4">Étape 1: Identités</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="sexe">Sexe <i class="fa fa-venus-mars"></i></label>
                                <select id="sexe" name="sexe" class="form-control sexe-etudiant" required>
                                    <option value="">Sélectionner</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                                
                            </div>
                            <div class="col-lg-6">
                                <label for="photo" class="photo-upload">
                                    <i class="fa fa-camera"></i>
                                    <span>Photo d'identité</span>
                                </label>
                                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;" class="photo-etudiant" required>
                                <div id="photo-preview"></div>
                            </div>
                            <div class="col-lg-6">
                                <label for="pays">Pays <i class="fa fa-globe"></i></label>
                                <input type="text" id="pays" name="pays" class="form-control pays-etudiant" required placeholder="Entrez votre pays">

                            </div>
                            <div class="col-lg-6">
                                <label for="province">Province <i class="fa fa-map-marker"></i></label>
                                <input type="text" id="province" name="province" class="form-control province-etudiant" required placeholder="Entrez votre province">
                            </div>
                            <div class="col-lg-6">
                                <label for="lieu_naissance">Lieu de naissance <i class="fa fa-map-marker"></i></label>
                                <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-control lieu-naissance-etudiant" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="date_naissance">Date de naissance <i class="fa fa-calendar"></i></label>
                                <input type="text" id="date_naissance" name="date_naissance" 
                                       placeholder="JJ/MM/AAAA" pattern="\d{2}/\d{2}/\d{4}" class="form-control date-naissance-etudiant" required>

                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="next-btn">Suivant ></button>
                            </div>
                        </div>
                    </form>

                    <!-- Formulaire étape 2 : Coordonnées -->
                    <form action="#" class="data-coordonnees" style="display: none;">
                        <div class="form-step-header">
                            <h4 class="mb-4">Étape 2: Scolarité</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="annee-scol">Année Diplome</label>
                                <input type="number" id="annee-scol" name="annee-scol" class="form-control anneeDiplome-etudiant" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="option-scol">Section Humanité</label>
                                <input type="text" id="section-scol" name="section-scol" class="form-control sectionDiplome-etudiant" required>
                                    <!-- Les options seront chargées en fonction de la section -->
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="option-scol">Option</label>
                                <input type="text" id="option-scol" name="option-scol" class="form-control optionDiplome-etudiant" required>
                                    <!-- Les options seront chargées en fonction de la section -->
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="pourcentage">Pourcentage</label>
                                <input type="number" id="pourcentage" name="pourcentage" 
                                       min="0" max="100" step="0.1" class="form-control pourcentageDiplome-etudiant" required>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="prev-btn">< Précédent</button>
                                <button type="button" class="next-btn">Suivant ></button>
                            </div>
                        </div>
                    </form>

                    <!-- Formulaire étape 3 : Scolaire -->
                    <form action="#" class="data-scolaire" style="display: none;">
                        <div class="form-step-header">
                            <h4 class="mb-4">Étape 3: Académique</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <label>Section</label>
                                <select id="section" name="section" class="form-control" required onchange="loadFilieres()">
                                    <option value="">Choisir une section</option>
                                    <option value="imc">Informatique, Mécanique et Construction</option>
                                    <option value="tem">Télécommunications, Electronique et Maintenance</option>
                                    <option value="elp">Electricité et Préparatoire</option>
                                    <option value="pegaz">Pétrole et Gaz</option>
                                </select>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label>Filière</label>
                                <div id="filieres-container" class="row"></div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label>Classe</label>
                                <select id="classe" name="classe" class="form-control classe-etudiant" required >
                                    <option value="">Choisir une classe</option>
                                    <option value="PREP">Préparatoire</option>
                                    <option value="L1">Prémière Année (L1)</option>
                                    <option value="L2">Deuxième Année (L2)</option>
                                    <option value="L3">Troisième Année (L3)</option>
                                    <option value="M0">Pré-Master (M0)</option>
                                    <option value="M1">Master 1 (M1)</option>
                                    <option value="M2">Master 2 (M2)</option>
                                    <option value="M3">Master Complémentaire (M3)</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="prev-btn">< Précédent</button>
                                <button type="submit" class="submit-data">Soumettre</button>
                            </div>
                            <div class="loading-spinner" style="display: none;">
                                <div class="spinner"></div>
                                <span>Traitement en cours...</span>
                            </div>
                            <span class="msg-success d-block mt-3" style="color: green; display: none;"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
<script>

const filieresConfig = {
    'imc': [
        { id: 'info', name: 'Informatique', icon: 'fa-laptop' },
        { id: 'meca', name: 'Mécanique', icon: 'fa-cogs' },
        { id: 'const', name: 'Construction', icon: 'fa-building' }
    ],
    'tem': [
        { id: 'telecom', name: 'Télécommunications', icon: 'fa-signal' },
        { id: 'electron', name: 'Electronique', icon: 'fa-microchip' },
        { id: 'maint', name: 'Maintenance', icon: 'fa-wrench' }
    ],
    'elp': [
        { id: 'elec', name: 'Électricité', icon: 'fa-bolt' },
        { id: 'prep', name: 'Préparatoire', icon: 'fa-book' }
    ],
    'pegaz': [
        { id: 'petro', name: 'Pétrole', icon: 'fa-oil-can' },
        { id: 'gaz', name: 'Gaz', icon: 'fa-fire' }
    ]
};

function loadFilieres() {
    const section = document.getElementById('section').value;
    const container = document.getElementById('filieres-container');
    container.innerHTML = '';

    if (!section) return;

    filieresConfig[section].forEach(filiere => {
        const col = document.createElement('div');
        col.className = 'col-lg-4 col-md-6 mb-3';
        col.innerHTML = `
            <label class="filiere-card">
                <input type="radio" name="filiere" class="filiere-etudiant" value="${filiere.id}" required>
                <div class="card-content ">
                    <i class="fa ${filiere.icon}"></i>
                    <span>${filiere.name}</span>
                </div>
            </label>
        `;
        container.appendChild(col);
    });
}

    
$(document).ready(function() {
    const apiUrl = '<?= API ?>';
    $('.msg-success').hide();

    // Gestion des étapes
    $('.next-btn').click(function() {
        $(this).closest('form').hide().next('form').show();
    });

    $('.prev-btn').click(function() {
        $(this).closest('form').hide().prev('form').show();
    });

    // Preview de la photo
    $('#photo').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#photo-preview').css({
                    'background-image': `url(${e.target.result})`,
                    'background-size': 'cover',
                    'display': 'block'
                });
            }
            reader.readAsDataURL(file);
        }
    });

    // Formatage de la date
    $('#date_naissance').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 8) value = value.substr(0, 8);
        if (value.length >= 4) {
            value = value.substr(0, 2) + '/' + value.substr(2, 2) + '/' + value.substr(4);
        } else if (value.length >= 2) {
            value = value.substr(0, 2) + '/' + value.substr(2);
        }
        $(this).val(value);
    });

    $('.radio-card input[type="radio"]').change(function() {
        if($(this).is(':checked')) {
            $('.radio-card').removeClass('selected');
            $(this).closest('.radio-card').addClass('selected');
        }
    });

    const selectedSection = localStorage.getItem('selectedSection');
    if (selectedSection) {
        $('#section').val(selectedSection);
        loadFilieres();
    }

    $('.submit-data').click(function(e) {
        e.preventDefault();
        const noms = $('.noms-etudiant').text().trim().split(' ');
        
        // Conversion de la photo en base64
        const photoFile = $('.photo-etudiant')[0].files[0];
        if (photoFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                sendFormData(e.target.result);
            };
            reader.readAsDataURL(photoFile);
        } else {
            sendFormData(null);
        }

        function sendFormData(photoBase64) {
            // Préparation des données
            const data = {
                etudiantData: {
                    nom: noms[0] || '',
                    postNom: noms[1] || '',
                    preNom: noms[2] || '',
                    telephone: $('.telephone-etudiant').text().trim(),
                    email: $('.email-etudiant').text().trim(),
                    numRef: $('.dossier-etudiant').text().trim(),
                    photo: photoBase64
                },
                identitesData: {
                    sexe: $('.sexe-etudiant').val(),
                    pays: $('.pays-etudiant').val(),
                    province: $('.province-etudiant').val(),
                    lieuNaissance: $('.lieu-naissance-etudiant').val(),
                    dateNaissance: $('.date-naissance-etudiant').val()
                },
                scolariteData: {
                    anneeDiplome: $('.anneeDiplome-etudiant').val(),
                    sectionDiplome: $('.sectionDiplome-etudiant').val(),
                    optionDiplome: $('.optionDiplome-etudiant').val(),
                    pourcentageDiplome: $('.pourcentageDiplome-etudiant').val()
                },
                promotionData: {
                    section: $('#section').val(),
                    filiere: $('.filiere-etudiant:checked').val(),
                    niveau: $('.classe-etudiant').val() // Changé de classe à niveau
                }
            };

            // Envoi des données
            $.ajax({
                url: 'https://frozen-chandal-admin-elmes-d89f2982.koyeb.app/api/home/subscrib',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    const { success, message, data } = response;
                    if (success) {
                        // Masquer tous les formulaires
                        $('.data-identites, .data-coordonnees, .data-scolaire').hide();
                        
                        // Afficher le message de succès avec un bouton de retour
                        const successHtml = `
                            <div class="success-container text-center">
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle fa-3x mb-3"></i>
                                    <h4>Inscription réussie !</h4>
                                    <p>Nous avons bien reçu votre inscription.</p>
                                    <p>Votre numéro de référence : <b>${$('.dossier-etudiant').text().trim()}</b></p>
                                    <p>Votre matricule : <b>${data.matricule}</b></p>
                                    <small>Conservez ces informations pour suivre votre dossier.</small>
                                </div>
                                <button type="button" class="return-home btn">
                                    <i class="fa fa-home"></i> Retour à l'accueil
                                </button>
                            </div>
                        `;
                        
                        // Insérer le contenu de succès après le dernier formulaire
                        $('.data-scolaire').after(successHtml);
                        
                        // Ajouter le style pour le bouton de retour
                        $('<style>')
                            .text(`
                                .success-container {
                                    padding: 30px;
                                    background: #fff;
                                    border-radius: 8px;
                                    box-shadow: 0 0 20px rgba(0,0,0,0.05);
                                }
                                .return-home {
                                    margin-top: 20px;
                                    background: #dfa974;
                                    color: white;
                                    padding: 12px 25px;
                                    border: none;
                                    border-radius: 5px;
                                    transition: all 0.3s ease;
                                }
                                .return-home:hover {
                                    background: #be8c5c;
                                    transform: translateY(-2px);
                                    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                                }
                                .alert-success {
                                    border-color: #dfa974;
                                    background-color: rgba(223, 169, 116, 0.1);
                                    color: #19191a;
                                }
                            `)
                            .appendTo('head');
                        
                        // Gérer le clic sur le bouton de retour
                        $('.return-home').click(function() {
                            window.location.href = '/';
                        });
                    } else {
                        alert('Erreur lors de l\'inscription: ' + message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erreur détaillée:', xhr.responseJSON);
                    alert('Erreur lors de l\'inscription: ' + (xhr.responseJSON?.message || error));
                },
                //Pendant le chargement
                beforeSend: function() {
                    $('.loading-spinner').show();
                },
                complete: function() {
                    $('.loading-spinner').hide();
                }
            });
        }
    });
});
</script>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/sona/gabarit.php';