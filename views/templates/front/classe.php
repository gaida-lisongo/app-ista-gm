<?php
    $path = "/config/ista-assets/images";
    $promotion = isset($data['info']) ? $data['info']['promotion'] : null;
    $semestres = isset($data['info']) ? $data['info']['matieres'] : null;
    $annees = isset($data['annees']) ? $data['annees'] : null;

    $page = array(
        'title' => $promotion ? "Classe de {$promotion['niveau']} {$promotion['section']} {$promotion['orientation']}" : "Promotion",
        'current' => $promotion ? "{$promotion['niveau']} {$promotion['section']} {$promotion['orientation']}" : "Promotion",
    );
    

    ob_start();
    require_once 'components/breadcrumb.php';
?>
    <style>
        /* Styles de l'accordéon */        /* Style des onglets */        .nav-tabs {
            border-bottom: 2px solid #f0f2f5;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #666;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.2s ease;
            position: relative;
            cursor: pointer;
        }

        .nav-tabs .nav-link:hover {
            color: #dfa974;
            background: rgba(223, 169, 116, 0.05);
        }

        .nav-tabs .nav-link.active {
            color: #dfa974;
            background: rgba(223, 169, 116, 0.1);
            border: none;
        }        .nav-tabs .nav-link .badge {
            margin-left: 8px;
            background: #dfa974;
            padding: 6px 12px;
            font-weight: 500;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-pane {
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(10px);
            opacity: 0;
        }

        .tab-pane.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Style des cartes */
        .course-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            gap: 12px;
            cursor: pointer;
        }

        .course-card:hover {
            background-color: rgba(223, 169, 116, 0.05);
        }

        .course-card:active {
            background-color: rgba(223, 169, 116, 0.1);
        }

        .course-avatar {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.2s ease;
        }

        .course-card:hover .course-avatar img {
            transform: scale(1.05);
        }

        .course-content {
            flex: 1;
            min-width: 0; /* Pour gérer le text-overflow */
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .course-title {
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .credit-badge {
            background: #dfa974;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .unite-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 0.9rem;
        }

        .unite-code {
            color: #dfa974;
            font-weight: 600;
            white-space: nowrap;
        }

        .unite-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #777;
        }

        .course-action {
            flex-shrink: 0;
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            background: rgba(223, 169, 116, 0.1);
            color: #dfa974;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .course-action:hover {
            background: #dfa974;
            color: white;
            transform: translateY(-1px);
        }

        .course-action i {
            margin-right: 6px;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .course-card {
                padding: 10px;
            }

            .course-avatar {
                width: 45px;
                height: 45px;
            }

            .course-header {
                flex-wrap: wrap;
                gap: 6px;
            }

            .credit-badge {
                padding: 3px 8px;
                font-size: 0.75rem;
            }

            .course-action {
                padding: 5px 10px;
                font-size: 0.85rem;
            }

            .unite-info {
                font-size: 0.85rem;
            }
        }
    </style>

    <!-- Room Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">                    
                    <?php if($semestres): ?>
                        <!-- Onglets de navigation -->
                        <ul class="nav nav-tabs" id="semestreTabs" role="tablist">
                            <?php foreach ($semestres as $key => $matieres):
                                $type = $key == "semestre1" ? "Semestre 1" : "Semestre 2";
                                $credits = array_reduce($matieres, function ($carry, $matiere) {
                                    return $carry + $matiere['credit'];
                                }, 0);
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == "semestre1" ? 'active' : '' ?>" 
                                        id="tab-<?= $key ?>" 
                                        data-bs-toggle="tab"
                                        data-bs-target="#content-<?= $key ?>" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="content-<?= $key ?>" 
                                        aria-selected="<?= $key == "semestre1" ? 'true' : 'false' ?>">
                                    <?= $type ?>
                                    <span class="badge rounded-pill text-white ms-2">
                                        <i class="fa fa-book me-1"></i><?= count($matieres) ?> - <?= $credits ?> cr
                                    </span>
                                </button>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- Contenu des onglets -->
                        <div class="tab-content" id="semestreTabsContent">
                            <?php foreach ($semestres as $key => $matieres): ?>
                            <div class="tab-pane fade <?= $key == "semestre1" ? 'show active' : '' ?>" 
                                 id="content-<?= $key ?>" 
                                 role="tabpanel" 
                                 aria-labelledby="tab-<?= $key ?>">
                                <div class="p-2">
                                        <?php foreach ($matieres as $matiere): ?>
                                            <div class="course-card">
                                                <div class="course-avatar">
                                                    <img src="/config/ista-assets/images/ista-profile.png" 
                                                         alt="<?= htmlspecialchars($matiere['titre']) ?>">
                                                </div>
                                                <div class="course-content">
                                                    <div class="course-header">
                                                        <h3 class="course-title">
                                                            <?= htmlspecialchars($matiere['titre']) ?>
                                                        </h3>
                                                        <span class="credit-badge">
                                                            <i class="fa fa-star me-1"></i><?= $matiere['credit'] ?> crédits
                                                        </span>
                                                    </div>
                                                    <div class="unite-info">
                                                        <span class="unite-code">
                                                            <?= htmlspecialchars($matiere['unite']['code']) ?>
                                                        </span>
                                                        <span class="unite-name">
                                                            <?= htmlspecialchars($matiere['unite']['designation']) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <a href="/section/cours-<?= $matiere['id'] ?>" 
                                                   class="course-action">
                                                    <i class="fa fa-book"></i>
                                                    Voir le cours
                                                </a>
                                            </div>                                        <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info shadow-sm border-0">
                            <i class="fa fa-info-circle me-2"></i>
                            Aucune information disponible pour cette promotion.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Vérifier les résultats</h3>
                        <form action="#">
                            <input type="hidden" class="resultat-promotionId"  value="<?= $promotion['id'] ?>">
                            <div class="check-date">
                                <label for="date-in">Matricule:</label>
                                <input type="text" id="date-in" class="form-control resultat-matricule" placeholder="Entrez votre matricule" required>
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="select-option">
                                <label for="type">Type:</label>
                                <select id="type" class="form-control resultat-type">
                                    <option value="S1">Semestre 1</option>
                                    <option value="S2">Semestre 2</option>
                                    <option value="AN">Annuel</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="annee">Année Académique:</label>
                                <select id="annee" class="form-control resultat-annee">
                                <?php
                                if ($annees) {
                                    foreach ($annees as $key => $annee) {
                                ?>
                                    <option value="<?= $annee['id'] ?>"><?= $annee['debut'] ?> - <?= $annee['fin'] ?></option>
                                <?php
                                    }
                                } else {
                                    echo "<option value=\"0\">Aucune année disponible</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <button type="submit">Check résultat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    <!-- Room Details Section End -->    <!-- Scripts pour PDFMake et les onglets -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script>
        // Fonction pour calculer la note pondérée
        function calculerNotePondérée(cote) {
            if (!cote) return null;
            const tp = parseFloat(cote.tp) || 0;
            const td = parseFloat(cote.td) || 0;
            const examen = parseFloat(cote.examen) || 0;
            
            // Formule: (TP+TD)*0.4 + Examen*0.6
            const note = ((tp + td) * 0.4 + examen * 0.6).toFixed(1);
            return isNaN(note) ? null : note;
        }

        // Fonction pour obtenir la mention
        function getMention(note) {
            if (!note) return '-';
            note = parseFloat(note);
            if (note >= 16) return 'TB';
            if (note >= 14) return 'B';
            if (note >= 12) return 'AB';
            if (note >= 10) return 'S';
            return 'E';
        }

        // Fonction pour obtenir la couleur selon la note
        function getMentionColor(note) {
            if (!note) return '#666';
            note = parseFloat(note);
            if (note >= 16) return '#28a745';  // Vert pour TB
            if (note >= 14) return '#17a2b8';  // Bleu pour B
            if (note >= 12) return '#ffc107';  // Jaune pour AB
            if (note >= 10) return '#6c757d';  // Gris pour S
            return '#dc3545';  // Rouge pour E
        }

        // Fonction pour calculer la moyenne globale
        function calculerMoyenneGlobale(matieres) {
            let totalPoints = 0;
            let totalCredits = 0;

            matieres.forEach(matiere => {
                const note = parseFloat(matiere.note);
                const credits = parseInt(matiere.credit) || 0;
                if (!isNaN(note) && credits > 0) {
                    totalPoints += note * credits;
                    totalCredits += credits;
                }
            });

            if (totalCredits === 0) return '-';
            return (totalPoints / totalCredits).toFixed(2);
        }        // Fonction pour transformer les données de l'API
        function preparerDonneesBulletin(data) {
            const unitesEnseignement = data.matieres
                .filter(m => m.notes && m.notes.length > 0)
                .map(unite => ({
                    code: unite.code,
                    designation: unite.designation,
                    semestre: unite.semestre,
                    elements: unite.notes.map(element => ({
                        id: element.id,
                        titre: element.titre,
                        credit: element.credit,
                        cotes: element.cote ? {
                            tp: parseFloat(element.cote.tp) || 0,
                            td: parseFloat(element.cote.td) || 0,
                            examen: parseFloat(element.cote.examen) || 0,
                            note: calculerNotePondérée(element.cote)
                        } : null
                    }))
                }));

            return {
                etudiant: data.etudiant,
                promotion: data.promotion,
                annee: data.annee,
                commande: data.commande,
                unites: unitesEnseignement
            };
        }

        // Fonction pour générer le bulletin PDF
        function generateBulletin(data) {
            const {annee, promotion, etudiant, matieres, commande} = data;
            console.log("Data matieres: ", matieres);

            // Structure du document PDF
            const docDefinition = {
                content: [                    
                    // En-tête
                    {
                        text: [
                            'INSTITUT SUPERIEUR DES TECHNIQUES APPLIQUÉES\n',
                            'BULLETIN DES POINTS\n',
                            `Année Académique ${annee.debut}-${annee.fin}`,
                        ],
                        style: 'header',
                        alignment: 'center',
                        margin: [0, 0, 0, 20]
                    },
                    // Informations de l'étudiant
                    {
                        style: 'studentInfo',
                        columns: [
                            {
                                width: '*',
                                text: [
                                    {text: 'Étudiant: ', bold: true}, 
                                    `${etudiant.nom} ${etudiant.postnom} ${etudiant.prenom}\n`,
                                    {text: 'Matricule: ', bold: true}, 
                                    `${etudiant.matricule}\n`,
                                ]
                            },
                            {
                                width: '*',
                                text: [
                                    {text: 'Promotion: ', bold: true},
                                    `${promotion.niveau} ${promotion.section} ${promotion.orientation}\n`,
                                    {text: 'Session: ', bold: true},
                                    `${commande.type === 'S1' ? 'Première' : commande.type === 'S2' ? 'Deuxième' : 'Annuelle'}\n`
                                ]
                            }
                        ]
                    },                    // Tableau des résultats
                    ...matieres.map(unite => [
                        // En-tête de l'unité d'enseignement
                        {
                            table: {
                                widths: ['*'],
                                body: [[
                                    {
                                        text: `${unite.code} - ${unite.designation}`,
                                        style: 'uniteHeader',
                                        fillColor: '#dfa974',
                                        color: 'white',
                                        bold: true
                                    }
                                ]]
                            },
                            layout: 'noBorders',
                            margin: [0, 10, 0, 0]
                        },
                        // Tableau des éléments constitutifs
                        {
                            style: 'resultTable',
                            table: {
                                headerRows: 1,
                                widths: ['*', 'auto', 'auto', 'auto', 'auto', 'auto'],
                                body: [
                                    // En-tête du tableau
                                    [
                                        {text: 'Élément Constitutif', style: 'tableHeader'},
                                        {text: 'Crédits', style: 'tableHeader'},
                                        {text: 'TP', style: 'tableHeader'},
                                        {text: 'TD', style: 'tableHeader'},
                                        {text: 'Examen', style: 'tableHeader'},
                                        {text: 'Final', style: 'tableHeader'}
                                    ],
                                    // Lignes des éléments constitutifs
                                    ...unite.map(element => [
                                        element.titre,
                                        {text: element.credit, alignment: 'center'},
                                        {text: element.cotes ? element.cotes.tp.toFixed(1) : '-', alignment: 'center'},
                                        {text: element.cotes ? element.cotes.td.toFixed(1) : '-', alignment: 'center'},
                                        {text: element.cotes ? element.cotes.examen.toFixed(1) : '-', alignment: 'center'},
                                        {
                                            text: element.cotes ? `${element.cotes.note} (${getMention(element.cotes.note)})` : '-',
                                            alignment: 'center',
                                            color: getMentionColor(element.cotes?.note)
                                        }
                                    ])
                                ]
                            },
                            layout: {
                                hLineColor: function(i, node) {
                                    return '#dfa974';
                                },
                                vLineColor: function(i, node) {
                                    return '#dfa974';
                                }
                            }
                        }
                    ]), 
                ],                
                styles: {
                    header: {
                        fontSize: 16,
                        bold: true,
                        margin: [0, 0, 0, 20]
                    },
                    studentInfo: {
                        margin: [0, 20, 0, 20]
                    },
                    resultTable: {
                        margin: [0, 5, 0, 5]
                    },
                    tableHeader: {
                        bold: true,
                        fillColor: '#dfa974',
                        color: 'white',
                        fontSize: 10
                    },
                    uniteHeader: {
                        fontSize: 12,
                        bold: true,
                        margin: [0, 10, 0, 5]
                    }
                },
                defaultStyle: {
                    fontSize: 12
                }
            };            // Fonction pour obtenir la mention
            function getMention(note) {
                if (!note) return '-';
                note = parseFloat(note);
                if (note >= 16) return 'TB';
                if (note >= 14) return 'B';
                if (note >= 12) return 'AB';
                if (note >= 10) return 'S';
                return 'E';
            }

            // Fonction pour obtenir la couleur de la mention
            function getMentionColor(note) {
                if (!note) return '#666';
                note = parseFloat(note);
                if (note >= 16) return '#28a745';  // Vert pour TB
                if (note >= 14) return '#17a2b8';  // Bleu pour B
                if (note >= 12) return '#ffc107';  // Jaune pour AB
                if (note >= 10) return '#6c757d';  // Gris pour S
                return '#dc3545';  // Rouge pour E
            }

            // Générer le PDF
            pdfMake.createPdf(docDefinition).download(`Bulletin_${etudiant.matricule}_${commande.type}.pdf`);
        }

        // Vérifier que jQuery est chargé
        if (typeof jQuery === 'undefined') {
            console.error('jQuery n\'est pas chargé !');
        } else {
            console.log('jQuery est chargé correctement');
        }

        $(document).ready(function() {
            // Supprimer les gestionnaires d'événements existants
            $('#semestreTabs button').off();

            // Gestionnaire d'événements pour les clics sur les onglets
            $('#semestreTabs button').on('click', function(e) {
                e.preventDefault();
                
                // Supprimer la classe active de tous les onglets
                $('#semestreTabs button').removeClass('active');
                $('.tab-pane').removeClass('show active');
                
                // Ajouter la classe active à l'onglet cliqué
                $(this).addClass('active');
                
                // Récupérer l'ID du contenu cible
                var targetId = $(this).data('bs-target');
                
                // Afficher le contenu avec animation
                $(targetId).addClass('show active');
            });

            // Activer le premier onglet par défaut
            $('#semestreTabs button:first').trigger('click');            // Fonction pour calculer la note finale
            function calculerNotePondérée(cote) {
                if (!cote) return null;
                const tp = parseFloat(cote.tp) || 0;
                const td = parseFloat(cote.td) || 0;
                const examen = parseFloat(cote.examen) || 0;
                return ((tp + td) * 0.4 + examen * 0.6).toFixed(1);
            }

            // Fonction pour transformer les données de l'API pour le bulletin
            function preparerDonneesBulletin(data) {
                const matieresTraitees = data.matieres
                    .filter(m => m.semestre === 'Premier') // Filtrer par semestre
                    .flatMap(matiere => 
                        matiere.notes
                            .filter(note => note.cote) // Ne garder que les notes qui existent
                            .map(note => ({
                                code: matiere.code,
                                unite: matiere.designation,
                                titre: note.titre,
                                credit: note.credit,
                                note: calculerNotePondérée(note.cote)
                            }))
                    );

                return {
                    etudiant: {
                        nom: data.etudiant.nom,
                        postnom: data.etudiant.post_nom,
                        prenom: data.etudiant.prenom || '',
                        matricule: data.etudiant.matricule
                    },
                    promotion: {
                        niveau: data.promotion.niveau,
                        section: data.promotion.section,
                        orientation: data.promotion.orientation || '',
                        systeme: data.promotion.systeme
                    },
                    annee: data.annee,
                    commande: {
                        type: data.commande.id_promotion ? "S1" : "AN" // À adapter selon votre logique
                    },
                    matieres: matieresTraitees
                };
            };            
            
            //Validation du formulaire de résultats
            $('form').on('submit', function(e) {
                e.preventDefault();

                // Récupérer les valeurs des champs
                var promotionId = $('.resultat-promotionId').val();
                var matricule = $('.resultat-matricule').val();
                var type = $('.resultat-type').val();
                var annee = $('.resultat-annee').val();                
                if (!matricule || !type || !annee) {
                    alert('Veuillez remplir tous les champs.');
                    return;
                }

                const payload = {
                    promotionId: promotionId,
                    matricule: matricule,
                    type: type,
                    annee: annee
                };                $.ajax({
                    url: `https://frozen-chandal-admin-elmes-d89f2982.koyeb.app/api/home/checkResultat`,
                    method: 'POST',
                    data: payload,
                    xhrFields: {
                        responseType: 'arraybuffer'
                    },
                    success: function(response) {
                        if (!response) {
                            alert("Aucun résultat trouvé pour cette combinaison.");
                            return;
                        }

                        // Convert the binary data to a blob
                        const blob = new Blob([response], { type: 'application/pdf' });
                        
                        // Create a URL for the blob
                        const pdfUrl = window.URL.createObjectURL(blob);
                        
                        // Open the PDF in a new tab
                        window.open(pdfUrl, '_blank');
                        
                        // Clean up by revoking the blob URL after opening
                        setTimeout(() => {
                            window.URL.revokeObjectURL(pdfUrl);
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur API:', error);
                        alert("Une erreur s'est produite lors de la récupération des résultats.");
                    }
                });

            });
        });
    </script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
