<?php
    $path = "/config/ista-assets/images";
    $page = array(
        'title' => $title,
        'current' => $data['cours'] ? $data['cours'] : "cours",
    );

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
    </style>

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div id="loader" class="loader-container">
            <div class="loader">
                <div class="spinner"></div>
                <p>Chargement des informations du cours...</p>
            </div>
        </div>

        <div id="content" class="container" style="display: none;">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3 class="titre-matiere"></h3>
                                <div class="rdt-right">
                                    <div class="rating credit-matiere">
                                    </div>
                                    <a class="url-matiere" href="#">Note de cours</a>
                                </div>
                            </div>
                            <h2 class="semestre-matiere"></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Unité:</td>
                                        <td class="titre-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Code:</td>
                                        <td class="code-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Année:</td>
                                        <td class="annee-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Mention:</td>
                                        <td class="mention-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Filière:</td>
                                        <td class="filiere-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">ECUE:</td>
                                        <td class="elements-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Credit:</td>
                                        <td class="credit-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Promotion:</td>
                                        <td class="promotion-unite"></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">objectif:</td>
                                        <td class="objectif-unite"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para objectif-matiere"></p>
                            <p class="place-matiere"></p>
                            <p class="mode-matiere"></p>
                            <p class="penalites-matiere"></p>
                        </div>
                    </div>
                    <div class="rd-reviews list-seances">
                        <h4>Séances</h4>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="titulaire-card">
                        <img src="<?= $path ?>img/room/avatar/avatar-1.jpg" alt="Photo du titulaire" class="titulaire-photo">
                        <div class="titulaire-info">
                            <h4 class="titulaire-nom"></h4>
                            <p class="titulaire-grade"><i class="fa fa-graduation-cap"></i> </p>
                            <p class="titulaire-disponibilite"><i class="fa fa-book"></i></p>
                            <div class="titulaire-contact">
                                <p><i class="fa fa-envelope"></i> <a href="mailto:john.doe@example.com" class="titulaire-email"></a></p>
                                <p><i class="fa fa-phone"></i> <a href="tel:+123456789" class="titulaire-phone"></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="room-booking">
                        <h3>Faire un recours</h3>
                        <form action="#">
                            <div class="select-option">
                                <label for="objet">Object:</label>
                                <select id="objet">
                                    <option value="1">Erreur de transmission</option>
                                    <option value="2">Manque de cote</option>
                                    <option value="3">Autre</option>
                                </select>
                            </div>
                            <div class="check-date">
                                <label for="file-in">Preuves:</label>
                                <label for="file-in" class="custom-file-upload text-white">
                                    <i class="fa fa-cloud-upload"></i> Choisir un fichier
                                </label>
                                <input type="file" class="preuve-input" id="file-in">
                                <div id="file-name">Aucun fichier sélectionné</div>
                            </div>
                            <div class="check-date">
                                <label for="contenu">Contenu:</label>
                                <textarea class="data-content" id="contenu"></textarea>
                            </div>
                            <button type="submit">Soumettre le recours</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
    <!-- Recommend Blog Section Begin -->
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Premium King Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 3</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Deluxe Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Double Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Luxury Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 1</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Room With View</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 1</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= $path ?>/banner-section.jpg" alt="">
                        <div class="ri-text">
                            <h4>Small View</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion 2</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
     
    <script>
    document.getElementById('file-in').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('file-name').textContent = fileName;
    });
    </script>
    <script>
    const getQrCodeApi = (data, color='#000000', background='#ffffff', size='150x150') => {
        try {
            const qrCode = `<div class="qr-code-container"><img src="https://qrcode.tec-it.com/API/QRCode?data=${encodeURIComponent(data)}&color=${color}&background=${background}&size=${size}" /></div>`;

            return qrCode;
        } catch (error) {
            console.error('Error fetching QR code:', error);
            return null;
        }
    }

    const apiUrl = 'https://server-ista-gm-sncd.onrender.com/api/';
    const matiereId = '<?= $data['id'] ?>'.trim();

    const fetchData = async (id) => {
        try {
            // Afficher le loader
            $('#loader').show();
            $('#content').hide();

            const request = await fetch(`${apiUrl}home/matiere/${id}`);
            if (!request.ok) {
                throw new Error('Network response was not ok');
            }
            const response = await request.json();
            const { animateur, unite, matiere, travaux, seances } = response.data;

            $('.titre-matiere').text(matiere.designation);
            const getRatings = (credit) => {
                const totalRatings = parseInt(credit);
                const ratings = (`<i class="icon_star"></i>`).repeat(totalRatings);

                $('.credit-matiere').html(ratings);
            }

            getRatings(matiere.credit);
            $('.url-matiere').attr('href', `${matiere.noteUrl}`);

            $('.semestre-matiere').text(`Semestre : ${matiere.semestre}`);

            const setUniteDescription = (unite) => {
                let ecues = '';
                unite.ecues.forEach(ecue => {
                    if (ecue.id == matiere.id) {
                        ecues += `<li class="active"><b>${ecue.designation} (${ecue.credit} crédits)</b></li>`;
                    } else {
                        ecues += `<li>${ecue.designation} (${ecue.credit} crédits)</li>`;
                    }
                });

                const ecueList = `<ul>${ecues}</ul>`;

                const totalCredits = unite.ecues.reduce((sum, ecue) => sum + ecue.credit, 0);
                const promotion = unite.promotion ? unite.promotion.split(' ')[0] : 'Non spécifiée';

                $('.titre-unite').text(unite.designation);
                $('.code-unite').text(unite.code);
                $('.annee-unite').text(`${unite.annee.debut} - ${unite.annee.fin}`);
                $('.mention-unite').text(unite.filiere);
                $('.filiere-unite').text(unite.mention);
                $('.elements-unite').html(ecueList);
                $('.credit-unite').text(totalCredits);
                $('.promotion-unite').text(promotion);
                $('.objectif-unite').text(unite.objectif);
            }
            
            setUniteDescription(unite);

            $('.objectif-matiere').html(matiere.objectif);
            $('.place-matiere').html(`${matiere.place}`);
            $('.mode-matiere').html(`<b>${matiere.mode_ens}</b>`);
            $('.penalites-matiere').html(`<b>${matiere.penalites}</b>`);

            let seancesHtml = '';
            seances.length > 0 ? seances.forEach(seance => {
                seancesHtml += `
                    <div class="review-item">
                        <div class="qr-section">
                            ${getQrCodeApi(seance.id, '#DFA974', '#ffffff', '150x150')}
                        </div>
                        <div class="review-details">
                            <div class="ri-text">
                                <span>${new Date(seance.date_seance).toLocaleDateString()}</span>
                                <div class="rating">
                                    ${'<i class="icon_star"></i>'.repeat(seance.note)}
                                </div>
                                <h5>${seance.titre}</h5>
                                <p>${seance.description}</p>
                            </div>
                        </div>
                    </div>`;
            }) : seancesHtml = '<p>Aucune séance disponible.</p>';
            $('.list-seances').append(seancesHtml);
            console.log('Animateur data:', animateur);
            $('.titulaire-photo').attr('src', `https://ista-gm.net/public/Views/template/img/profile/${animateur.photo}` || '<?= $path ?>/ista-profile.png');
            $('.titulaire-nom').append(` ${animateur.grade} ${animateur.nom}`);
            $('.titulaire-grade').append("Titulaire du cours");
            $('.titulaire-disponibilite').append(animateur.disponibilite ? animateur.disponibilite : 'Disponibilité non spécifiée');
            $('.titulaire-email').append(animateur.email ? animateur.email : 'contact@ista-gm.net');
            $('.titulaire-email').attr('href', `mailto:${animateur.email ? animateur.email : 'contact@ista-gm.net'}`);
            $('.titulaire-phone').append(animateur.telephone ? animateur.telephone : '+243 89 031 13 34');
            $('.titulaire-phone').attr('href', `tel:${animateur.telephone ? animateur.telephone : '+243890311334'}`);

            // Une fois toutes les données chargées
            $('#loader').fadeOut();
            $('#content').fadeIn();

        } catch (error) {
            console.error('There has been a problem with your fetch operation:', error);
            // Afficher un message d'erreur à l'utilisateur
            $('#loader').html(`
                <div class="loader">
                    <i class="fa fa-exclamation-circle" style="color: #dc3545; font-size: 40px;"></i>
                    <p style="color: #dc3545; margin-top: 15px;">Une erreur est survenue lors du chargement des données.</p>
                </div>
            `);
        }
    }

    fetchData(matiereId);
</script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
