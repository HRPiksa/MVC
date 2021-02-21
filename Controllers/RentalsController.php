<?php

class RentalsController
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

    public function all_rentals()
    {
        return $this->model->get_rentals();
    }

    public function one_rental( $arg )
    {
        return $this->model->get_rental( array(
            'sifra_posudbe' => $arg
        ) );
    }

    function new () {
        //var_dump($_POST);
        //die();
        if (
            !empty( $_POST['membership'] ) && trim( $_POST['membership'] ) != '---' &&
            !empty( $_POST['moviecode'] ) && trim( $_POST['moviecode'] ) != '---' &&
            !empty( $_POST['pricecode'] ) && trim( $_POST['pricecode'] ) != '---' &&
            !empty( $_POST['date_rental'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'clanski_broj'  => $_POST['membership'],
                'sifra_filma'   => $_POST['moviecode'],
                'sifra_cjenika' => $_POST['pricecode'],
                'datum_posudbe' => date( 'Y-m-d', strtotime( $_POST['date_rental'] ) )
            );

            $this->model->new_rental( $data );
        } else {
            header( 'Location: ' . HOME_URL . '/rentals' );
        }
    }

    // Ruta: /pricelist/show/1
    public function show( $param )
    {
        //var_dump( $param );
        if ( !empty( $_POST['rentalcode'] ) ) {
            header( 'Location: ' . HOME_URL . '/rentals' );
        }
    }

    // Ruta: /pricelist/edit/1
    public function edit( $params )
    {
        //var_dump( $_POST );
        //die();
        if (
            !empty( $_POST['rentalcode'] ) &&
            !empty( $_POST['membership'] ) && trim( $_POST['membership'] ) != '---' &&
            !empty( $_POST['moviecode'] ) && trim( $_POST['moviecode'] ) != '---' &&
            !empty( $_POST['pricecode'] ) && trim( $_POST['pricecode'] ) != '---' &&
            !empty( $_POST['date_rental'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            if ( !empty( trim( $_POST['date_return'] ) ) ) {
                $data = array(
                    'clanski_broj'   => $_POST['membership'],
                    'sifra_filma'    => $_POST['moviecode'],
                    'sifra_cjenika'  => $_POST['pricecode'],
                    'datum_posudbe'  => date( 'Y-m-d', strtotime( trim( $_POST['date_rental'] ) ) ),
                    'datum_povratka' => date( 'Y-m-d', strtotime( trim( $_POST['date_return'] ) ) )
                );
            } else {
                $data = array(
                    'clanski_broj'  => $_POST['membership'],
                    'sifra_filma'   => $_POST['moviecode'],
                    'sifra_cjenika' => $_POST['pricecode'],
                    'datum_posudbe' => date( 'Y-m-d', strtotime( $_POST['date_rental'] ) )
                );
            }

            $args = array(
                'sifra_posudbe' => $_POST['rentalcode']
            );

            $this->model->edit_rental( $data, $args );
        }
    }

    // Ruta: /members/delete/1
    public function delete( $params )
    {
        if (
            !empty( $_POST['rentalcode'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $args = array(
                'sifra_posudbe' => $_POST['rentalcode']
            );

            $this->model->delete_rental( $args );
        }
    }

    public function all_members()
    {
        return $this->model->get_members();
    }

    public function all_movies()
    {
        return $this->model->get_movies();
    }

    public function all_pricelist()
    {
        return $this->model->get_pricelist();
    }
}
