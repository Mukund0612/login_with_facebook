<?php
    include 'config.php';

    try {
        $accessToken = $helper->getAccessToken();
    } catch (\Facebook\Exeptions\FacebookResponceExeption $e) {
        echo "Responce Exeptions: " . $e->getMessage();
        exit;
    } catch (\Facebook\Exeptions\FacebookSDKExeption $e) {
        echo "SDK Exeptions: " . $e->getMessage();
        exit;
    }

    if (!$accessToken) {
        header('Location: login.php');
        exit;
    }

    $oAuth2Client = $FB->getOAuth2Client();
    if (!$accessToken->isLongLived()) {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    }

    $response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
    $userData = $response->getGraphNode()->asArray();
    // echo "<pre>";
    // var_dump($userData);
	// exit;
    $_SESSION['userData'] = $userData;
    $_SESSION['access_token'] = (string) $accessToken;
    header('Location: index.php');
	exit();
?>