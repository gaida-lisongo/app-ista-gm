<?php
    $path = "/views/templates/front/sona/";
    ob_start();

    require_once 'components/banner.php';
    require_once 'components/whyUs.php';
    require_once 'components/offres.php';
    require_once 'components/mentions.php';
    require_once 'components/galeries.php';
    require_once 'components/partenaires.php';

    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';