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
      var_dump($_POST['rowid']);
      
      // $sql = "INSERT INTO `tickets` (`name`) VALUES ('".$_POST['num']."');";
      // $result = mysqli_query($conn, $sql);
      // $id= mysqli_insert_id($conn);
      // var_dump($id);exit;
      // foreach($_POST['rowid'] as $key => $values) {
      //  echo $key;
      // }
      // if($id) {

        foreach($_POST['rowid'] as $key => $values) {
          echo $key;
         var_dump($_POST['sun'][$key]);
          // $sql = "INSERT INTO `ticket_session_names` (`ticket_id`, `session_id`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`) 
          // VALUES (".$id.",".$_POST['rowid'][$key].", '".$_POST['sun'][$key]."', '".$_POST['mon'][$key]."', '".$_POST['tue']['$key']."', 1);";
        }

        
        // $sql = "INSERT INTO `ticket_session_names` (`ticket_id`, `session_id`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`) 
        // VALUES (".$id.",".$_POST['rowid'].", '".$_POST['sun']."', '".$_POST['col']."', '".$_POST['pric']."', 1);";

        // $result = mysqli_query($conn, $sql);
      // }

        $sql = "INSERT INTO `sessions` (`name`, `color`, `price`, `is_active`) 
        VALUES ('".$_POST['nam']."', '".$_POST['col']."', '".$_POST['pric']."', 1);";

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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        + Add Distributor
        </button>
        <br><br>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <div class="form-group row">
                          <form action="tickets.php" method="post" id="modal-details">
                            <label class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="Enter Your Name" name="num"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                        $sql_select = "SELECT * FROM `sessions` WHERE is_active = 1";

                        $fetch = mysqli_query($conn, $sql_select);
                        $row = mysqli_fetch_array($fetch);
                        if($fetch) {
                          if (mysqli_num_rows($fetch) > 0) {
                            $link = '';
                            $tab = '';
                            while($row = mysqli_fetch_assoc($fetch)) {
                              $link .= '<a class="btn btn-success" href="#session_'.$row['id'].'" onclick="showStuff(this, '.$row['id'].')">'.$row['name'].'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                              $tab .= ' <div class="tabContent" id="session_'.$row['id'].'" style="display: none;">

                              <div class="row" >
                                <div class="col-md-6">
                                <input type="hidden" id="u_id" class="form-control" name="rowid[]" value="'.$row['id'].'"/>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sun </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="sun[]"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mon</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="mon[]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tue</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="tue[]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Wed</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="wed[]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Thu</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="thu[]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fri</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="fri[]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sat</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="sat[]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                               <u><p class="card-description"><h4> Prizes</h4></p></u>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </div>';
                            }
                          }
                        }


                        print $link.'<br><br>';
                        print $tab;

                      ?>
                      
                      <!-- <a class="btn btn-success" href="">MON</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a class="btn btn-success" href="#day">DAY</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a class="btn btn-success" href="">EVE</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -->
                      <br><br>
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
                          <tr class="table-secondary">
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-table-edit"></i>
                            </button>
                            <button type="button" class="btn btn-success">
                            <i class="mdi mdi-delete-forever"></i> 
                            </button>
                            </td>
                          </tr>
                          <tr class="table-light">
                            <td> 2 </td>
                            <td> Messsy Adam </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> <i class="mdi mdi-table-edit"></i>
                            <i class="mdi mdi-delete-forever"></i> </td>
                          </tr>
                          <tr class="table-secondary">
                            <td> 3 </td>
                            <td> John Richards </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> <i class="mdi mdi-table-edit"></i><i class="mdi mdi-delete-forever"></i> </td>
                          </tr>
                          <tr class="table-light">
                            <td> 4 </td>
                            <td> Peter Meggik </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> <i class="mdi mdi-table-edit"></i><i class="mdi mdi-delete-forever"></i> </td>
                          </tr>
                          <tr class="table-secondary">
                            <td> 5 </td>
                            <td> Edward </td>
                            <td> Herman Beck </td>
                            <td> Herman Beck </td>
                            <td> <i class="mdi mdi-table-edit"></i><i class="mdi mdi-delete-forever"></i> </td>
                          </tr>
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
var tabContents = document.getElementsByClassName('tabContent');
tabContents['0'].style.display = 'block';
var id;
function showStuff(element, id)  {
  var tabContents = document.getElementsByClassName('tabContent');
  for (var i = 0; i < tabContents.length; i++) { 
      tabContents[i].style.display = 'none';
  }

  // change tabsX into tabs-X in order to find the correct tab content
  // var tabContentIdToShow = element.id.replace(/(\d)/g, '-$1');
  // document.getElementById(tabContentIdToShow).style.display = 'block';

  document.getElementById("session_"+id).style.display = "block"; 
}

</script>
