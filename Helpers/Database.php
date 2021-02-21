<?php

namespace DB;

use PDO;
use PDOException;

class Database
{
    protected $pdo;

    public function __construct()
    {

        $options = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //Uključili prikaz za greške i iznimke
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //Kao rezutlat uvijek vrati asoc. niz
        );

        try {
            //Konektiraj se na bazu

            //Ekvivalent:
            // new PDO("mysql:host=localhost;dbname=videoteka;charset=utf8", 'predavac', 'sifra1234', $options);
            $db = new PDO( DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options );

            $this->pdo = $db;
        } catch ( PDOException $e ) {
            die( $e->getMessage() );
        }

    }
}
