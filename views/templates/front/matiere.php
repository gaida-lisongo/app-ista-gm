<?php
    $path = "/views/templates/front/sona/";
    $page = array(
        'title' => $title,
        'current' => $data['cours'] ? $data['cours'] : "cours",
    );

    ob_start();
    require_once 'components/breadcrumb.php';
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
    </style>

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="<?= $path ?>img/room/room-details.jpg" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>Premium King Room</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#">Booking Now</a>
                                </div>
                            </div>
                            <h2>159$<span>/Pernight</span></h2>
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
                            <p class="f-para">Motorhome or Trailer that is the question for you. Here are some of the
                                advantages and disadvantages of both, so you will be confident when purchasing an RV.
                                When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth
                                wheeler? The advantages and disadvantages of both are studied so that you can make your
                                choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an
                                achievement of a lifetime. It can be similar to sojourning with your residence as you
                                search the various sites of our great land, America.</p>
                            <p>The two commonly known recreational vehicle classes are the motorized and towable.
                                Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth
                                wheel has the attraction of getting towed by a pickup or a car, thus giving the
                                adaptability of possessing transportation for you when you are parked at your campsite.
                            </p>
                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="<?= $path ?>img/room/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="<?= $path ?>img/room/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="titulaire-card">
                        <img src="<?= $path ?>img/room/avatar/avatar-1.jpg" alt="Photo du titulaire" class="titulaire-photo">
                        <div class="titulaire-info">
                            <h4>Dr. John Doe</h4>
                            <p><i class="fa fa-graduation-cap"></i> Professeur Titulaire</p>
                            <p><i class="fa fa-book"></i> Département d'Informatique</p>
                            <div class="titulaire-contact">
                                <p><i class="fa fa-envelope"></i> <a href="mailto:john.doe@example.com">john.doe@example.com</a></p>
                                <p><i class="fa fa-phone"></i> <a href="tel:+123456789">+123 456 789</a></p>
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
    <section class="recommend-blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Travaux Pratiques</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommend Blog Section End -->
    <script>
    document.getElementById('file-in').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('file-name').textContent = fileName;
    });
    </script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
