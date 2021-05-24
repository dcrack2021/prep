<?php

      require_once('include/header.php');
      require_once('include/sidebar.php');

      // error_reporting(0);

      $s =  $conn->real_escape_string(strip_tags($_GET['s'])); 

      
      $result = $conn->query("SELECT * FROM questions WHERE qid LIKE '$s'");

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
                        <input type="text" class="form-control"  id="inputText" name="ques" placeholder=" Question" value="<?php echo $row_single['ques']; ?>" required maxlength="150">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Answer <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="answ" placeholder=" Answer" value="<?php echo $row_single['ans']; ?>" required maxlength="150">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 1 <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn1" placeholder="Option 1" value="<?php echo $row_single['optn1']; ?>" required maxlength="150">
                      </div>
                        <div class="form-group col-md-6">
                          <label for="inputEmail4"> Option 2 <spam style="color:red;">*</spam></label>
                          <input type="text" class="form-control"  id="inputText" name="optn2" placeholder=" Option 2" value="<?php echo $row_single['optn2']; ?>" required maxlength="150">
                        </div>

                    </div>


                    <div class="form-row">
                       <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 3 <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn3" placeholder=" Option 3" value="<?php echo $row_single['optn3']; ?>" required maxlength="150">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4"> Option 4 <spam style="color:red;">*</spam></label>
                        <input type="text" class="form-control"  id="inputText" name="optn4" placeholder=" Option 4" value="<?php echo $row_single['optn4']; ?>" required maxlength="150">
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer text-center">
                    <input type="hidden" name="q" value="<?php echo $s; ?>" />
                    <button type="submit" name="UpdQuesiton" value="" class="btn btn-primary">Update</button>
                  </div>
                </div>
                </form>
        </section>
       
     
        
       



    <?php

    require_once('include/footer.php');
?>