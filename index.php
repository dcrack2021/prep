<?php
    require_once('include/header.php');
    require_once('include/sidebar.php');

    // Count of Total Questions
    $stmt_ques = $conn->query("SELECT * FROM questions");
    $count_ques = $stmt_ques -> num_rows;

    // Count of Total People
    $stmt_peop = $conn -> query("SELECT * FROM users");
    $count_peop = $stmt_peop -> num_rows;

    // Count of Total Category
    $stmt_cat = $conn -> query("SELECT * FROM category");
    $count_cat = $stmt_cat -> num_rows;

    // Total Attemped Quiz
    $stmt_quiz = $conn -> query("SELECT * FROM history");
    $count_quiz = $stmt_quiz -> num_rows;


    // Easy Mode Average
    $stmt_easy = $conn -> query("SELECT * FROM history WHERE mode = 'easy'");
    $count_easy = $stmt_easy -> num_rows;

    $avg_easy = round(($count_easy / $count_quiz) * 100);


    // Medium Mode Average
    $stmt_medium = $conn -> query("SELECT * FROM history WHERE mode = 'medium'");
    $count_medium = $stmt_medium -> num_rows;

    $avg_medium = round(($count_medium / $count_quiz) * 100);

    // Hard Mode Average
    $stmt_hard = $conn -> query("SELECT * FROM history WHERE mode = 'hard'");
    $count_hard = $stmt_hard -> num_rows;

    $avg_hard = round(($count_hard / $count_quiz) * 100);


    

?>
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0">Questions</h6>
                        <span class="font-weight-bold mb-0"><?php echo $count_ques; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="card-circle l-bg-orange text-white">
                          <i class="fas fa-book-open"></i>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0"> Peoples</h6>
                        <span class="font-weight-bold mb-0"> <?php echo $count_peop; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="card-circle l-bg-cyan text-white">
                          <i class="fas fa-diagnoses"></i>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0">Category</h6>
                        <span class="font-weight-bold mb-0"><?php echo $count_cat ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="card-circle l-bg-green text-white">
                          <i class="fas fa-cart-plus"></i>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-body card-type-3">
                    <div class="row">
                      <div class="col">
                        <h6 class="text-muted mb-0">Timeline Quiz</h6>
                        <span class="font-weight-bold mb-0"><?php echo $count_quiz; ?></span>
                      </div>
                      <div class="col-auto">
                        <div class="card-circle l-bg-purple text-white">
                          <i class="fas fa-chart-bar  "></i>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Quiz Status</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Mode</th>
                        
                          <th>Process</th>
                          <th>Count</th>
                        </tr>
                        <tr>
                          <td>Easy</td>
                          
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="<?php echo $avg_easy; ?>%">
                              <div class="progress-bar bg-success" data-width="<?php echo $avg_easy; ?>"></div>
                            </div>
                          </td>
                          <td><?php echo $count_easy; ?></td>
                        </tr>
                        <tr>
                          <td>Medium</td>
                          
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="<?php echo $avg_medium; ?>%">
                              <div class="progress-bar bg-purple" data-width="<?php echo $avg_medium; ?>"></div>
                            </div>
                          </td>
                          <td><?php echo $count_medium; ?></td>
                        </tr>
                        <tr>
                          <td>Hard</td>
                          
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="<?php echo $avg_hard; ?>%">
                              <div class="progress-bar bg-orange" data-width="<?php echo $avg_hard; ?>"></div>
                            </div>
                          </td>
                          <td><?php echo $count_hard; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
            
        </section>
        
        <?php
        
        require_once('include/footer.php');?>