

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?= $path ?>/ista-equipement.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <span><?= $data['section']['mention'] ?></span>
                        <h2><?= $data['section']['designation'] ?></h2>
                        <ul>
                            <li class="b-time"><i class="icon_clock_alt"></i><?= $data['currentAnnee']['debut'] ?> - <?= $data['currentAnnee']['fin'] ?></li>
                            <li><i class="icon_profile"></i> <?= $data['section']['chef_section'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->