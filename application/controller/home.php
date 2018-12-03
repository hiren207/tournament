<?php
 require (APP . 'libs/schedule_tournament/final-scheuler.php');
class Home extends Controller
{

   
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
    
        // getting all songs and amount of songs
        $tournaments = $this->model->getAllTournaments();

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

     public function Generate($tournament_id)
    {
    
        
        if (isset($tournament_id)) {
            
            $tournament = $this->model->getTournament($tournament_id);
            $result=$this->model->getTeams($tournament_id);
            $teams=[];
            foreach ($result as $team) {
                 $teams[]=$team->team_name;
            }
        

           //$teams = ['The 1st', '2 Good', 'We 3', '4ward'];
            $rounds = (($count = count($teams)) % 2 === 0 ? $count - 1 : $count) * 2;
            $scheduleBuilder = new ScheduleBuilder($teams, $rounds);
            $schedule = $scheduleBuilder->build();
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/schedule.php';
            require APP . 'view/_templates/footer.php';
        } else {
        
            header('location: ' . URL . 'home/index');
        }
    }


    public function editTournament($tournament_id)
    {
    
        
        if (isset($tournament_id)) {
            
            $tournament = $this->model->getTournament($tournament_id);
            $teams =$this->model->getTeams($tournament_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
        
            header('location: ' . URL . 'home/index');
        }
    }

     public function addTournament()
    {
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/add.php';
            require APP . 'view/_templates/footer.php';

    }

      public function updateTournament()
    {

        // if we have POST data to create a new song entry
        if (!empty($_POST)) {
            // do updateSong() from model/model.php
            if(isset($_POST['tournament_id'])){
                   $this->model->updateTournament($_POST["tournament_name"], $_POST["number_of_playtime"], $_POST['tournament_id']);
                    $tournament_id=$_POST['tournament_id'];
               }else{
                  $tournament_id=$this->model->addTournament($_POST["tournament_name"], $_POST["number_of_playtime"]);
         
               }

                $this->model->updateTeams($_POST['teams'],$tournament_id);
         
        }

        // where to go after song has been added
        header('location: ' . URL . 'home/index');
    }


    public function error404()
    {
       
        require APP . 'view/problem/error.php';
    
    }


}
