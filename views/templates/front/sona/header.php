<?php
    $path = "/views/templates/front/sona/";
?>
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>        
        <div class="header-configure-area">
            <div class="language-option">
                <img src="<?= $path ?>img/flag.jpg" alt="">
                <span><?= $this->auth->getName() ?> <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                    <?= $this->auth->getMenu() ?>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Bibliothèque</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="<?= $this->auth->getCurrentPage() === 'home' ? 'active' : '' ?>"><a href="/">Acceuil</a></li>
                <li class="<?= $this->auth->getCurrentPage() === 'valves' ? 'active' : '' ?>"><a href="/valves">Valves</a></li>
                <li class="<?= $this->auth->getCurrentPage() === 'section' ? 'active' : '' ?>"><a href="#">Programmes</a>
                    <ul class="dropdown programmes-items">    
                        <li><a href="/section/programmes-1">Génie Civil</a></li>
                        <li><a href="/section/programmes-2">Architecture</a></li>
                        <li><a href="/section/programmes-3">Construction</a></li>
                    </ul>
                </li>
                <li class="<?= $this->auth->getCurrentPage() === 'about' ? 'active' : '' ?>"><a href="/about">A Propos</a></li>
                <li class="<?= $this->auth->getCurrentPage() === 'contact' ? 'active' : '' ?>"><a href="/contact">Nous Contacter</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (+243) 999 888 777</li>
            <li><i class="fa fa-envelope"></i> contact@ista-gm.net</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (+243) 999 888 777</li>
                            <li><i class="fa fa-envelope"></i> contact@ista-gm.net</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Bibliothèque</a>
                            <div class="language-option">
                                <img src="<?= $path ?>img/flag.jpg" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">Zi</a></li>
                                        <li><a href="#">Fr</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/">
                                <img src="<?= $path ?>img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="<?= $this->auth->getCurrentPage() === 'home' ? 'active' : '' ?>"><a href="/">Acceuil</a></li>
                                    <li class="<?= $this->auth->getCurrentPage() === 'valves' ? 'active' : '' ?>"><a href="/valves">Valves</a></li>
                                    <li class="<?= $this->auth->getCurrentPage() === 'section' ? 'active' : '' ?>"><a href="#">Programmes</a>
                                        <ul class="dropdown programmes-items">
                                            <li><a href="/section/programmes-1">Génie Civil</a></li>
                                            <li><a href="/section/programmes-2">Architecture</a></li>
                                            <li><a href="/section/programmes-3">Construction</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= $this->auth->getCurrentPage() === 'about' ? 'active' : '' ?>"><a href="/about-us">A Propos</a></li>
                                    <li class="<?= $this->auth->getCurrentPage() === 'contact' ? 'active' : '' ?>"><a href="/contact">Nous Contacter</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <script>
        $(document).ready(function() {
            // Initialize the offcanvas menu
            const apiUrl = '<?= API ?>';

            $.ajax({
                url: apiUrl + '/home',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const {status, message, data } = response;
                    
                    if(data.count > 0) {
                        let menuHtml = '';
                        data.rows.forEach(item => {
                            menuHtml += `<li class="${item.active ? 'active' : ''}"><a href="/section/programmes-${item.id}">${item.designation}</a></li>`;
                        });

                        const innerMenu = $('.programmes-items');
                        innerMenu.empty(); // Clear existing items
                        innerMenu.html(menuHtml);
                    } else {
                        console.warn('No menu items found');
                    }
                },
                error: function() {
                    console.error('Failed to load menu data');
                }
            });
        });
    </script>