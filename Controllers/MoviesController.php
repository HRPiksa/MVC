<?php

class MoviesController
{
    private $model;

    public function __construct( $model )
    {
        $this->model = $model;
    }

    public function say_welcome()
    {
        return $this->model->welcome_message();
    }

    public function all_movies()
    {
        return $this->model->get_movies_and_genres()[0];
    }

    public function all_genres()
    {
        return $this->model->get_movies_and_genres()[1];
    }

    public function one_movie( $arg )
    {
        return $this->model->get_movie( array(
            'sifra_filma' => $arg
        ) );
    }

    public function one_genre( $arg )
    {
        return $this->model->get_genre( array(
            'sifra_zanra' => $arg
        ) );
    }

    public function new_movie()
    {
        if ( $_POST['action'] == 'movie' ) {
            //var_dump($_POST);
            //die();
            if (
                !empty( $_POST['moviecode'] ) && !empty( $_POST['name'] ) &&
                !empty( $_POST['year'] ) && !empty( $_POST['genre'] ) && trim( $_POST['genre'] ) != '---'
            ) {
                // Ako je sve popunjeno onda popuni data i pozovi funkciju
                $data = array(
                    'sifra_filma'    => $_POST['moviecode'],
                    'naziv'          => $_POST['name'],
                    'godina_izdanja' => $_POST['year'],
                    'sifra_zanra'    => $_POST['genre']
                );

                $this->model->new_movie( $data );
            } else {
                header( 'Location: ' . HOME_URL . '/movies' );
            }
        }
    }

    public function new_genre()
    {
        if ( $_POST['action'] == 'genre' ) {
            //var_dump( $_POST );
            //die();
            if (
                !empty( $_POST['genrecode'] ) && !empty( $_POST['name'] )
            ) {
                // Ako je sve popunjeno onda popuni data i pozovi funkciju
                $data = array(
                    'sifra_zanra' => $_POST['genrecode'],
                    'naziv'       => $_POST['name']
                );

                $this->model->new_genre( $data );
            }
        }
    }

    // Ruta: /movies/show_movie/1
    public function show_movie( $param )
    {
        //var_dump( $param );
        if ( !empty( $_POST['moviecode'] ) ) {
            header( 'Location: ' . HOME_URL . '/movies' );
        }
    }

    // Ruta: /movies/show_genre/1
    public function show_genre( $param )
    {
        //var_dump( $param );
        if ( !empty( $_POST['genrecode'] ) ) {
            header( 'Location: ' . HOME_URL . '/movies' );
        }
    }

    // Ruta: /movies/edit_movie/1
    public function edit_movie( $params )
    {
        if (
            !empty( $_POST['moviecode'] ) && !empty( $_POST['name'] ) &&
            !empty( $_POST['year'] ) && !empty( $_POST['genre'] ) && trim( $_POST['genre'] ) != '---'
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'naziv'          => $_POST['name'],
                'godina_izdanja' => $_POST['year'],
                'sifra_zanra'    => $_POST['genre']
            );

            $args = array(
                'sifra_filma' => $_POST['moviecode']
            );

            $this->model->edit_movie( $data, $args );
        }
    }

    // Ruta: /movies/edit_genre/1
    public function edit_genre( $params )
    {
        if (
            !empty( $_POST['genrecode'] ) && !empty( $_POST['name'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'naziv' => $_POST['name']
            );

            $args = array(
                'sifra_zanra' => $_POST['genrecode']
            );

            $this->model->edit_genre( $data, $args );
        }
    }

    // Ruta: /movies/delete_movie/1
    public function delete_movie( $params )
    {
        if (
            !empty( $_POST['moviecode'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $args = array(
                'sifra_filma' => $_POST['moviecode']
            );

            $this->model->delete_movie( $args );
        }
    }

    // Ruta: /movies/delete_genre/1
    public function delete_genre( $params )
    {
        if (
            !empty( $_POST['genrecode'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $args = array(
                'sifra_zanra' => $_POST['genrecode']
            );

            $this->model->delete_genre( $args );
        }
    }
}
