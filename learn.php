<?php

      require_once('include/header.php');
      require_once('include/sidebar.php');

      // error_reporting(0);

      $s =  $conn->real_escape_string(strip_tags($_GET['s'])); 

      
      $result = $conn->query("SELECT * FROM learn WHERE id LIKE '$s'");

       $row_single = $result->fetch_assoc();
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="card col-12 col-md-8 col-lg-12">
                  <div class="card-header">
                    <h4>Question </h4>
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
                     
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Question <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="ques" placeholder=" Question" value="<?php echo $row_single['ques']; ?>" required maxlength="150">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Answer <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="answ" placeholder=" Answer" value="<?php echo $row_single['answer']; ?>" required maxlength="150">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <input type="hidden" name="q" value="<?php echo $s; ?>" />
                    <button type="submit" name="UpdLernQuesiton" value="" class="btn btn-primary">Update</button>
                  </div>
                </div>
                </form>
        </section>
       
     
        
       



    <?php

    require_once('include/footer.php');
?>