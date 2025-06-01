<?php
    $path = "/views/templates/front/sona/";
    $page = array(
        'title' => "Apropos de l'ISTA-GM",
        'current' => "A Propos",
    );

    ob_start();

    require_once 'components/breadcrumb.php';
    require_once 'components/mission.php';
    require_once 'components/history.php';
    require_once 'components/partenaires.php';

    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';