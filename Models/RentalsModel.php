<?php

require_once 'Helpers/Database.php';

use \DB\Database as Database;

class RentalsModel extends Database
{
    private $message = "Pregled posudbi";

    public function welcome_message()
    {
        return $this->message;
    }

    public function get_rentals()
    {
        $rentals = array();
        try {
            $stmt = $this->pdo->prepare( "SELECT p.sifra_posudbe,
                                          p.clanski_broj, CONCAT(c.ime, ' ', c.prezime) as naziv_clana,
                                          p.sifra_filma, f.naziv as naziv_filma,
                                          p.sifra_cjenika, cj.kategorija as kategorija_cijene,
                                          p.datum_posudbe, p.datum_povratka
                                          FROM posudba p
                                          join clanovi c on (c.clanski_broj = p.clanski_broj)
                                          join filmovi f on (f.sifra_filma = p.sifra_filma)
                                          join cjenik cj on (cj.sifra_cjenika = p.sifra_cjenika)" );
            $stmt->execute();

            if ( $stmt->rowcount() ) {
                $rentals = $stmt->fetchAll();
            }

            return $rentals;
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function new_rental( $data )
    {
        //var_dump( $data );
        //var_dump( "INSERT INTO posudba (" . implode( ', ', array_keys( $data ) ) . ") VALUES (:" . implode( ', :', array_keys( $data ) ) . ")" );
        //die();

        try {
            $stmt = $this->pdo->prepare( "INSERT INTO posudba
                                          (" . implode( ', ', array_keys( $data ) ) . ")
                                          VALUES
                                          (:" . implode( ', :', array_keys( $data ) ) . ")" );
            $stmt->execute( $data );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/rentals' );
    }

    public function get_rental( $args )
    {
        $rental = array();

        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "SELECT * FROM posudba WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "SELECT p.sifra_posudbe,
                                          p.clanski_broj, CONCAT(c.ime, ' ', c.prezime) as naziv_clana,
                                          p.sifra_filma, f.naziv as naziv_filma,
                                          p.sifra_cjenika, cj.kategorija as kategorija_cijene,
                                          p.datum_posudbe, p.datum_povratka
                                          FROM posudba p
                                          join clanovi c on (c.clanski_broj = p.clanski_broj)
                                          join filmovi f on (f.sifra_filma = p.sifra_filma)
                                          join cjenik cj on (cj.sifra_cjenika = p.sifra_cjenika)
                                          WHERE $setCondition" );
            $stmt->execute();

            if ( $stmt->rowCount() ) {
                $rental = $stmt->fetch();
            }

            return $rental;
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }
    }

    public function edit_rental( $data, $args )
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

            //var_dump( "UPDATE posudba SET $setExp WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "UPDATE posudba SET $setExp WHERE $setCondition" );
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/rentals' );
    }

    public function delete_rental( $args )
    {
        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "DELETE FROM posudba WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "DELETE FROM posudba WHERE $setCondition" );
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/rentals' );
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

    public function get_movies()
    {
        $movies = array();

        try {
            $stmt_movie = $this->pdo->prepare( "SELECT * FROM filmovi" );
            $stmt_movie->execute();

            if ( $stmt_movie->rowcount() ) {
                $movies = $stmt_movie->fetchAll();
            }
            return $movies;
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
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
}