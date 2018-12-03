<?php

class ScheduleBuilder
{
   
    protected $teams = [];


    protected $rounds = null;


    protected $shuffle = true;

    protected $seed = null;

    
    public function __construct(array $teams = [], int $rounds = null)
    {
        $this->setTeams($teams);
        $this->setRounds($rounds);
    }

   
    public function setTeams(array $teams)
    {
        $this->teams = $teams;
    }

   
    public function addTeam($team)
    {
        $this->teams[] = $team;
    }

   
    public function removeTeam($team)
    {
        $teamKeys = array_keys($this->teams, $team, true);
        if(!array_key_exists(0, $teamKeys)) {
            throw new Exception('Attempted removal of team that does not currently exist.');
        }
        $key = $teamKeys[0];
        unset($this->teams[$key]);
    }

   
    public function setRounds(int $rounds = null)
    {
        $this->rounds = $rounds;
    }

   
    public function enoughRounds()
    {
        $this->setRounds(null);
    }

    public function shuffle(int $seed = null)
    {
        $this->shuffle = true;
        $this->seed = $seed;
    }

    
    public function doNotShuffle()
    {
        $this->shuffle = false;
        $this->seed = null;
    }


    public function build(): Schedule
    {
        return new Schedule(make_schedule($this->teams, $this->rounds, $this->shuffle, $this->seed));
    }
}
