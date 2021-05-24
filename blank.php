<?php

    require_once('include/header.php');
    require_once('include/config.php');
    require_once('include/sidebar.php');

    
      
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="col-12 col-sm-6 ">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Administrator</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="scripts.php" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="text">Username</label>
                    <input id="text" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label" >Password</label>
                    </div>
                    <input id="password" type="password" class="form-control"  name="passcode" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  
                    <!-- <div class="form-group">
                      <label>Auth </label>
                      <select class="custom-select" id="authcodes" >
                        <option selected> select </option>
                        <option value="A112">master</option>
                        <option value="A115">super</option>
                        <option value="A113">normal</option>
                      </select>
                    </div> -->
                  <div class="form-group text-center">
                    <button type="submit" name="Admini"  class="btn btn-primary btn-md " >
                      Add 
                    </button>
                  </div>
                </form>
                
               
              </div>
            </div>
            </div>
          </div>
        </section>

        <script>

          function ExecFunction() {
            var x = document.getElementById("text").value;
            var y = document.getElementById("password").value;
            //var z = document.getElementById("authcodes").value;
          

            $.ajax({
            type: "POST",
            url: 'web-script.php',
            data:{
             
              "Executive":true,
              "username":x,
              "passcode":y
            },
            success:function(response){

              alert(response);
              location.reload();
             // var jsonData = JSON.parse(response);
             // document.getElementById("empusername").setAttribute("value", jsonData);
            }
          });
          }
</script>
 <?php
          require_once('include/footer.php');

?>