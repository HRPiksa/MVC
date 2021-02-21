<?php

class PricelistController
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

    public function all_pricelist()
    {
        return $this->model->get_pricelist();
    }

    public function one_price( $arg )
    {
        return $this->model->get_price( array(
            'sifra_cjenika' => $arg
        ) );
    }

    function new () {
        //var_dump($_POST);
        //die();
        if (
            !empty( $_POST['pricecode'] ) && !empty( $_POST['kategory'] ) && !empty( $_POST['price'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'sifra_cjenika' => $_POST['pricecode'],
                'kategorija'    => $_POST['kategory'],
                'cijena'        => $_POST['price']
            );

            $this->model->new_price( $data );
        }
    }

    // Ruta: /pricelist/show/1
    public function show( $param )
    {
        //var_dump( $param );
        if ( !empty( $_POST['pricecode'] ) ) {
            header( 'Location: ' . HOME_URL . '/pricelist' );
        }
    }

    // Ruta: /pricelist/edit/1
    public function edit( $params )
    {
        if (
            !empty( $_POST['pricecode'] ) && !empty( $_POST['kategory'] ) && !empty( $_POST['price'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'kategorija' => $_POST['kategory'],
                'cijena'     => $_POST['price']
            );

            $args = array(
                'sifra_cjenika' => $_POST['pricecode']
            );

            $this->model->edit_price( $data, $args );
        }
    }

    // Ruta: /pricelist/delete/1
    public function delete( $params )
    {
        if (
            !empty( $_POST['pricecode'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $args = array(
                'sifra_cjenika' => $_POST['pricecode']
            );

            $this->model->delete_price( $args );
        }
    }
}
