<?php
session_start();
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

        $sql = "INSERT INTO `sessions` (`name`, `color`, `price`, `is_active`, `user_id`) 
        VALUES ('".$_POST['nam']."', '".$_POST['col']."', '".$_POST['pric']."', 1, '".$user_id."');";

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
      $sql_update = "UPDATE `sessions` SET `name` = '".$_POST['nam']."', `color` = '".$_POST['col']."', `price` = ".$_POST['pric']." WHERE id = '".$_POST['rowid']."'";
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
              <h3 class="page-title"> Session </h3>
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
        + Add Session
        </button>
        <br><br>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Add Session</h5>
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
                        <form action="session.php" method="post" id="modal-details">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Name" name="nam" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Color *</label>
                            <div class="col-sm-9">
                            <input type="color" class="form-control" placeholder="Color Code." name="col" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price *</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Type Price..." name="pric" required/>
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
                    <button class="btn btn-primary" name="bts" value="Submit">Create</button>
                </div>
                </div>
                </form>
            </div>
            </div>


 
           <!-- update modal -->
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Update Session</h5>
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
                        <form action="session.php" method="post" id="modal-details">
                          <div class="form-group row">
                          <input type="hidden" id="u_id" class="form-control" name="rowid" value=""/>
                            <label class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input type="text" id="name" class="form-control" placeholder="Enter Your Name" name="nam" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Color *</label>
                            <div class="col-sm-9">
                            <input type="color" id="colo" class="form-control" placeholder="Color Code." name="col" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price *</label>
                            <div class="col-sm-9">
                            <input type="text" id="price" class="form-control" placeholder="Type Price..." name="pric" required/>
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
                    <button class="btn btn-primary" name="update_bts" value="Submit">Update</button>
                </div>
                </div>
                </form>
            </div>
            </div>
<!-- update modal end -->



                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Color </th>
                            <th> Price </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql_select = "SELECT * FROM `sessions` WHERE `user_id` = ".$user_id;
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<tr class="table-secondary">
                                            <td> '.$i.' </td>
                                            <td> '.$row['name'].' </td>
                                            <td> '.$row['color'].' </td>
                                            <td> '.$row['price'].' </td>
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
    url: "fetch_session.php",
    method: "POST",
    data: {_id: id},
    dataType:"json",
    success:function(response) {
      console.log(response);
      $('#name').val(response.name);
      $('#colo').val(response.color);
      $('#price').val(response.price);
      $('#u_id').val(response.id);
    }
  })
}
</script>