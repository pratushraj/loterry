<?php
session_start();
$user = $_SESSION['USER_ROLE'];
include 'conn.php';
if(!isset($_SESSION['USER_ROLE'])) {
  header("Location: login.php");
}
include 'header.php';
include 'nav.php';
include 'top-nav.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['bts'])) {
    if($_POST['bts'] == "Submit") {

      $sql_select = "SELECT * FROM users WHERE email = '".$_POST['us']."'";
      $fetch = mysqli_query($conn, $sql_select);
      $row = mysqli_fetch_array($fetch);
      
      if(isset($row['email'])) {
        if($row['email'] == $_POST['us']) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> This email is already registered. Please try with another name.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        } 
      }else {
        if($user == 1) {
          $user_role = 2;
        } else if($user == 2) {
          $user_role = 3;
        } else if($user == 3) {
          $user_role = 4;
        }
        $sql = "INSERT INTO users (`name`, `company_name`, `phone_no`, `adress`, `incentive`, `email`, `pass`, `user_role`) 
        VALUES ('".$_POST['nam']."', '".$_POST['com']."', ".$_POST['phone'].", '".$_POST['add']."', ".$_POST['inc'].", '".$_POST['us']."', '".$_POST['pas']."', '".$user_role."');";
        $result = mysqli_query($conn, $sql);
        if(isset($result)) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Thank You!</strong> You have sucessfully submitted your result.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
      }
    }
  }

  if(isset($_POST['update_bts'])) {
    if($_POST['update_bts'] == "Submit") {
      $sql_select = "SELECT * FROM users WHERE email = '".$_POST['us']."'";
      $sql_update = "UPDATE users SET `name` = '".$_POST['nam']."', `company_name` = '".$_POST['com']."', `phone_no` = ".$_POST['phone'].", `adress` =  '".$_POST['add']."', `incentive` = ".$_POST['inc'].", `pass` = '".$_POST['pas']."'   WHERE email = '".$_POST['us']."'";
      $result = mysqli_query($conn, $sql_update);
      if(isset($result)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thank You!</strong> You have sucessfully Updated.
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
              <h3 class="page-title"> Distributor </h3>
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDist">
        + Add Distributor
        </button>
        <br><br>

            <!-- Modal -->
            <div class="modal fade" id="addDist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Add Distributor</h5>
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
                        <form action="distributer.php" method="post" id="modal-details">
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
                    <!-- <button type="button" class="btn btn-primary" form="modal-details" name="crateDeal" value="Submmit">Create</button> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Distributor</h5>
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
                        <form action="distributer.php" method="post" id="modal-details">
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
                      <p class="card-description"> Create the dealer credentials :  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">User *</label>
                            <div class="col-sm-9">
                              <input type="text" id="u_email" class="form-control" placeholder="Enter the deler Email.." name="us" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password *</label>
                            <div class="col-sm-9">
                              <input type="password" id="u_pass" class="form-control" placeholder="Enter the password.." name="pas" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="card-description"> Session Wise Report *  </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MOR *</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" placeholder="Type Rate" name="mor" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DAY *</label>
                            <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Type Rate" name="day" required/>
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
                            <th> # </th>
                            <th> Distributor Name </th>
                            <th> Phone No. </th>
                            <th> EmailId </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                if($user == 1) {
                                  $user_role = 2;
                                } else if($user == 2) {
                                  $user_role = 3;
                                } else if($user == 3) {
                                  $user_role = 4;
                                }
                          $sql_select = "SELECT * FROM users WHERE user_role = $user_role";
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<tr class="table-secondary">
                                            <td> '.$i.' </td>
                                            <td> '.$row['name'].' </td>
                                            <td> '.$row['phone_no'].' </td>
                                            <td> '.$row['email'].' </td>
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
    url: "fetch.php",
    method: "POST",
    data: {_id: id},
    dataType:"json",
    success:function(response) {
      $('#u_name').val(response.name);
      $('#u_c_name').val(response.company_name);
      $('#u_phone').val(response.phone_no);
      $('#u_add').val(response.adress);
      $('#u_inc').val(response.incentive);
      $('#u_email').val(response.email);
      $('#u_pass').val(response.pass);
    }
  })
}


</script>