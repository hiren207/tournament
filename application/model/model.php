<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all tournament from database
     */
    public function getAllTournaments()
    {
        $sql = "SELECT tournaments.*,count( teams.id) as numberofteams FROM tournaments join teams on teams.tournament_id=tournaments.id group by tournaments.id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addTournament($name, $number_of_playtime)
    {


        $sql = "INSERT INTO tournaments (tournament_name, number_of_playtime) VALUES (:tournament_name, :number_of_playtime)";
        $query = $this->db->prepare($sql);
        $parameters = array(':tournament_name' => $name, ':number_of_playtime' => $number_of_playtime);
        $query->execute($parameters);
        return  $this->db->lastInsertId();
    }


    /**
     * Get a tournament from database
     */
    public function getTournament($tournament_id)
    {
        $sql = "SELECT * FROM tournaments WHERE id = :tournament_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':tournament_id' => $tournament_id);

    
        $query->execute($parameters);
        return $query->fetch();
    }

    public function updateTournament($name, $number_of_playtime, $tournament_id)
    {
        $sql = "UPDATE tournaments  SET tournament_name = :name, number_of_playtime = :number_of_playtime WHERE id = :tournament_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':number_of_playtime' => $number_of_playtime, ':tournament_id' => $tournament_id);

        $query->execute($parameters);
    }

     public function getTeams($tournament_id)
    {
        $sql = "SELECT * FROM teams WHERE tournament_id = :tournament_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':tournament_id' => $tournament_id);

    
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function updateTeams($teams,$tournament_id)
    {

         $sql = "DELETE FROM teams WHERE tournament_id = :tournament_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':tournament_id' => $tournament_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        foreach ($teams as $team) {
             
            $sql = "INSERT INTO teams (team_name, tournament_id) VALUES (:name, :tournament_id)";
    
            $query = $this->db->prepare($sql);
            $parameters = array(':name' => $team, ':tournament_id' => $tournament_id);

            $query->execute($parameters);
        }

    }

}
