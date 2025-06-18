<?php
    $path = "/config/ista-assets/images";
    $page = array(
        'title' => "Communiqué de l'ISTA-GM",
        'current' => "Communiqué",
    );
    
    ob_start();
    require_once 'components/breadcrumb.php';
?>
    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?= $path ?>/ista-equipement.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <span class="service-info"></span>
                        <h2 class="titre-info"></h2>
                        <ul>
                            <li class="b-time date-info"><i class="icon_clock_alt"></i> </li>
                            <li class="author-info"><i class="icon_profile"></i> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
                        <div class="bd-more-text">
                            <div class="bm-item contenu-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    <script>
        const communiqueId = '<?= $data['id'] ?>'.trim();

        const apiUrl = '<?= API ?>';

        $.get(`${apiUrl}/home/communique/${communiqueId}`, function(response) {
            const { success, message, data } = response;

            if (success) {
                const { titre, service, date_created, contenu, auteur } = data;
                $('.bd-hero-text .service-info').text(service);
                $('.bd-hero-text .titre-info').text(titre);
                $('.bd-hero-text .date-info').html(`<i class="icon_clock_alt"></i> ${new Date(date_created).toLocaleDateString()}`);
                $('.bd-hero-text .author-info').html(`<i class="icon_profile"></i> ${auteur || 'Unknown'}`);
                $('.contenu-info').html(contenu);
            } else {
                console.error('Error fetching communiqué:', message);
            }
        }).fail(function() {
            console.error('Error fetching communiqué data.');
        });
    </script>
<?php
    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
