 <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Tournament Scheduler</h3>
              </div>
            </div>

            <?php foreach($schedule as $round => $matchups){ ?>
        <h3>Round <?=$round?></h3>
        <ul>
        <?php foreach($matchups as $matchup) { ?>
            <li><?=$matchup[0] ?? '*BYE*'?> vs. <?=$matchup[1] ?? '*BYE*'?></li>
        <?php } ?>
        </ul>
        <?php } ?>


          
</div>

