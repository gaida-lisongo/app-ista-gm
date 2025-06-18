<?php
    $path = "/config/ista-assets/images";

    ob_start();
?>
    <style>
        .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #DFA974;
            color: white;
            border-radius: 2px;
            transition: all 0.3s;
        }
        .custom-file-upload:hover {
            background-color: #cc9563;
        }
        .preuve-input {
            display: none;
        }
        #file-name {
            margin-top: 5px;
            font-size: 14px;
            color: #707079;
        }
        .data-content {
            width: 100%;
            height: 150px;
            padding: 12px;
            border: 1px solid #e5e5e5;
            border-radius: 2px;
            resize: vertical;
            font-size: 14px;
            color: #19191a;
            transition: border-color 0.3s ease;
            background-color: #ffffff;
            margin-bottom: 20px;
        }
        .data-content:focus {
            border-color: #DFA974;
            outline: none;
            box-shadow: 0 0 5px rgba(223, 169, 116, 0.2);
        }
        .data-content::placeholder {
            color: #707079;
        }
        .titulaire-card {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        .titulaire-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            display: block;
            border: 3px solid #DFA974;
        }
        .titulaire-info {
            text-align: center;
        }
        .titulaire-info h4 {
            color: #19191a;
            margin-bottom: 10px;
            font-weight: 500;
        }
        .titulaire-info p {
            color: #707079;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .titulaire-contact {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e5e5;
        }
        .titulaire-contact a {
            color: #DFA974;
            text-decoration: none;
            transition: color 0.3s;
        }
        .titulaire-contact a:hover {
            color: #cc9563;
        }
        .loader-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .loader {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #DFA974;
            border-top: 4px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loader p {
            margin-top: 10px;
            color: #19191a;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
        }

        .qr-code-container {
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .qr-code-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .review-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .qr-section {
            flex: 0 0 150px; /* Largeur fixe pour le QR code */
        }

        .review-details {
            flex: 1; /* Prend le reste de l'espace disponible */
        }

        .ri-text span {
            color: #dfa974;
            font-size: 14px;
            font-weight: 500;
        }

        .ri-text .rating {
            margin: 10px 0;
        }

        .ri-text h5 {
            color: #19191a;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .ri-text p {
            color: #707079;
            line-height: 1.6;
        }

        .action-btn {
            background-color: #DFA974;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .action-btn:hover {
            background-color: #cc9563;
        }

        .modal-header {
            background-color: #DFA974;
            color: white;
            padding: 15px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-title {
            margin: 0;
            font-size: 18px;
            font-weight: 500;
        }

        .close {
            color: white;
            opacity: 1;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #DFA974;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-details {
            flex: 1;
        }

        .modal-user-name {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
            color: #19191a;
        }

        .modal-user-matricule,
        .modal-user-email {
            margin: 5px 0;
            font-size: 14px;
            color: #707079;
        }

        .submit-btn {
            background-color: #DFA974;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #cc9563;
        }

        /* Ajoutez ces styles */
        .section-title {
            color: #dfa974;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ebebeb;
        }

        .profile-preview-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #dfa974;
            margin-top: 10px;
        }

        .form-control {
            height: 45px;
            border: 1px solid #ebebeb;
            border-radius: 4px;
            padding: 0 15px;
            margin-bottom: 15px;
            width: 100%;
            display: block;
        }

        /* Style spécifique pour les selects */
        select.form-control {
            width: 100%;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23707079' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 15px;
            padding-right: 45px;
        }

        select.form-control::-ms-expand {
            display: none;
        }

        select.form-control:focus {
            border-color: #dfa974;
            outline: none;
            box-shadow: none;
        }

        /* Style pour les tabs */
        #user-tabs {
            margin-top: 20px;
        }

        .ui-tabs {
            padding: 0;
            border: none;
            box-shadow: none;
        }

        .ui-tabs .ui-tabs-nav {
            background: none;
            border: none;
            padding: 0;
            margin-bottom: 30px;
            border-bottom: 2px solid #f3f3f3;
        }

        .ui-tabs .ui-tabs-nav li {
            background: none;
            border: none !important;
            margin: 0 30px 0 0;
            padding: 0;
        }

        .ui-tabs .ui-tabs-nav li a {
            color: #707079;
            font-size: 16px;
            font-weight: 500;
            padding: 15px 0;
            text-decoration: none;
        }

        .ui-tabs .ui-tabs-nav li.ui-tabs-active a {
            color: #dfa974;
            border: none;
            background: none;
        }

        .ui-tabs .ui-tabs-nav li.ui-tabs-active:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #dfa974;
        }

        .ui-tabs .ui-tabs-panel {
            padding: 20px 0;
            border: none;
            background: none;
        }

        /* Supprimer tous les styles par défaut de jQuery UI */
        .ui-widget-content,
        .ui-widget-header,
        .ui-state-default,
        .ui-state-active,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active {
            background: none;
            border: none;
            border-radius: 0;
        }

        /* Style pour le contenu de la modale */
        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #19191a;
            font-weight: 500;
        }

        /* Styles pour la modal et les tabs */
        .modal-dialog.modal-lg {
            max-width: 900px;
            margin: 1.75rem auto;
        }

        .modal-content {
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        /* Supprimer toutes les bordures des tabs */
        .ui-tabs,
        .ui-tabs .ui-tabs-nav,
        .ui-tabs .ui-tabs-nav li,
        .ui-tabs .ui-tabs-panel,
        .ui-widget-content,
        .ui-widget-header {
            border: none !important;
            background: none !important;
            padding: 0 !important;
        }

        /* Style pour l'indicateur d'onglet actif */
        .ui-tabs .ui-tabs-nav li.ui-tabs-active {
            margin: 0;
            padding: 0;
        }

        .ui-tabs .ui-tabs-nav li a {
            padding: 15px 0;
            margin-right: 30px;
        }

        /* Supprimer le focus outline */
        .ui-tabs .ui-tabs-nav li.ui-tabs-active a:focus,
        .ui-tabs .ui-tabs-nav li a:focus {
            outline: none;
            box-shadow: none;
        }

        /* Style pour la section photo de profil */
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-image-container {
            display: inline-block;
        }

        .profile-preview-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #dfa974;
            margin-bottom: 15px;
        }

        .profile-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 10px;
        }

        .profile-buttons .action-btn {
            padding: 8px 15px;
            font-size: 14px;
        }

        .btn-remove {
            background-color: #dc3545;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        /* Ajustement pour la mise en page sur deux colonnes */
        .form-row {
            margin-left: -15px;
            margin-right: -15px;
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-6 {
            padding: 0 15px;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .preuve-input {
            height: 45px;
            border: 1px solid #ebebeb;
            border-radius: 4px;
            padding: 0 15px;
            width: 100%;
            color: #19191a;
            font-size: 14px;
        }

        .check-date {
            margin-bottom: 20px;
        }

        .check-date label {
            display: block;
            margin-bottom: 8px;
            color: #707079;
            font-weight: 500;
        }

        /* Style pour le select de devise */
        .select-option select {
            height: 45px;
            border: 1px solid #ebebeb;
            border-radius: 4px;
            padding: 0 15px;
            width: 100%;
            color: #19191a;
            font-size: 14px;
            background-color: white;
        }

        /* Style pour le bouton de soumission */
        .room-booking button {
            width: 100%;
            height: 45px;
            background: #dfa974;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .room-booking button:hover {
            background: #cc9563;
        }

        /* Style pour le conteneur des tabs */
        .tab-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .nav-tabs {
            border-bottom: 2px solid #f3f3f3;
            margin-bottom: 25px;
        }

        .nav-tabs > li {
            margin-right: 30px;
        }

        .nav-tabs > li > a {
            color: #707079;
            font-size: 16px;
            font-weight: 500;
            padding: 15px 0;
            border: none;
            position: relative;
            background: none;
        }

        .nav-tabs > li.active > a,
        .nav-tabs > li > a:hover {
            color: #dfa974;
            background: none;
            border: none;
        }

        .nav-tabs > li.active > a:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #dfa974;
        }

        /* Style pour les cartes horizontales */
        .card-horizontal {
            display: flex;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card-horizontal:hover {
            transform: translateY(-2px);
        }

        .card-img {
            flex: 0 0 200px;
            background-position: center;
            background-size: cover;
        }

        .card-body {
            flex: 1;
            padding: 20px;
        }

        .card-title {
            color: #19191a;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .card-subtitle {
            color: #dfa974;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card-text {
            color: #707079;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #f3f3f3;
        }

        .card-stats {
            display: flex;
            gap: 15px;
        }
        /* Style pour les cartes de recharge */
        .recharge-header {
            margin-bottom: 15px;
        }

        .recharge-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .recharge-info {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 1;
        }

        .recharge-action {
            flex-shrink: 0;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #707079;
            font-size: 14px;
            white-space: nowrap;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            white-space: nowrap;
        }

        .card-subtitle {
            color: #707079;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Style pour les boutons d'action */
        .action-btn {
            padding: 8px 15px;
            font-size: 14px;
            white-space: nowrap;
        }
    </style>

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div id="loader" class="loader-container">
            <div class="loader">
                <div class="spinner"></div>
                <p>Chargement des informations du cours...</p>
            </div>
        </div>

        <div id="content" class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!--Tabulations (Notes de cours, Travaux, Recharges) -->
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#notes" data-toggle="tab">Notes de cours</a></li>
                            <li><a href="#travaux" data-toggle="tab">Travaux</a></li>
                            <li><a href="#recharges" data-toggle="tab">Recharges</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="notes">
                                <div class="card-horizontal">
                                    <div class="card-img" style="background-image: url('<?= $path ?>/ista-profile.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">Mathématiques Appliquées</h4>
                                        <div class="card-subtitle">Prof. Jean Dupont</div>
                                        <p class="card-text">Cours avancé couvrant les concepts d'algèbre linéaire et calculs différentiel.</p>
                                        <div class="card-footer">
                                            <div class="card-stats">
                                                <div class="stat-item">
                                                    <i class="fa fa-file-pdf-o"></i> 12 documents
                                                </div>
                                                <div class="stat-item">
                                                    <i class="fa fa-clock-o"></i> Mis à jour il y a 2 jours
                                                </div>
                                            </div>
                                            <button class="action-btn">
                                                <i class="fa fa-download"></i> Télécharger
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ajoutez d'autres cartes similaires -->
                            </div>

                            <div class="tab-pane fade" id="travaux">
                                <div class="card-horizontal">
                                    <div class="card-img" style="background-image: url('<?= $path ?>/ista-profile.png')"></div>
                                    <div class="card-body">
                                        <h4 class="card-title">Projet de Construction</h4>
                                        <div class="card-subtitle">Date limite : 25 juin 2025</div>
                                        <p class="card-text">Conception et modélisation d'un pont suspendu avec calculs de résistance.</p>
                                        <div class="card-footer">
                                            <div class="card-stats">
                                                <div class="stat-item">
                                                    <i class="fa fa-users"></i> Travail en groupe
                                                </div>
                                                <div class="stat-item">
                                                    <i class="fa fa-calendar"></i> 10 jours restants
                                                </div>
                                            </div>
                                            <button class="action-btn">
                                                <i class="fa fa-upload"></i> Soumettre
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="recharges">
                                <div class="card-horizontal">
                                    <div class="card-body">
                                        <h4 class="card-title">Recharge #REF-001</h4>
                                        <div class="card-subtitle">15 juin 2025</div>
                                        <div class="card-text">
                                            <div class="stat-item">
                                                <i class="fa fa-money"></i> Montant: 50 USD
                                            </div>
                                            <div class="stat-item">
                                                <i class="fa fa-phone"></i> +243853102426
                                            </div>
                                            <div class="stat-item">
                                                <i class="fa fa-check-circle"></i> Statut: Validé
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="titulaire-card">
                        <img src="<?= $path ?>/default-etudiant.png" alt="Photo du titulaire" class="titulaire-photo">
                        <div class="titulaire-info">
                            <h4 class="titulaire-nom"></h4>
                            <p class="titulaire-grade"><i class="fa fa-graduation-cap"></i> </p>
                            <p class="titulaire-disponibilite"><i class="fa fa-venus-mars"></i></p>
                            <div class="titulaire-contact">
                                <p><i class="fa fa-envelope"></i> <a href="mailto:john.doe@example.com" class="titulaire-email"></a></p>
                                <p><i class="fa fa-phone"></i> <a href="tel:+123456789" class="titulaire-phone"></a></p>
                            </div>
                            <div class="rd-title">
                                <div class="rd-title">
                                    <button class="action-btn" data-toggle="modal" data-target="#profileModal">
                                        <i class="fa fa-user-circle"></i> Profile
                                    </button>
                                    <button class="action-btn" data-toggle="modal" data-target="#accountModal">
                                        <i class="fa fa-lock"></i> Compte
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="room-booking">
                        <h3>Faire une recharge</h3>
                        <form action="#" id="rechargeForm">
                            <div class="select-option">
                                <label for="devise-rech">Devise:</label>
                                <select id="devise-rech" required>
                                    <option value="">Choisir la devise</option>
                                    <option value="CDF">Franc Congolais</option>
                                    <option value="USD">Dollars</option>
                                </select>
                            </div>
                            <div class="check-date">
                                <label for="montant-rech">Montant:</label>
                                <input type="text" id="montant-rech" required>
                            </div>
                            <div class="check-date">
                                <!-- le numéro de téléphone doit obligatoirement commencer par +243 et avoir 9 chiffres ensuite exemple +243853102426 -->
                                <label for="telephone-rech">Téléphone:</label>
                                <input type="tel" id="telephone-rech" pattern="^\+243[0-9]{9}$" placeholder="+243XXXXXXXXX" required>
                            </div>
                            <button type="submit">Soumettre la demande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Profile Modal avec Tabs -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil Étudiant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="profile-tabs">
                        <ul>
                            <li><a href="#identity-tab">Identité</a></li>
                            <li><a href="#contact-tab">Coordonnées</a></li>
                        </ul>
                        
                        <div id="identity-tab">
                            <form id="identityForm">
                                <!-- Photo de profil avec boutons -->
                                <div class="profile-header">
                                    <div class="profile-image-container">
                                        <img src="<?= $path ?>/default-etudiant.png" alt="Preview" class="profile-preview-img">
                                        
                                        <div class="profile-buttons">
                                            <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;">
                                            <button type="button" class="action-btn" onclick="document.getElementById('avatar').click()">
                                                <i class="fa fa-camera"></i> Changer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <span class="status-indicator-profile"></span>

                                <!-- Informations sur deux colonnes -->
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" name="nom" id="userNom">
                                        </div>
                                        <div class="form-group">
                                            <label>Post-nom</label>
                                            <input type="text" class="form-control" name="post_nom" id="userPostNom">
                                        </div>
                                        <div class="form-group">
                                            <label>Prénom</label>
                                            <input type="text" class="form-control" name="prenom" id="userPrenom">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lieu de naissance</label>
                                            <input type="text" class="form-control" name="lieu_naissance" id="userLieuNaissance">
                                        </div>
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input type="date" class="form-control" name="date_naissance" id="userDateNaissance">
                                        </div>
                                        <div class="form-group">
                                            <label>Sexe</label>
                                            <select class="form-control" name="sexe" id="userSexe">
                                                <option value="M">Masculin</option>
                                                <option value="F">Féminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="submit-btn">Mettre à jour l'identité</button>
                            </form>
                        </div>
                        
                        <div id="contact-tab">
                            <form id="contactForm">
                                <span class="status-indicator-profile"></span>
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="tel" class="form-control" name="telephone" id="userTelephone">
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control" name="adresse" id="userAdresse">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="e_mail" id="userEmail">
                                </div>
                                <button type="submit" class="submit-btn">Mettre à jour les coordonnées</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Modal (Mot de passe) -->
    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="passwordForm">
                        <div class="form-group">
                            <label>Mot de passe actuel</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmer le nouveau mot de passe</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                        <button type="submit" class="submit-btn">Changer le mot de passe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- 
    <script>
    document.getElementById('file-in').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('file-name').textContent = fileName;
    });
    </script> -->
<script>
    

    const apiUrl = 'https://server-ista-gm-sncd.onrender.com/api/';
    const user = JSON.parse(localStorage.getItem('user'));
    const token = localStorage.getItem('token');

    if (!user || !token) {
        window.location.href = '/login';
    }
    
    user.avatar ? $('.titulaire-photo').attr('src', `${user.avatar}`) : $('.titulaire-photo').attr('src', '<?= $path ?>/default-etudiant.png');
    $('.titulaire-nom').append(` ${user.nom} ${user.post_nom} ${user.prenom || ''}`);
    $('.titulaire-grade').append(user.matricule);
    $('.titulaire-disponibilite').append(user.sexe ? `${user.sexe == "M" ? "Masculin" : "Féminin"}` : 'Sexe non spécifié');
    $('.titulaire-email').append(user.e_mail ? user.e_mail : 'contact@ista-gm.net');
    $('.titulaire-email').attr('href', `mailto:${user.e_mail ? user.e_mail : 'contact@ista-gm.net'}`);
    $('.titulaire-phone').append(user.telephone ? user.telephone : 'Non spécifié');
    $('.titulaire-phone').attr('href', `tel:${user.telephone ? user.telephone : ''}`);
    // Initialiser les tabs
   
    // Initialiser les tabs
    $("#profile-tabs").tabs();
    
    if (user) {
        $('#userNom').val(user.nom || '');
        $('#userPostNom').val(user.post_nom || '');
        $('#userPrenom').val(user.prenom || '');
        $('#userSexe').val(user.sexe || 'M');
        $('#userDateNaissance').val(user.date_naissance || '');
        $('#userLieuNaissance').val(user.lieu_naissance || '');
        $('#userTelephone').val(user.telephone || '');
        $('#userAdresse').val(user.adresse || '');
        $('#userEmail').val(user.e_mail || '');
        
        if (user.avatar) {
            $('.profile-preview-img').attr('src', `${user.avatar}`);
        }
    }
    
    // Preview de l'avatar
    $('#avatar').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('.profile-preview-img').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);

            //Send the file to the server like buffer with end point /user/photo
            const formData = new FormData();
            formData.append('avatar', file);
            $.ajax({
                url: `${apiUrl}etudiant/photo/${user.id}`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    const { success, message, data } = response;
                    //data is url
                    if (success) {
                        //Update localStorage
                        user.avatar = data.photoUrl;
                        localStorage.setItem('user', JSON.stringify(user));
                        
                        $('.titulaire-photo').attr('src', data.photoUrl);
                        $('.photo-etudiant').attr('src', data.photoUrl);

                    } else {
                        $('.status-indicator-profile').text(message).css('color', 'red');
                        console.error('Erreur lors de la mise à jour de la photo:', message);
                    }
                },
                error: (error) => {
                    console.error('Error uploading photo:', error);
                }
            });
        }
    });

    function removeProfilePhoto() {
        $('.profile-preview-img').attr('src', '<?= $path ?>/default-etudiant.png');
        $('#avatar').val('');
    }

    // Preview de l'avatar amélioré
    $('#avatar').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('.profile-preview-img').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    function changeInfoUser(info, value) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${apiUrl}etudiant/update/${user.id}`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                data: {
                    info,
                    value
                },
                success: (response) => {
                    const {success, message } = response;

                    if (success) {
                        switch (info) {
                            case 'datenaissance':
                                user['date_naiss'] = value;
                                localStorage.setItem('user', JSON.stringify(user));
                                break;
                            case 'postnom':
                                user['post_nom'] = value;
                                localStorage.setItem('user', JSON.stringify(user));
                                break;
                            case 'email':
                                user['e_mail'] = value;
                                localStorage.setItem('user', JSON.stringify(user));
                                break;
                        
                            default:
                                user[info] = value;
                                localStorage.setItem('user', JSON.stringify(user));
                                break;
                        }
                        resolve(message);
                    } else {
                        reject(message);
                    }
                },
                error: (error) => {
                    reject(error);
                }
            });
        });
        
    }

    function createPayment({montant, telephone, devise, id_etudiant, reference}){
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${apiUrl}etudiant/payment`,
                type: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                data: {
                    montant,
                    telephone,
                    devise,
                    id_etudiant,
                    reference
                },
                success: (response) => {
                    const { success, message, data } = response;
                    if (success) {
                        console.log('Message from server:', message);
                        resolve(data);
                    } else {
                        reject(message);
                    }
                },

            })
            .fail((error) => {
                reject(error);
            });
        });
    }

    function validatePayment({phone, amount, currency, reference, id_recharge}) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${apiUrl}etudiant/payment`,
                type: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                data: {
                    phone,
                    amount,
                    currency,
                    reference,
                    id_recharge
                },
                success: (response) => {
                    const { success, message, data } = response;
                    if (success) {
                        resolve(data);
                    }
                },
                error: (error) => {
                    reject(error);
                }
            });
        });
    }

    function checkingPayment({orderNumber, id, id_etudiant, solde}) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${apiUrl}etudiant/payment/check`,
                type: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                data: {
                    orderNumber,
                    id_etudiant,
                    id,
                    solde
                },
                success: (response) => {
                    const { success, message, data } = response;
                    if (success) {
                        resolve(data);
                    }
                },
                error: (error) => {
                    reject(error);
                }
            });
        });
        
    }

    $('#userNom, #userPostNom, #userPrenom, #userLieuNaissance, #userDateNaissance, #userSexe, #userEmail, #userAdresse, #userTelephone').on('change', function() {
        const info = $(this).attr('id').replace('user', '').toLowerCase();
        const value = $(this).val();
        
        changeInfoUser(info, value)
            .then(message => {
                $('.status-indicator-profile').text("Vos informations ont été modifiées").css('color', 'green');
            })
            .catch(error => {
                $('.status-indicator-profile').text(error).css('color', 'red');
            });
    });

    $('#identityForm, #contactForm').submit(function(e){
        e.preventDefault();
        window.location.reload();

        return;
    })

    $('#passwordForm').submit(function(e) {
        e.preventDefault();

        const payload = {
            oldPassword: $('input[name=current_password]').val(),
            newPassword: $('input[name=new_password]').val(),
            confMdp: $('input[name=confirm_password]').val(),
            matricule: user.matricule
        }

        // Validation
        if (!payload.oldPassword || !payload.newPassword || !payload.confMdp) {
            alert('Veuillez remplir tous les champs');
            return;
        }

        if (payload.newPassword !== payload.confMdp) {
            alert('Les nouveaux mots de passe ne correspondent pas');
            return;
        }

        // Envoyer la requête au serveur
        $.ajax({
            url: `${apiUrl}etudiant/password/${user.id}`,
            type: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`
            },
            data: payload,
            success: function(response) {
                console.log('Response from server:', response);
                // Vérifier la réponse du serveur
                if (response.success) {
                    alert('Mot de passe modifié avec succès');
                    $('#passwordForm')[0].reset();
                    $('#accountModal').modal('hide');
                } else {
                    alert(response.message || 'Erreur lors de la modification du mot de passe');
                }
            },
            error: function(xhr, status, error) {
                alert('Une erreur est survenue. Veuillez réessayer.');
                console.error('Error:', error);
            }

        })

        console.log('Données du formulaire:', payload);
    })
    
    $('#rechargeForm').submit(function(e) {
        e.preventDefault();

        const montant = $('#montant-rech').val();
        const telephone = $('#telephone-rech').val();
        const devise = $('#devise-rech').val();
        const id_etudiant = user.id;
        const reference = `RECHARGE-${user.matricule}, ETUDIANT ${user.nom} ${user.post_nom} ${user.prenom || ''}`;

        if (!montant || !telephone || !devise) {
            alert('Veuillez remplir tous les champs');
            return;
        }

        // Créer le paiement
        createPayment({ montant, telephone, devise, id_etudiant, reference })
            .then(data => {
                console.log('Payment created:', data);
                const { id, amount, currency, date_created, orderNumber, phone, reference, statut } = data;
                // Ajouter la recharge à l'historique
                const recharge = {
                    id,
                    montant: amount,
                    devise: currency,
                    date_created,
                    orderNumber,
                    telephone: phone,
                    reference,
                    statut
                };

                // Afficher la recharge dans l'interface utilisateur
                const rechargeCard = generateRechargeCard(recharge);
                $('#recharges').append(rechargeCard);

                alert('Recharge demandée avec succès. Veuillez patienter pour la validation.');
                // Rediriger ou mettre à jour l'interface utilisateur
            })
            .catch(error => {
                console.error('Error creating payment:', error);
                alert('Erreur lors de la demande de recharge. Veuillez réessayer.');
            });
    });

    function formatPhone (phone){
        //Erase + in phone number
        if (phone.startsWith('+')) {
            phone = phone.substring(1);
        }
        return phone;
    }

    $(document).ready(function() {
        // Gestion des tabs
        $('.nav-tabs a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
            
            // Retirer la classe active de tous les onglets
            $('.nav-tabs li').removeClass('active');
            // Ajouter la classe active au parent de l'onglet cliqué
            $(this).parent().addClass('active');
            
            // Masquer tous les contenus
            $('.tab-pane').removeClass('in active');
            // Afficher le contenu correspondant
            $($(this).attr('href')).addClass('in active');
        });

        // Afficher le premier tab par défaut
        $('.nav-tabs li:first-child a').trigger('click');

        // Fonction pour générer une carte de recharge
        function generateRechargeCard(recharge) {
            // Formatage de la date
            const date = new Date(recharge.date_created);
            const formattedDate = date.toLocaleDateString('fr-FR', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            let statusBadge = '';
            let actionButton = '';

            switch(recharge.statut) {
                case 'NO':
                    statusBadge = '<span class="badge badge-warning">En attente de validation</span>';
                    actionButton = `
                        <button class="action-btn validate-recharge" data-id="${recharge.id}" data-montant="${recharge.montant}" data-telephone="${recharge.telephone}" data-devise="${recharge.devise}" data-reference="${recharge.reference}">
                            <i class="fa fa-check"></i> Valider la recharge
                        </button>`;
                    break;
                case 'PENDING':
                    statusBadge = '<span class="badge badge-info">En attente de crédit</span>';
                    actionButton = `
                        <button class="action-btn credit-solde" data-id="${recharge.id}" data-order="${recharge.orderNumber}">
                            <i class="fa fa-money"></i> Créditer le solde
                        </button>`;
                    break;
                case 'OK':
                    statusBadge = '<span class="badge badge-success">Recharge réussie</span>';
                    break;
            }
            const montant = parseFloat(recharge.montant) || 0;
            return `
            <div class="card-horizontal">
                <div class="card-body">
                    <div class="recharge-header">
                        <h4 class="card-title">#${recharge.reference}</h4>
                        <div class="card-subtitle">${formattedDate}</div>
                    </div>
                    <div class="recharge-content">
                        <div class="recharge-info">
                            <div class="stat-item">
                                <i class="fa fa-money"></i> Montant: ${(montant).toFixed(2)} ${recharge.devise}
                            </div>
                            <div class="stat-item">
                                <i class="fa fa-phone"></i> ${recharge.telephone}
                            </div>
                            <div class="stat-item">
                                <i class="fa fa-info-circle"></i> ${statusBadge}
                            </div>
                        </div>
                        ${actionButton ? `<div class="recharge-action">${actionButton}</div>` : ''}
                    </div>
                </div>
            </div>`;
        }

        // Style pour les badges
        const badgeStyle = `
            <style>
            .badge {
                padding: 5px 10px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 500;
            }
            .badge-warning {
                background-color: #ffc107;
                color: #000;
            }
            .badge-info {
                background-color: #17a2b8;
                color: #fff;
            }
            .badge-success {
                background-color: #28a745;
                color: #fff;
            }
            </style>
        `;
        $('head').append(badgeStyle);

        // Gérer les actions des boutons de recharge
        $(document).on('click', '.validate-recharge', function() {
            const rechargeId = $(this).data('id');
            const montant = $(this).data('montant');
            const telephone = $(this).data('telephone');
            const devise = $(this).data('devise');
            const reference = `Recharge ${user.matricule}`;

            validatePayment({
                id_recharge: rechargeId,
                phone: formatPhone(telephone),
                amount: montant,
                currency: devise,
                reference: reference,
                // autres paramètres nécessaires
            })
            .then(response => {
                alert('Recharge validée avec succès');
                loadRecharges(); // Recharger la liste
            })
            .catch(error => {
                alert('Erreur lors de la validation');
            });
        });

        $(document).on('click', '.credit-solde', function() {
            const rechargeId = $(this).data('id');
            const orderNumber = $(this).data('order ');
            console.log('Créditer le solde pour la recharge:', rechargeId, orderNumber);
            checkingPayment({
                id: rechargeId,
                id_etudiant: user.id,
                solde: user.solde,
                orderNumber: orderNumber
                // autres paramètres nécessaires
            })
            .then(response => {
                const { success } = response;

                if (!success) {
                    alert('Aucune recharge trouvée ou déjà créditée');
                    return;
                }
                alert('Solde crédité avec succès');
                loadRecharges(); // Recharger la liste
                // Mettre à jour le solde affiché
                const { data } = response;
                console.log('Nouveau solde:', data);
                user.solde = data.newSolde;
                localStorage.setItem('user', JSON.stringify(user));
                $('.curent-solde').text(user.solde + ' FC');
            })
            .catch(error => {
                alert('Erreur lors du crédit du solde, vérifiez la connexion internet ou contactez le support');
                console.error('Erreur de crédit du solde:', error);
            });
        });

        // Fonction pour charger les recharges
        function loadRecharges() {
            $.ajax({
                url: `${apiUrl}etudiant/recharges/${user.id}`,
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                success: function(response) {
                    console.log('Recharges loaded:', response);
                    if (response.success) {
                        const rechargesHtml = response.data
                            .map(recharge => generateRechargeCard(recharge))
                            .join('');
                        $('#recharges').html(rechargesHtml);
                    }
                }
            });
        }

        // Charger les recharges au chargement
        loadRecharges();
    });
</script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
