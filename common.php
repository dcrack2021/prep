<?php

    require_once('include/header.php');
    require_once('include/config.php');
    require_once('include/sidebar.php');

    
      $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM varibles"));
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-7">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Service Tex</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                          Service Tex
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['repair_service_tax']; ?>  
                        </span>
                      </p>
                        <span class="float-right text-muted">
                        <button type="button" value="<?php  echo $row['repair_service_tax']; ?>" onclick="myFunction()"  id="infoBtn" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#basicInfoModal">Change Tex</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Delivery Charge</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                        Delivery Charge
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['delivery_tax']; ?>
                        </span>
                      </p>
                        <span class="float-right text-muted">
                        <button type="button" value=" <?php  echo $row['delivery_tax']; ?>" onclick="generalFunction()"  id="btn" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#generalPackage">Change Delivery Charge</button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-5">
              <div class="card card-warning">
                  <div class="card-header">
                    <h4>Rent Security Tex</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                          Rent Security Tex
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['rent_security_tax']; ?>
                        </span>
                      </p>
                        <span class="float-right text-muted">
                        <button type="button" value="<?php  echo $row['rent_security_tax']; ?>" onclick="priceFunction()"  id="btnPrice" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#pricingModel">Change Security Tex</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Delivery</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                        Free up after
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['max_pay_delivery_free']; ?>  
                        </span>
                      </p>
                      <span class="float-right text-muted">
                        <button type="button" value="  <?php  echo $row['max_pay_delivery_free']; ?>" onclick="processFunction()"  id="btnProc" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#processorPackage">Change </button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h4>GST Tex</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                        GST Tex
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['gst_tax']; ?>
                        </span>
                      </p>
                        <span class="float-right text-muted">
                        <button type="button" value="<?php  echo $row['gst_tax']; ?> " onclick="GSTFunction()"  id="btnGST" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#ArchitecturePackage">Change Tex</button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="card card-success">
                  <div class="card-header">
                    <h4>TimeSloat</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-8">
                      <p class="clearfix">
                        <span class="float-left">
                        TimeSloat Max 
                        </span>
                        <span class="float-right text-muted">
                        <?php  echo $row['repair_slotmax_length']; ?>   
                        </span>
                      </p>
                        <span class="float-right text-muted">
                        <button type="button" value=" <?php  echo $row['repair_slotmax_length']; ?>   " onclick="ArchitectureFunction()"  id="btnArchitecture" name="button" class="btn badge  text-info" data-toggle="modal" data-target="#DisplayPackage">Change</button>
                        </span>
                    </div>
                  </div>
                </div>
                
                
              </div>
            </div>
            
            
           
          </div>
        </section>

        <script>
            function myFunction() {
              var x = document.getElementById("infoBtn").value;

              document.getElementById("ID").setAttribute("value", x);
              document.getElementById("servicetax").setAttribute("value", x);
             
            }

            function generalFunction() {
              var x = document.getElementById("btn").value;

             
              document.getElementById("ID").setAttribute("value", x);
              document.getElementById("deliverycharge").setAttribute("value", x);
             
            }

            function priceFunction() {
              var x = document.getElementById("btnPrice").value;

            
              
              document.getElementById("ID").setAttribute("value",x);
              document.getElementById("rentsecurity").setAttribute("value",x);
            
            }

            function processFunction() {
              var x = document.getElementById("btnProc").value;

              
             
              document.getElementById("ID").setAttribute("value",x);
              document.getElementById("freeup").setAttribute("value", x);
              
            }

            function GSTFunction() {
              var x = document.getElementById("btnGST").value;

              
             
              document.getElementById("ID").setAttribute("value",x);
              document.getElementById("gsttax").setAttribute("value", x);
              
            }

            function ArchitectureFunction() {
              var x = document.getElementById("btnArchitecture").value;

              
              document.getElementById("ID").setAttribute("value", x);
              document.getElementById("maxtimeslot").setAttribute("value", x);
            
            }

            function ServiceTxFunc() {
                var x = document.getElementById("servicetax").value;

                $.ajax({
              type: "POST",
              url: 'web-script.php',
              data:{
                "key": x,
                "common":true,
                "code":"012"
              },
              success:function(response){
                
                alert(response);
                location.reload();
              }
            });
            }

            function DeliveryFreeFunc() {
                var x = document.getElementById("deliverycharge").value;

                $.ajax({
              type: "POST",
              url: 'web-script.php',
              data:{
                "key": x,
                "common":true,
                "code":"013"
              },
              success:function(response){
                
                alert(response);
                location.reload();
              }
            });
            }

            function RentSecureFunc() {
                var x = document.getElementById("rentsecurity").value;

                    $.ajax({
                    type: "POST",
                    url: 'web-script.php',
                    data:{
                    "key": x,
                    "common":true,
                    "code":"014"
                    },
                    success:function(response){

                    alert(response);
                    location.reload();
                    }
                    });
            }

            function DeliverySecFunc() {
                var x = document.getElementById("freeup").value;

                $.ajax({
                type: "POST",
                url: 'web-script.php',
                data:{
                "key": x,
                "common":true,
                "code":"016"
                },
                success:function(response){

                alert(response);
                location.reload();
                }
                });
            }

            function GstTxFunc() {
                var x = document.getElementById("gsttax").value;

                $.ajax({
                type: "POST",
                url: 'web-script.php',
                data:{
                "key": x,
                "common":true,
                "code":"015"
                },
                success:function(response){

                alert(response);
                location.reload();
                }
                });
            }

            function TimeSltFunc() {
                var x = document.getElementById("maxtimeslot").value;

                $.ajax({
                type: "POST",
                url: 'web-script.php',
                data:{
                "key": x,
                "common":true,
                "code":"017"
                },
                success:function(response){

                alert(response);
                location.reload();
                }
                });
            }
        </script>

        <div class="modal fade" id="basicInfoModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
       
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Service Tax</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">service tax</label>
                       <div class="col-sm-9">
                         <input type="text" name="servicetax" value="" id="servicetax" class="form-control" >
                      
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-basic"  class="btn badge btn-info" onclick="ServiceTxFunc();">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="generalPackage" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
       
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Delivery Charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">delivery charge</label>
                       <div class="col-sm-9">
                         <input type="text" name="deliverycharge" value="" id="deliverycharge" class="form-control" >
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-basic" onclick="DeliveryFreeFunc();" class="btn badge btn-info">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
       

        <div class="modal fade" id="pricingModel" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Rent Security Tax</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">rent security tax</label>
                       <div class="col-sm-9">
                         <input type="text" name="rentsecurity" value="" id="rentsecurity" class="form-control" >
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                    

                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-pricing" onclick="RentSecureFunc();" class="btn badge btn-info">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="processorPackage" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Delivery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">Free up after</label>
                       <div class="col-sm-9">
                         <input type="text" name="freeup" value="" id="freeup" class="form-control" >
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-pricing" onclick="DeliverySecFunc();" class="btn badge btn-info">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
       

        <div class="modal fade" id="ArchitecturePackage" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
       
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">GST Tax</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">gst tax</label>
                       <div class="col-sm-9">
                         <input type="text" name="gsttax" value="" id="gsttax" class="form-control" >
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-basic" onclick="GstTxFunc();" class="btn badge btn-info">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="DisplayPackage" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
       
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Timeslot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="needs-validation" action="web-script.php" method="post" novalidate="" >
                   <div class="card-body">
                     <div class="form-group row">
                       <label class="col-sm-3 col-form-label">timesloat</label>
                       <div class="col-sm-9">
                         <input type="text" name="maxtimeslot" value="" id="maxtimeslot" class="form-control" >
                         <div class="valid-feedback">
                           Good job!
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="text-center ">
                     <p id="tempVal"> </p>
                     <input type="hidden" name="ID"  id="ID">
                     <button type="button" name="change-basic" onclick="TimeSltFunc();" class="btn badge btn-info">Save Changes</button>
                   </div>
                 </form>
              </div>
            </div>
          </div>
        </div>

       
      <?php
          require_once('include/footer.php');
      ?>