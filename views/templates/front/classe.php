<?php
    $path = "/views/templates/front/sona/";
    $page = array(
        'title' => $title,
        'current' => $data['promotion'] ? $data['promotion'] : "Promotion",
    );

    ob_start();
    require_once 'components/breadcrumb.php';
?>
    <!-- Room Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-text">
                        <div class="comment-option">
                            <h4>Semestre 1</h4>
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="<?= $path ?>img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>27 Aug 2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="/section/cours-1" class="comment-btn">Like</a>
                                    <a href="/section/cours-2" class="comment-btn">Reply</a>
                                    <a href="/section/cours-3" class="comment-btn">Reply</a>
                                    <a href="/section/cours-4" class="comment-btn">Reply</a>
                                    <a href="/section/cours-5" class="comment-btn">Reply</a>
                                </div>
                            </div>
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="<?= $path ?>img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>27 Aug 2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="#" class="comment-btn">Like</a>
                                    <a href="#" class="comment-btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="comment-option">
                            <h4>Semestre 2</h4>
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="<?= $path ?>img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                                </div>
                                <div class="sc-text">
                                    <span>27 Aug 2019</span>
                                    <h5>Brandon Kelley</h5>
                                    <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                        dolore magnam.</p>
                                    <a href="#" class="comment-btn">Like</a>
                                    <a href="#" class="comment-btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Vérifier les résultats</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Matricule:</label>
                                <input type="text" id="date-in">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="select-option">
                                <label for="type">Type:</label>
                                <select id="type">
                                    <option value="S1">Semestre 1</option>
                                    <option value="S2">Semestre 2</option>
                                    <option value="AN">Annuel</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="annee">Année Académique:</label>
                                <select id="annee">
                                    <option value="1">2021 - 2022</option>
                                    <option value="2">2022 - 2023</option>
                                    <option value="3">2023 - 2024</option>
                                </select>
                            </div>
                            <button type="submit">Check résultat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
