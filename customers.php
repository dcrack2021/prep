<?php

    require_once('include/header.php');
    require_once('include/sidebar.php');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  
                  <div class="card-header">
                    <div class="col-10">
                    <h4>Peoples</h4>
                    </div>
                    <!-- <a  href="exportcustomers.php" class="btn btn-outline-primary" >Export</a> -->
                  </div>
                  
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="align-middle"> Username</th>
                            <th class="align-middle">Name </th>
                            <th class="align-middle"> Total Attempt Quiz </th>
                            <th class="align-middle">Highest Score</th>
                            <th class="align-middle"> Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          <?php 

                            $result = $conn->query("SELECT * FROM users WHERE status = 1"); 

                            if($result->num_rows>0){

                              $no = 1;
                            while ($row = $result->fetch_assoc()) {
                              $uid = $row['uid'];
                              $stmt = $conn->query("SELECT * FROM history WHERE uid = '$uid'");
                              
                              $count = $stmt -> num_rows;

                              $highscore = $conn->query("SELECT score FROM history WHERE uid = '$uid' ORDER BY score DESC LIMIT 1");

                              $score = $highscore->fetch_assoc();
                              echo '<tr>
                              <td>
                                '.$no.'
                              </td>
                              <td>'.$row['user'].'</td>
                              <td>'.$row['name'].'</td>
                              <td>
                              '.$count.'
                              </td>

                              <td>
                              '.$score['score'].'
                              </td>
                              <td>
                              
                              &nbsp; <a href="scripts.php?DlUAccount=true&s='.$row['uid'].'" class="badge  badge-shadow" data-toggle="tooltip" data-placement="left"
                              title="Please Careful Do not ask for conformation ( closing account ) "><span class="text-danger font-weight-bold">X </span></a>
                              </td>
                              
                            </tr>';
                            $no++;
                            }
                            }

                            


                          ?>
                          
                        
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
                
            

        
    
       <?php
          require_once('include/footer.php');
       ?>