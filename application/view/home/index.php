 <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
              
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Tournaments</h6>
                    <br>
                   <a href="<?php echo URL . 'home/addTournament' ?>"> <button class="btn btn-info">Add </button> </a>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Tournament Name</th>
                          <th scope="col" class="border-0">Play TIme</th>
                          <th scope="col" class="border-0">Number of Teams</th>
                       
                          <th scope="col" colspan"2" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody> <?php foreach ($tournaments as $tournament) { ?>
                <tr>
                    <td><?php if (isset($tournament->id)) echo htmlspecialchars($tournament->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($tournament->tournament_name)) echo htmlspecialchars($tournament->tournament_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($tournament->number_of_playtime)) echo htmlspecialchars($tournament->number_of_playtime, ENT_QUOTES, 'UTF-8'); ?></td>
                     <td><?php if (isset($tournament->numberofteams)) echo htmlspecialchars($tournament->numberofteams, ENT_QUOTES, 'UTF-8'); ?></td>
                   
                    <td><a href="<?php echo URL . 'home/editTournament/' . htmlspecialchars($tournament->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                    <td><a href="<?php echo URL . 'home/Generate/' . htmlspecialchars($tournament->id, ENT_QUOTES, 'UTF-8'); ?>">Schedule</a></td>
              
                </tr>
            <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
        
          </div>