<?php

if(isset($_POST)) {
    
    $user_name = isset($_POST['username'] ) ? $_POST['username'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    //ARREGLO DE ERRORES
    $errors = array();

    // VALIDACIÓN DE DATOS
    // validar user_name
    if(!empty($user_name) && !is_numeric($user_name) && !preg_match("/[0-9]+/", $user_name)) {
        $user_validated = true;
    }else {
        $user_validated = false;
        $errores['user_name'] = "El nombre de usuario no es válido.";
    }

    // validar email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validated = true;
    } else {
        $email_validated = false;
        $errores['email'] = "El correo no es válido.";
    }

    // validar contraseña
    if (!empty($email)) {
        $email_validated = true;
    } else {
        $email_validated = false;
        $errores['contraseña'] = "La contraseña esta vacia";
    }

    // Comprobar si hay errores
    $save_user = false;
    if(count($errores) == 0) {
        $save_user = true;           
    };
}