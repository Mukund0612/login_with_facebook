<?php
    include 'config.php';
    
    if (isset($_SESSION['access_token'])) {
        header('Location: login.php');
        exit;
    }

    $redirectUrl = "http://localhost/login_with_facebook/callback.php";
    $permissions = ['email'];
    $loginUrl = $helper->getLoginUrl($redirectUrl, $permissions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Facebook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" style="margin-top:100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="images/facebook.png" alt="facebook logo" width="300px" style="margin-bottom:30px;"/>
                <form action="">
                    <input type="email" placeholder="Email" class="form-control"></br>
                    <input type="password" placeholder="Password" class="form-control"></br>
                    <input type="submit" value="login" class="btn btn-primary">
                    <input type="button" value="Login With Facebook" class="btn btn-primary" onclick="window.location = '<?php echo $loginUrl; ?>';">
                </form>
            </div>
        </div>
    </div>

</body>
</html>