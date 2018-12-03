 <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Edit a tournament</h3>
              </div>
            </div>


             <div class="col-sm-12 col-md-6">
                       <form action="<?php echo URL; ?>home/updateTournament" method="POST">
         
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <input type="text" name="tournament_name" class="form-control" placeholder="Tournament Name"  required>
                              </div>                              
                             </div>

                              <div class="form-row">
                              <div class="form-group col-md-12">
                                <input type="number" name="number_of_playtime" class="form-control" placeholder="Number Of play Time" min="0"  required>
                              </div>
                             </div>

                             <div class="form-group">
                              <select class="form-control" id="numberofteam">
                                <?php for($i=1;$i<20;$i++) { ?>
                                <option>   <?php echo $i ?></option>
                                <?php } ?>
                    
                              </select>
                            </div>

                            <div id="teams">



                            </div>

    

                            <input type="submit" class="btn btn-success" value="Update">
                             

                          </form>
                        </div>
</div>

