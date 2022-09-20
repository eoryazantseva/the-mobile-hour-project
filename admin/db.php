<?php

function getConnection() {
    /*$DB_HOST = "localhost";
    $DB_USER = "u969596019_ryazantseva";
    $DB_PASSWORD = "Osmandina!123";
    $DB_NAME = "u969596019_themobilehour";*/

    $DB_HOST = "localhost";
    $DB_USER = "cmsuser";
    $DB_PASSWORD = "cms073";
    $DB_NAME = "themobilehour";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

}


function doLogin( $username, $password ) {
    /** @noinspection SqlDialectInspection */
    /** @noinspection SqlNoDataSourceInspection */

    $DB_QUERY = "SELECT  id,firstName,lastName,login,password,email,phone,role,hash FROM admins WHERE login='".$username."' AND password='".$password."'";
    $db=getConnection();
    $result = mysqli_query($db, $DB_QUERY);

    if(mysqli_num_rows($result) != 1 ){
        mysqli_close($db);
        return false;
    }else{
        $result2 = $result->fetch_assoc();
        mysqli_close($db);
        session_start();

        echo session_id();

        $_SESSION['currentUser'] = json_encode($result2);

        echo "<pre>".print_r($_SESSION,true)."</pre>";

        return $_SESSION['currentUser'];
    }

}

