<?php
if( !empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
    session_start();
    if( empty($_SESSION['currentUser']) ) {
        $username = htmlspecialchars($_REQUEST['username']);
        $userpass = htmlspecialchars($_REQUEST['password']);
        require ($_SERVER['DOCUMENT_ROOT']."/admin/auth.php");
        $currentAdminUser = doLogin($username, $userpass);
        header("location:/admin/");
    }
}
$addHeaderString = '<link rel="stylesheet" href="/admin/login.css">';
require_once $_SERVER['DOCUMENT_ROOT']."/header.php";

if(!empty($currentAdminUser)) {
    $arCurrentAdminUser = (array)json_decode($currentAdminUser);
}
    //include('validate.php');
?>


    <?if( !empty( $arCurrentAdminUser ) && !empty( $arCurrentAdminUser['firstName'] ) ){ ?>
        <div class="connainer center">
            Добрый день <?=$arCurrentAdminUser['firstName']?>
            <div><a href="/admin/admin-logout.php">Выйти</a> </div>
        </div>
    <?}else{?>
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

<?require ($_SERVER['DOCUMENT_ROOT']."/footer.php");?>
