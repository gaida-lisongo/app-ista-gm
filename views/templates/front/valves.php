<?php
    $path = "/views/templates/front/sona/";
    $page = array(
        'title' => "Actualités de l'ISTA-GM",
        'current' => "Valves",
    );

    ob_start();

    require_once 'components/breadcrumb.php';
    require_once 'components/news.php';

    $content = ob_get_clean();
    require_once __DIR__ . '/sona/gabarit.php';
