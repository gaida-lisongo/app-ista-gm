<?php
    $path = "/config/ista-assets/images";
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
                <img src="<?= $path ?>/ista-logo.png" alt="" class="photo-etudiant">
                <span class="curent-solde">ESPACE ETUDIANT<i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown menu-etudiant">
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
            <span class='indicator'>
                <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
            </span>
            <a href="/panier"><i class="fa fa-shopping-cart"></i></a>
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
                                <span class='indicator'>
                                    <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                                </span>
                                <a href="/panier"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Bibliothèque</a>
                            <div class="language-option">
                                <img src="<?= $path ?>/logo.png" alt="" class="photo-etudiant">
                                <span class="curent-solde">ESPACE ETUDIANT<i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown menu-etudiant">
                                    <ul>
                                        <?= $this->auth->getMenu() ?>
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
                                <img src="<?= $path ?>/ista-logo.png" alt="">
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
            const user = JSON.parse(localStorage.getItem('user'));

            if (user) {
                $('.menu-etudiant').html(`
                    <ul>
                        <li><a href="/user/dashboard">Dashboard</a></li>
                        <li><a href="#" class="logout">Déconnexion</a></li>
                    </ul>
                `);

                $('.curent-solde').text(user.solde + ' FC');
                console.log('User data:', user);
                $('.photo-etudiant').attr('src', user.avatar ? user.avatar : '<?= $path ?>/default-etudiant.png');
            }

            $('.logout').on('click', function(e) {
                e.preventDefault();
                localStorage.removeItem('user');
                localStorage.removeItem('token');
                window.location.href = '/';
            });
        });
    </script>
<style>
/* Style de base pour le conteneur du panier */
.top-social {
    position: relative;
    display: inline-block;
}

/* Style pour l'indicateur - Version mobile */
.offcanvas-menu-wrapper .indicator {
    position: absolute;
    top: -8px;
    left: -8px;
    background: #dfa974;
    color: white;
    font-size: 12px;
    min-width: 18px;
    height: 18px;
    line-height: 18px;
    text-align: center;
    border-radius: 50%;
    padding: 0 4px;
    font-weight: bold;
    z-index: 9999;
}

/* Style pour l'indicateur - Version desktop */
.tn-right .indicator {
    position: absolute;
    top: 10px;
    left: 8px;
    background: #dfa974;
    color: white;
    font-size: 11px;
    min-width: 16px;
    height: 16px;
    line-height: 16px;
    text-align: center;
    border-radius: 50%;
    padding: 0 3px;
    font-weight: bold;
    z-index: 9999;
}

/* Style pour le lien du panier */
.top-social a {
    position: relative;
    display: inline-block;
    margin: 0;
}

/* Ajuster l'icône du panier */
.top-social .fa-shopping-cart {
    font-size: 18px;
    color: #19191a;
}

/* Ajustements spécifiques pour la version desktop */
.tn-right .top-social {
    margin-right: 15px;
}

.tn-right .fa-shopping-cart {
    font-size: 16px;
}
</style>
