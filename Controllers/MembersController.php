<?php

class MembersController
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

    public function all_members()
    {
        return $this->model->get_members();
    }

    public function one_member( $arg )
    {
        return $this->model->get_member( array(
            'clanski_broj' => $arg
        ) );
    }

    function new () {
        //var_dump($_POST);
        //die();
        if (
            !empty( $_POST['membership'] ) && !empty( $_POST['firstname'] ) &&
            !empty( $_POST['lastname'] ) && !empty( $_POST['date_membership'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'clanski_broj'     => $_POST['membership'],
                'ime'              => $_POST['firstname'],
                'prezime'          => $_POST['lastname'],
                'datum_uclanjenja' => date( 'Y-m-d', strtotime( $_POST['date_membership'] ) )
            );

            $this->model->new_member( $data );
        }
    }

    // Ruta: /members/show/1
    public function show( $param )
    {
        //var_dump( $param );
        if ( !empty( $_POST['membership'] ) ) {
            header( 'Location: ' . HOME_URL . '/members' );
        }
    }

    // Ruta: /members/edit/1
    public function edit( $params )
    {
        if (
            !empty( $_POST['membership'] ) && !empty( $_POST['firstname'] ) &&
            !empty( $_POST['lastname'] ) && !empty( $_POST['date_membership'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $data = array(
                'ime'              => $_POST['firstname'],
                'prezime'          => $_POST['lastname'],
                'datum_uclanjenja' => date( 'Y-m-d', strtotime( $_POST['date_membership'] ) )
            );

            $args = array(
                'clanski_broj' => $_POST['membership']
            );

            $this->model->edit_member( $data, $args );
        }
    }

    // Ruta: /members/delete/1
    public function delete( $params )
    {
        if (
            !empty( $_POST['membership'] )
        ) {
            // Ako je sve popunjeno onda popuni data i pozovi funkciju
            $args = array(
                'clanski_broj' => $_POST['membership']
            );

            $this->model->delete_member( $args );
        }
    }
}
