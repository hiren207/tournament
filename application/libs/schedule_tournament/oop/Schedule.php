<?php

class Schedule implements IteratorAggregate
{
   
    protected $master = [];

   
    protected $team = [];

    public function __construct(array $master)
    {
        $this->master = $master;
    }

    public function master(): array
    {
        return $this->master;
    }

    protected function makeTeam()
    {
        $masterSchedule = $this->master();
        $teamSchedule = [];
        foreach($masterSchedule as $round => $matchups) {
            foreach($matchups as $matchup) {
                $team1 = $matchup[0];
                $team2 = $matchup[1];
                $teamSchedule[$team1][$round] = ['team' => $team2, 'home' => false];
                $teamSchedule[$team2][$round] = ['team' => $team1, 'home' => true];
            }
        }
        $this->team = $teamSchedule;
    }

    
    public function forTeam($team): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_key_exists($team, $this->team) ? $this->team[$team] : [];
    }

    public function teams(): array
    {
        if(empty($this->team)) {
            $this->makeTeam();
        }
        return array_filter(array_keys($this->team));
    }

   
    public function get($team = null): array
    {
        if(!is_null($team)) {
            return $this->forTeam($team);
        }
        return $this->master();
    }

    
    final public function getIterator(): Iterator
    {
        return new ArrayIterator($this->master());
    }

   
    final public function __invoke($team = null): array
    {
        return $this->get($team);
    }


    public function __toString(): string
    {
        $str = '';
        $master = $this->master();
        foreach($master as $round => $matchups) {
            $str .= "Round {$round}:".PHP_EOL;
            foreach($matchups as $matchup) {
                $str .= ($matchup[0] ?? '*BYE*').' vs. '.($matchup[1] ?? '*BYE*').PHP_EOL;
            }
        }
        return $str;
    }
}
