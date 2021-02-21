<?php

require_once 'Helpers/Database.php';

use \DB\Database as Database;

class MembersModel extends Database
{
    private $message = "Pregled članova";

    public function welcome_message()
    {
        return $this->message;
    }

    public function get_members()
    {
        $members = array();
        try {
            $stmt = $this->pdo->prepare( "SELECT * FROM clanovi" );
            $stmt->execute();

            if ( $stmt->rowcount() ) {
                $members = $stmt->fetchAll();
            }

            return $members;
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function new_member( $data )
    {
        //var_dump( $data );
        //var_dump( "INSERT INTO clanovi (" . implode( ', ', array_keys( $data ) ) . ") VALUES (:" . implode( ', :', array_keys( $data ) ) . ")" );
        //die();

        try {
            $stmt = $this->pdo->prepare( "INSERT INTO clanovi
                                          (" . implode( ', ', array_keys( $data ) ) . ")
                                          VALUES
                                          (:" . implode( ', :', array_keys( $data ) ) . ")" );
            $stmt->execute( $data );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/members' );
    }

    public function get_member( $args )
    {
        $member = array();

        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "SELECT * FROM clanovi WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "SELECT * FROM clanovi WHERE $setCondition" );
            $stmt->execute();

            if ( $stmt->rowCount() ) {
                $member = $stmt->fetch();
            }

            return $member;
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }
    }

    public function edit_member( $data, $args )
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

            //var_dump( "UPDATE clanovi SET $setExp WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("UPDATE clanovi SET $setExp WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/members' );
    }

    public function delete_member( $args )
    {
        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "DELETE FROM clanovi WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("DELETE FROM clanovi WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/members' );
    }
}
