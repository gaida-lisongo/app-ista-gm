<!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">                    
                    <div class="hero-text">
                        <h1>Façonnez Votre Avenir à l'ISTA</h1>
                        <p>Rejoignez l'excellence en technique appliquée ! Formez-vous aux métiers d'avenir avec nos programmes 
                        spécialisés et devenez un professionnel hautement qualifié. Inscrivez-vous maintenant pour la rentrée 
                        académique et transformez vos ambitions en réalité.</p>
                        <a href="#formations" class="primary-btn">Découvrir nos formations</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">                    
                    <div class="booking-form">
                        <h3>Inscrivez-vous maintenant</h3>
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="check-date">
                                <label for="nom-req">Votre nom:</label>
                                <input type="text" class="form-input" name="nom-req" id="nom-req" placeholder="Entrez votre Nom">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="check-date">
                                <label for="postNom-req">Votre Post-nom:</label>
                                <input type="text" class="form-input" name="postNom-req" id="postNom-req" placeholder="Entrez votre Post-nom">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="check-date">
                                <label for="preNom-req">Votre Prenom:</label>
                                <input type="text" class="form-input" name="preNom-req" id="preNom-req" placeholder="Entrez votre Prenom">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="check-date">
                                <label for="telephone-req">Votre Téléphone:</label>
                                <input type="tel" class="form-input" name="telephone-req" id="telephone-req" placeholder="Entrez votre Téléphone">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="check-date">
                                <label for="email-req">Votre Email:</label>
                                <input type="email" class="form-input" name="email-req" id="email-req" placeholder="Entrez votre Email">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="upload-docs">
                                <label for="documents" class="upload-label">
                                    <i class="fa fa-cloud-upload"></i>
                                    Charger vos documents
                                </label>
                                <input type="file" id="documents" name="documents[]" multiple 
                                       accept=".pdf,.jpg,.jpeg,.png" style="display: none;">
                                <div id="selected-files" class="selected-files"></div>
                            </div>
                            <button type="submit">S'inscrire maintenant</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="/config/ista-assets/images/banner-1.png"></div>
            <div class="hs-item set-bg" data-setbg="/config/ista-assets/images/banner-2.png"></div>
            <div class="hs-item set-bg" data-setbg="/config/ista-assets/images/banner-3.png"></div>
        </div>
    </section>
    <!-- Hero Section End -->
    <script>
        $(document).ready(function() {
            // Gestion des fichiers uploadés
            $('#documents').on('change', function(e) {
                const files = Array.from(e.target.files);
                const container = $('#selected-files');
                container.empty();
                
                files.forEach(file => {
                    container.append(`<div>
                        <i class="fa fa-file"></i> 
                        ${file.name} (${(file.size / 1024).toFixed(2)} KB)
                    </div>`);
                });
            });


        });
    </script>
<style>
    .upload-docs {
        margin: 15px 0;
    }

    .upload-label {
        display: inline-block;
        padding: 12px 20px;
        background: #dfa974;
        color: #ffffff;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        text-align: center;
    }

    .upload-label:hover {
        background: #be8c5c;
    }

    .upload-label i {
        margin-right: 8px;
    }

    .selected-files {
        margin-top: 10px;
        font-size: 14px;
        color: #666;
    }

    .selected-files div {
        margin: 5px 0;
        padding: 5px;
        background: #f8f9fa;
        border-radius: 3px;
    }
</style>