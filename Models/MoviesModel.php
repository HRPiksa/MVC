<?php

require_once 'Helpers/Database.php';

use \DB\Database as Database;

class MoviesModel extends Database
{
    private $message = "Pregled filmova i žanrova";

    public function welcome_message()
    {
        return $this->message;
    }

    public function get_movies_and_genres()
    {
        $movies = array();
        $genres = array();

        try {
            $stmt_movie = $this->pdo->prepare( "SELECT f.sifra_filma, f.naziv, f.godina_izdanja, z.naziv as naziv_zanra
            FROM filmovi f
            JOIN zanr z on (z.sifra_zanra = f.sifra_zanra) " );
            $stmt_movie->execute();

            if ( $stmt_movie->rowcount() ) {
                $movies = $stmt_movie->fetchAll();
            }

            $stmt_genre = $this->pdo->prepare( "SELECT * FROM zanr" );
            $stmt_genre->execute();

            if ( $stmt_genre->rowcount() ) {
                $genres = $stmt_genre->fetchAll();
            }

            return array( $movies, $genres );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }
    }

    public function new_movie( $data )
    {
        //var_dump( $data );
        //var_dump( "INSERT INTO filmovi (" . implode( ', ', array_keys( $data ) ) . ") VALUES (:" . implode( ', :', array_keys( $data ) ) . ")" );
        //die();

        try {
            $stmt = $this->pdo->prepare( "INSERT INTO filmovi
                                          (" . implode( ', ', array_keys( $data ) ) . ")
                                          VALUES
                                          (:" . implode( ', :', array_keys( $data ) ) . ")" );
            $stmt->execute( $data );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

    public function new_genre( $data )
    {
        //var_dump( $data );
        //var_dump( "INSERT INTO zanr (" . implode( ', ', array_keys( $data ) ) . ") VALUES (:" . implode( ', :', array_keys( $data ) ) . ")" );
        //die();

        try {
            $stmt = $this->pdo->prepare( "INSERT INTO zanr
                                          (" . implode( ', ', array_keys( $data ) ) . ")
                                          VALUES
                                          (:" . implode( ', :', array_keys( $data ) ) . ")" );
            $stmt->execute( $data );
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

    public function get_movie( $args )
    {
        $movie = array();

        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "SELECT * FROM filmovi WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "SELECT f.sifra_filma, f.naziv, f.godina_izdanja, f.sifra_zanra, z.naziv as naziv_zanra
            FROM filmovi f
            JOIN zanr z on (z.sifra_zanra = f.sifra_zanra) 
            WHERE $setCondition" );
            $stmt->execute();

            if ( $stmt->rowCount() ) {
                $movie = $stmt->fetch();
            }

            return $movie;
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }
    }

    public function get_genre( $args )
    {
        $genre = array();

        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "SELECT * FROM zanr WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare( "SELECT * FROM zanr WHERE $setCondition" );
            $stmt->execute();

            if ( $stmt->rowCount() ) {
                $genre = $stmt->fetch();
            }

            return $genre;
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }
    }

    public function edit_movie( $data, $args )
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

            //var_dump( "UPDATE filmovi SET $setExp WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("UPDATE filmovi SET $setExp WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

    public function edit_genre( $data, $args )
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

            //var_dump( "UPDATE zanr SET $setExp WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("UPDATE zanr SET $setExp WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

    public function delete_movie( $args )
    {
        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "DELETE FROM filmovi WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("DELETE FROM filmovi WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

    public function delete_genre( $args )
    {
        try {
            $a = 0;

            foreach ( $args as $key => $value ) {
                $setCondition[$a] = $key . "='" . $value . "'";
                $a++;
            }

            $setCondition = implode( " AND ", $setCondition );

            //var_dump( "DELETE FROM zanr WHERE $setCondition" );
            //die();

            $stmt = $this->pdo->prepare("DELETE FROM zanr WHERE $setCondition");
            $stmt->execute();
        } catch ( PDOException $e ) {

            die( $e->getMessage() );
        } catch ( Exception $ex ) {

            die( $ex->getMessage() );
        }

        header( 'Location: ' . HOME_URL . '/movies' );
    }

}
