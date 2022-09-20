<?php

include($_SERVER['DOCUMENT_ROOT'].'/admin/auth.php');

$currentAdminUser = getCurrentAdminUser();
if(empty($currentAdminUser)) {
    if( !empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
        $username = htmlspecialchars($_REQUEST['username']);
        $userpass = htmlspecialchars($_REQUEST['password']);
        $currentAdminUser = doLogin($username, $userpass);
    }
}else{
    $arCurrentAdminUser = (array)json_decode($currentAdminUser);
}
    //include('validate.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="login.css">
        <title>Login Page</title>
    </head>

    <body>
    <?if( !empty( $arCurrentAdminUser ) && !empty( $arCurrentAdminUser['firstName'] ) ){
        echo "Добрый день ".$arCurrentAdminUser['firstName'];
    }else{?>
        <form action="admin-login.php" method="post">
            <?//php include('errors.php'); ?>
            <div class="login-box">
                <h1>Login</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username"
                            name="username" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password"
                            name="password" value="">
                </div>

                <input class="button" type="submit"
                        name="login_admin" value="Sign In">
            </div>
        </form>
    <?}?>

    </body>

</html>
