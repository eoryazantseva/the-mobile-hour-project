<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/admin/db.php');


/*
 *  This is function to get current logged in admin user
 *  - id
 *  - firstName
 *  - lastName
 *  - login
 *  - password
 *  - email
 *  - phone
 *  - role
 *  - hash
 */
function getCurrentAdminUser(){
    session_start();
    if( empty($_SESSION) || empty( $_SESSION['currentUser'] ) ){
        return false;
    } else {
        $user = $_SESSION['currentUser'];
        return $user;
    }

}
