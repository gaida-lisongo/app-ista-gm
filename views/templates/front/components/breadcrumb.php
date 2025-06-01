    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2><?= $page['title'] ?></h2>
                        <div class="bt-option">
                            <a href="/">Acceuil</a>
                            <?= 
                            isset($page['parent']) ? 
                                '<a href="' . $page['parent']['url'] . '">' . $page['parent']['title'] . '</a>' : 
                                '<span>'. $page['current'] .'</span>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->