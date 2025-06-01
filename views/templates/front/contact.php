<?php
    $path = "/views/templates/front/sona/";
    $page = array(
        'title' => "Souhaitez vous nous contacter ?",
        'current' => "Contact",
    );

    ob_start();
    require_once 'components/breadcrumb.php';
?>

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php require_once 'components/infos.php'; ?>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <?php require_once 'components/form-contact.php'; ?>
                </div>
            </div>
            <!-- Google Map Begin -->
        </div>
    </section>
    <!-- Contact Section End -->
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
