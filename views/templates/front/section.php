<?php
    $path = "/config/ista-assets/images";
    $page = array(
        'title' => "Souhaitez vous nous contacter ?",
        'current' => "Contact",
    );
    ob_start();
    require_once 'components/header.php';
?>

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
                        <?php require_once 'components/section-description.php'; ?>
                        <?php require_once 'components/section-galeries.php'; ?>
                        <?php require_once 'components/section-promotions.php'; ?>
                        <?php require_once 'components/section-contact.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
