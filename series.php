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
        // print_r($_POST['alphabet_group']);
        // echo $List = implode(', ', $_POST['alphabet_group']);
        // exit;
        $sql = "INSERT INTO `series` (`name`, `alphabets`, `is_active`) 
        VALUES ('".$_POST['nam']."', '".implode(',', $_POST['alphabet_group'])."', 1);";

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
      $sql_update = "UPDATE `series` SET `name` = '".$_POST['nam']."', `alphabets` = '".implode(',', $_POST['alphabet_group'])."' WHERE id = '".$_POST['rowid']."'";
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
              <h3 class="page-title"> Series </h3>
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
        + Add Series
        </button>
        <br><br>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Add Series</h5>
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
                        <form action="series.php" method="post" id="modal-details">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Name" name="nam" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <br><br>
                      <p class="card-description">Choose Alphabates *</p>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="A"> A <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="C"> C <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="E"> E <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="G"> G <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="I"> I <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="K"> K <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="M"> M <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="O"> O <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="Q"> Q <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="S"> S <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="U"> U <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="W"> W <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="Y"> y <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="B"> B <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="D"> D <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="F"> F <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="H"> H <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="J"> J <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="L"> L <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="N"> N <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="P"> P <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="R"> R <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="T"> T <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="V"> V <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="X"> X <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="alphabet_group[]" value="Z"> Z <i class="input-helper"></i></label>
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


            <!-- update modat -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 180%; margin-left: -127px;">
                <div class="modal-header" style="background: gray;">
                    <h5 class="modal-title" id="exampleModalLabel">Update Series</h5>
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
                        <form action="series.php" method="post" id="modal-details">
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
                      <p class="card-description">Choose Alphabates *</p>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_A" class="form-check-input" name="alphabet_group[]" value="A"> A <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_C" class="form-check-input" name="alphabet_group[]" value="C"> C <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_E" class="form-check-input" name="alphabet_group[]" value="E"> E <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_G" class="form-check-input" name="alphabet_group[]" value="G"> G <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_I" class="form-check-input" name="alphabet_group[]" value="I"> I <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_K" class="form-check-input" name="alphabet_group[]" value="K"> K <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_M" class="form-check-input" name="alphabet_group[]" value="M"> M <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_O" class="form-check-input" name="alphabet_group[]" value="O"> O <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_Q" class="form-check-input" name="alphabet_group[]" value="Q"> Q <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_S" class="form-check-input" name="alphabet_group[]" value="S"> S <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_U" class="form-check-input" name="alphabet_group[]" value="U"> U <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_W" class="form-check-input" name="alphabet_group[]" value="W"> W <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_Y" class="form-check-input" name="alphabet_group[]" value="Y"> y <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_B" class="form-check-input" name="alphabet_group[]" value="B"> B <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_D" class="form-check-input" name="alphabet_group[]" value="D"> D <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_F" class="form-check-input" name="alphabet_group[]" value="F"> F <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_H" class="form-check-input" name="alphabet_group[]" value="H"> H <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_J" class="form-check-input" name="alphabet_group[]" value="J"> J <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_L" class="form-check-input" name="alphabet_group[]" value="L"> L <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_N" class="form-check-input" name="alphabet_group[]" value="N"> N <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_P" class="form-check-input" name="alphabet_group[]" value="P"> P <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_R" class="form-check-input" name="alphabet_group[]" value="R"> R <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary" >
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_T" class="form-check-input" name="alphabet_group[]" value="T"> T <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_V" class="form-check-input" name="alphabet_group[]" value="V"> V <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_X" class="form-check-input" name="alphabet_group[]" value="X"> X <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" id="seies_Z" class="form-check-input" name="alphabet_group[]" value="Z"> Z <i class="input-helper"></i></label>
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

            <!-- end of update modal -->


                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> Sr no. </th>
                            <th> Series Name </th>
                            <th> Alphabets </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql_select = "SELECT * FROM `series` WHERE `is_active` = 1 ";
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<tr class="table-secondary">
                                            <td> '.$i.' </td>
                                            <td> '.$row['name'].' </td>
                                            <td> '.$row['alphabets'].' </td>
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
  
  var alphabates = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
$.each(alphabates, function (i, val) {
        console.log('seies_'+val);
        $('#seies_'+val).attr('checked',false);
      });

  $.ajax({
    url: "fetch_series.php",
    method: "POST",
    data: {_id: id},
    dataType:"json",
    success:function(response) {
      var al = response.alphabets;
      var lists = al.split(',');
      $.each(lists, function (i, val) {
        console.log('seies_'+val);
        $('#seies_'+val).attr('checked',true);
      });
      $('#name').val(response.name);
      $('#u_id').val(response.id);
    }
  })
}
</script>