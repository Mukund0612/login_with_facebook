<?php
    session_start();

    require_once 'API/vendor/autoload.php';

    $FB = new \Facebook\Facebook([
        'app_id'                => '2804129099825457',
        'app_secret'            => '53f1d1b376e791d92bfc17c559100c13',
        'default_graph_version' => 'v2.10'
    ]);

    $helper = $FB->getRedirectLoginHelper();

?>