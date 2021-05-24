<?php

      require_once('include/header.php');
      require_once('include/sidebar.php');

      error_reporting(0);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="card col-12 col-md-8 col-lg-12">
                  <div class="card-header">
                    <h4>New  Question </h4>
                  </div>
                  <form method="post" action="scripts.php" autocomplete="off" enctype="multipart/form-data">
                  <div class="card-body" >

                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label>Category</label>
                        <select class="form-control" name="category">
                        <?php 
                              $result = $conn->query("SELECT * FROM category WHERE status = 1");

                              while($row = $result -> fetch_assoc()) {
                                echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
                              }
                        ?>
                          
                        </select>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="form-group col-md-5">
                        <label>Mode</label>
                        <select class="form-control" name="mode">
                          <option value="easy">Easy</option>
                          <option value="medium">Medium</option>
                          <option value="hard">Hard</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Question <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="ques" placeholder=" Question" required maxlength="150">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Answer <spam style="color:red;">*</spam></label>
                        <select class="form-control" name="answ">
                          <option value="1">A</option>
                          <option value="2">B</option>
                          <option value="3">C</option>
                          <option value="4">D</option>
                        </select>
                     
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 1 (A) <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn1" placeholder="Option 1" required maxlength="150">
                      </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4"> Option 2 (B)<spam style="color:red;">*</spam></label>
                          <input type="text" class="form-control"  id="inputText" name="optn2" placeholder=" Option 2" required maxlength="150">
                        </div>

                    </div>


                    <div class="form-row">
                       <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 3 (C)<spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn3" placeholder=" Option 3" required maxlength="150">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 4 (D) <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn4" placeholder=" Option 4" required maxlength="150">
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" name="NewQuesiton" value="" class="btn btn-primary">Add</button>
                  </div>
                </div>
                </form>
        </section>
       
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  
                  <div class="card-header">
                    <div class="col-10">
                    <h4>Questions</h4>
                    </div>
                    
                  </div>
                  
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="align-middle"> Question</th>
                            <th class="align-middle">Answer </th>
                            <th class="align-middle">Category </th>
                            <th class="align-middle">Mode </th>
                            <th class="align-middle"> Option 1 </th>
                            <th class="align-middle">Option 2</th>
                            <th class="align-middle"> Option 3 </th>
                            <th class="align-middle">Option 4</th>
                            <th class="align-middle"> Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          <?php 

                            $result = $conn->query("SELECT * FROM questions WHERE status = 1"); 

                            if($result->num_rows>0){

                              $no = 1;
                            while ($row = $result->fetch_assoc()) {
                             
                              echo '<tr>
                              <td class="align-middle">
                                '.$no.'
                              </td>
                              <td>'.$row['ques'].'</td>
                              <td>'.$row['ans'].'</td>
                              <td>'.$row['category'].'</td>
                              <td>'.$row['mode'].'</td>
                              <td>'.$row['optn1'].'</td>
                              <td>'.$row['optn2'].'</td>
                              <td>'.$row['optn3'].'</td>
                              <td>'.$row['optn4'].'</td>
                              <td>
                              <a href="question.php?s='.$row['qid'].'" class="badge  badge-shadow" data-toggle="tooltip" data-placement="left"
                              title="Update This Question"><span class="far fa-edit text-warning"> </span></a>

                              &nbsp; &nbsp; &nbsp; <a href="scripts.php?DlQuestion=true&s='.$row['qid'].'" class="badge  badge-shadow" data-toggle="tooltip" data-placement="left"
                              title="Delete This Questions Without Conformation "><span class="text-danger font-weight-bold">X </span></a>
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