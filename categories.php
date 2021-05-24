<?php

      require_once('include/header.php');
      require_once('include/sidebar.php');

      error_reporting(0);
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="card col-12 col-md-8 col-lg-8">
                  <div class="card-header">
                    <h4>Add  Category </h4>
                  </div>
                  <form method="post" action="scripts.php" autocomplete="off" enctype="multipart/form-data">
                  <div class="card-body" >

                  
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputEmail4"> Category Name <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="category" placeholder=" Category Name" required maxlength="50">
                      </div>
                     
                    </div>
                    
                   
                    
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" name="AddCategory" value="" class="btn btn-primary">Add</button>
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
                    <h4>Category</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th class="align-middle">Category </th>
                           
                            
                           
                            <th class="align-middle"> Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          <?php 

                            $result = $conn->query("SELECT * FROM category WHERE status = 1"); 

                            if($result->num_rows>0){

                              $no = 1;
                            while ($row = $result->fetch_assoc()) {
                              echo '<tr>
                              <td class="text-center">
                                '.$no.'
                              </td>
                        
                              <td>
                              '.$row['category'].'
                              </td>
                              
                               <td>
                                <a href="scripts.php?DlCategory=true&s='.$row['id'].'" class="badge  badge-shadow" data-toggle="tooltip" data-placement="left"
                                title="Please Careful Do not ask for conformation (Delete Category) "><span class="text-danger font-weight-bold">X </span></a>
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