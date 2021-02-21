<?php

class MoviesView
{
    private $model;
    private $controller;

    public function __construct( $model, $controller, $method = '', $params = array() )
    {
        $this->model = $model;
        $this->controller = $controller;

        if ( empty( $method ) ) {
            $this->movies_and_genres();
        } else {
            switch ( $method ) {
                case 'new_movie':
                case 'show_movie':
                case 'edit_movie':
                case 'delete_movie':
                    if ( !empty( $params ) ) {
                        $this->movie( $method, $params[0] );
                    } else {
                        //$this->movie( $method, '' );
                    }
                    break;
                case 'new_genre':
                case 'show_genre':
                case 'edit_genre':
                case 'delete_genre':
                    if ( !empty( $params ) ) {
                        $this->genre( $method, $params[0] );
                    } else {
                        //$this->genre( $method, '' );
                    }
                    break;
            }
        }
    }

    public function movies_and_genres()
    {
        //vrati dizajn za stranicu filmova
        $data['controller'] = $this->controller;

        require_once dirname( __DIR__ ) . '/resources/movies.php';
    }

    public function movie( $method, $param )
    {
        //vrati dizajn za stranicu filmova
        $data['controller'] = $this->controller;
        $data['method'] = $method;
        $data['param'] = $param;

        require_once dirname( __DIR__ ) . '/resources/movie.php';
    }

    public function genre( $method, $param )
    {
        //vrati dizajn za stranicu filmova
        $data['controller'] = $this->controller;
        $data['method'] = $method;
        $data['param'] = $param;

        require_once dirname( __DIR__ ) . '/resources/genre.php';
    }
}
