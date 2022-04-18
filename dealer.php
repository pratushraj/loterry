<?php
session_start();
$user = $_SESSION['USER_ROLE'];
$user_id = $_SESSION['USER_ID'];
// var_dump($_SESSION);
include 'conn.php';
if(!isset($_SESSION['USER_ROLE'])) {
  header("Location: login.php");
}
include 'header.php';
include 'nav.php';
include 'top-nav.php';
// dealer
if($user == 1) {
  $user_role = 2;
} else if($user == 2) {
  $user_role = 3;
} else if($user == 3) {
  $user_role = 4;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['bts'])) {
    if($_POST['bts'] == "Submit") {

        $sql = "INSERT INTO dealer (`name`, `c_name`, `phone`, `address`, `incentive`, `mor`, `day`, `eve`, `user_id`) 
        VALUES ('".$_POST['nam']."', '".$_POST['com']."', ".$_POST['phone'].", '".$_POST['add']."', ".$_POST['inc'].", '".$_POST['mor']."', '".$_POST['day']."', '".$_POST['eve']."', '".$user_id."');";
        $result = mysqli_query($conn, $sql);
        if($result) {
          echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Thank You!</strong> You have sucessfully submitted your result.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      } else {
        echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps Sorry!</strong> There were something wrong, Please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
  }

  if(isset($_POST['update_bts'])) {
    if($_POST['update_bts'] == "Submit") {
      $sql_update = "UPDATE dealer SET `name` = '".$_POST['nam']."', `c_name` = '".$_POST['com']."', `phone` = ".$_POST['phone'].", `address` =  '".$_POST['add']."', `incentive` = ".$_POST['inc'].", `mor` = '".$_POST['mor']."', `day` = '".$_POST['day']."', `eve` = '".$_POST['eve']."' WHERE id = '".$_POST['rowid']."'";
      $result = mysqli_query($conn, $sql_update);
      if($result) {
        echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thank You!</strong> You have sucessfully Updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      } else {
        echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps Soory!</strong> Somwthing went wrong, Please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
  }

}

?>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Dealer </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            
              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        + Add Dealer
        </button>
        <br><br>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Add Dealer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title"><small>The field labels marked with * are required input fields.</small></h6>
                      <!-- <p class="card-description"> Personal info </p> -->
                      <div class="row">
                        <div class="col-md-6">
                        <form action="dealer.php" method="post" id="modal-details">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Name" name="nam" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Name *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Company Name" name="com" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone No. *</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Enter Your Phone No." name="phone" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Adress" name="add" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Incentive *</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Type Incentive..." name="inc" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <p class="card-description"> Create the dealer credentials :  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">User *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter the deler Email.." name="us" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password *</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" placeholder="Enter the password.." name="pas" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="card-description"> Session Wise Report *  </p>
                      <div class="row">

                      <?php
                          $sql_select = "SELECT * FROM `sessions` WHERE `user_id` = ".$user_id;
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">'.$row['name'].' *</label>
                                  <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Type Rate" name="mor" value="'.$row['price'].'" required/>
                                  </div>
                                </div>
                              </div>';
                              }
                            }
                          }
                      ?>
                      </div>

                  </div>
                </div>
              </div>
                </div>
                <div class="modal-footer" style="background: gray;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="bts" value="Submit">Create</button>
                </div>
                </div>
                </form>
            </div>
            </div>


                        <!-- Update modal -->
                        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Update Dealer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title"><small>The field labels marked with * are required input fields.</small></h6>

                      <!-- <p class="card-description"> Personal info </p> -->
                      <div class="row">
                        <div class="col-md-6">
                        <form action="dealer.php" method="post" id="modal-details">
                        <input type="hidden" id="u_id" class="form-control" name="rowid" value=""/>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >Name *</label>
                            <div class="col-sm-9">
                              <input type="text" id="u_name" class="form-control" placeholder="Enter Your Name" name="nam" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >Company Name *</label>
                            <div class="col-sm-9">
                              <input type="text" id="u_c_name" class="form-control" placeholder="Enter Your Company Name" name="com" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone No. *</label>
                            <div class="col-sm-9">
                            <input type="text" id="u_phone" class="form-control" placeholder="Enter Your Phone No." name="phone" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address *</label>
                            <div class="col-sm-9">
                              <input type="text" id="u_add" class="form-control" placeholder="Enter Your Adress" name="add" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Incentive *</label>
                            <div class="col-sm-9">
                            <input type="text" id="u_inc" class="form-control" placeholder="Type Incentive..." name="inc" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <br><br>
                      <p class="card-description"> Session Wise Report *  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MOR *</label>
                            <div class="col-sm-9">
                              <input type="number" id="mor" class="form-control" placeholder="Type Rate" name="mor" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DAY *</label>
                            <div class="col-sm-9">
                            <input type="number" id="day" class="form-control" placeholder="Type Rate" name="day" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">EVE *</label>
                            <div class="col-sm-9">
                            <input type="number" id="eve" class="form-control" placeholder="Type Rate" name="eve" required/>
                            </div>
                          </div>
                        </div>
                      </div>


                  </div>
                </div>
              </div>
                </div>
                
                <div class="modal-footer" style="background: gray;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" form="modal-details" name="crateDeal" value="Submmit">Create</button> -->
                    <button class="btn btn-primary" name="update_bts" value="Submit">Update</button>
                </div>
                </div>
                </form>
            </div>
            </div>


            <!-- Update modal end -->


                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> Sr no. </th>
                            <th> Name </th>
                            <th> Phone No. </th>
                            <th> Company Name </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql_select = "SELECT * FROM dealer WHERE `user_id`= ".$user_id;
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<tr class="table-secondary">
                                            <td> '.$i.' </td>
                                            <td> '.$row['name'].' </td>
                                            <td> '.$row['phone'].' </td>
                                            <td> '.$row['c_name'].' </td>
                                            <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update" onclick="update('.$row['id'].')">
                                            <i class="mdi mdi-table-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-success">
                                            <i class="mdi mdi-delete-forever"></i> 
                                            </button>
                                            </td>
                                            </tr>';
                                $i = $i+1;
                              }
                            } else {
                              echo '
                                    No data available.
                                    ';
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


<?php
include 'footer.php';
?>

<script>

function update(id) {
  $.ajax({
    url: "fetch_dealer.php",
    method: "POST",
    data: {_id: id},
    dataType:"json",
    success:function(response) {
      console.log(response);
      $('#u_name').val(response.name);
      $('#u_c_name').val(response.c_name);
      $('#u_phone').val(response.phone);
      $('#u_add').val(response.address);
      $('#u_inc').val(response.incentive);
      $('#mor').val(response.mor);
      $('#day').val(response.day);
      $('#eve').val(response.eve);
      $('#u_id').val(response.id);
    }
  })
}

// function update(id) {
//   $.ajax({
//     url: "update_dealer.php",
//     method: "POST",
//     data: {_id: id, nam: $('#u_name').val(),c_name: $('#u_c_name').val() },
//     dataType:"json",
//     success:function(response) {
//       console.log(response);

//     }
//   })
// }
$(document).ready(function() {
  setTimeout(function() {
    $('#alert').css("display", "none");
  }, 5000);
});

</script>