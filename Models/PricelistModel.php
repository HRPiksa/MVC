<?php

require_once 'Helpers/Database.php';

use \DB\Database as Database;

class PricelistModel extends Database
{
    private $message = "Pregled cjenika";

    public function welcome_message()
    {
        return $this->message;
    }

    public function get_pricelist()
    {
        $pricelist = array();
        try {
            $stmt = $this->pdo->prepare( "SELECT * FROM cjenik" );
            $stmt->execute();

            if ( $stmt->rowcount() ) {
                $pricelist = $stmt->fetchAll();
            }

            return $pricelist;
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function new_price( $data )
    {
        //var_dump( $data );
        //var_dump( "INSERT INTO cjenik (" . implode( ', ', array_keys( $data ) ) . ") VALUES (:" . implode( ', :', array_keys( $data ) ) . ")" );
        //die();

        try {
            $stmt = $this->pdo->prepare( "INSERT INTO cjenik
                                          (" . implode( ', ', array_keys( $data ) ) . ")
                                          VALUES
                                          (:" . implode( ', :', array_keys( $data ) ) . ")" );
            $stmt->execute( $data );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/pricelist' );
    }

    public function get_price( $args )
    {
        $price = array();

        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "SELECT * FROM cjenik WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "SELECT * FROM cjenik WHERE $setCondition" );
            $stmt->execute();

            if ( $stmt->rowCount() ) {
                $price = $stmt->fetch();
            }

            return $price;
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }
    }

    public function edit_price( $data, $args )
    {
        try {
            $i = 0;

            foreach ( $data as $key => $value ) {
                $setExp[$i] = $key . "='" . $value . "'";
                $i++;
            }

            $setExp = implode( ", ", $setExp );

            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "UPDATE cjenik SET $setExp WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("UPDATE cjenik SET $setExp WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/pricelist' );
    }

    public function delete_price( $args )
    {
        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "DELETE FROM cjenik WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("DELETE FROM cjenik WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/pricelist' );
    }
}
