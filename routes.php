<?php

include 'config.php';

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

$url = isset( $_SERVER['PATH_INFO'] ) ? explode( '/', ltrim( $_SERVER['PATH_INFO'], '/' ) ) : '/';

if ( $url == '/' ) {
    // Ovo je početna stranica (homepage)
    // Ovdje onda iniciraj HomeController i prikaži HomeView

    require_once __DIR__ . '/Models/HomeModel.php';
    require_once __DIR__ . '/Controllers/HomeController.php';
    require_once __DIR__ . '/Views/HomeView.php';

    $index_model = new HomeModel();
    $index_controller = new HomeController( $index_model );
    $index_view = new HomeView( $index_model, $index_controller );
} else {
    // Ovo nije početna stranica
    // Ovdje iniciraj odgovarajući Controller i prikaži odgovarajući View

    // Primjer mogućih ruta
    // http://localhost/mvc/about
    // http://localhost/mvc/members
    // http://localhost/mvc/members/new
    // http://localhost/mvc/members/edit

    // Prvi element treba biti controller
    $requested_controller = $url[0];

    // Ako postoji drugi element u nizu to znači da je to naziv metode/akcije/viewa
    $requested_action = isset( $url[1] ) ? $url[1] : '';

    // Preostali djelovi URL-a smatraju se argumentima
    $requested_params = array_slice( $url, 2 );

    // Provjeriti postoji li kontroler
    // Želimo provjeriti da li postoji controller AboutController.php
    $controller_path = __DIR__ . '/Controllers/' . ucfirst( $requested_controller ) . 'Controller.php';

    if ( file_exists( $controller_path ) ) {
        //echo 'pronašao sam datoteku ' . $controller_path;

        require_once __DIR__ . '/Models/' . ucfirst( $requested_controller ) . 'Model.php';
        require_once __DIR__ . '/Controllers/' . ucfirst( $requested_controller ) . 'Controller.php';
        require_once __DIR__ . '/Views/' . ucfirst( $requested_controller ) . 'View.php';

        $model_name = ucfirst( $requested_controller ) . 'Model';
        $controller_name = ucfirst( $requested_controller ) . 'Controller';
        $view_name = ucfirst( $requested_controller ) . 'View';

        $model_object = new $model_name();
        $controller_object = new $controller_name( $model_object );
        $view_object = new $view_name( $model_object, $controller_object, $requested_action, $requested_params );

        if ( $requested_action != '' ) {
            // Tada pozivamo odgovarajuću metodu iz pogleda (View)
            //echo $view_object->$requested_action( $requested_params );
            echo $controller_object->$requested_action( $requested_params );
        }
    } else {
        die( '404 - Datoteka - ' . $controller_path . ' nije pronađena' );
    }
}

/*
echo '<pre>';
var_dump( $url );
echo '</pre>';
 */
