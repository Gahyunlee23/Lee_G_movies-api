<?php
class Movie {
    private $conn;

    public $movie_table = 'tbl_movies';
    public $genre_table = 'tbl_genre';
    public $movie_genre_linking_table = 'tbl_mov_genre';
 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getMovieByGenre($genre_name) {
        $query = 'SELECT
        m.*, GROUP_CONCAT(g.genre_name) AS genre_name
    FROM
        '.$this->movie_table.' m
    LEFT JOIN '.$this->movie_genre_linking_table.' link ON
        link.movies_id = m.movies_id
    LEFT JOIN '.$this->genre_table.' g ON
        g.genre_id = link.genre_id
    WHERE 
        g.genre_name = "'.$genre_name.'"
    GROUP BY 
        m.movies_id';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    public function getMovieByID($id) {
        $this->id = $id;
        //TO DO : fill the SQL query here so that
        // it can fetch the movie with the movies_id = $id
        $query = 'SELECT * FROM '.$this->movie_table.' WHERE movies_id = '.$id;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getMovies() {
        // TO DO: Update the SQL query below
        // so that it can pull data from movie and genre tables
        // to show genre info of each movie
        
        $query = 'SELECT
        m.*, GROUP_CONCAT(g.genre_name) AS genre_name
    FROM
        '.$this->movie_table.' m
    LEFT JOIN '.$this->movie_genre_linking_table.' link ON
        link.movies_id = m.movies_id
    LEFT JOIN '.$this->genre_table.' g ON
        g.genre_id = link.genre_id
    GROUP BY 
        m.movies_id';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}