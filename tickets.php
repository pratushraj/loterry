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
      // var_dump($_POST['rowid']);
      
      if($_POST['num']) {
        $sql = "INSERT INTO `tickets` (`name`) VALUES ('".$_POST['num']."');";
        $result = mysqli_query($conn, $sql);
        $id= mysqli_insert_id($conn);

        if($id) {
          $alldays     = [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ];
          $allprize   = [ 1, 2, 3, 4, 5, 6, 7, 8 ];
          foreach ( $_POST['day'] as $index => $ticket_days ){
            $ticket_session_names_data = [];
            $ticket_prize_data         = [];
            
                  if( count( $ticket_days ) > 0 ){
                      $ticket_session_names_data['ticket_id'] = $id;
                      $ticket_session_names_data['session_id']  = $index;
                      $ticket_prize_data['ticket_id']  = $id;
                      $ticket_prize_data['session_id'] = $index;
              
                foreach ( $ticket_days as $idx => $days_session_name ){
                  if((!empty($days_session_name))){
                    $ticket_session_names_data['day'] = $alldays[$idx];
                    $ticket_session_names_data['name']  = $days_session_name;
                    // TicketSessionNames::create($ticket_session_names_data);
                    var_dump($ticket_session_names_data);
                    $sql_store = "INSERT INTO `ticket_session_names` (`ticket_id`, `session_id`, `day`, `name`) VALUES (".$ticket_session_names_data['ticket_id'].", '".$ticket_session_names_data['session_id']."', '".$ticket_session_names_data['day']."', '".$ticket_session_names_data['name']."');";
                    $result = mysqli_query($conn, $sql_store);
                  }
                }
              
              foreach($_POST['prizes'][$index] as $k=>$v) {
                if((!empty($_POST['prizes'][$index][$k])) && (!empty($_POST['special_prizes'][$index][$k])) && (!empty($_POST['super_prizes'][$index][$k]))){
                  $ticket_prize_data['amount']     = $_POST['prizes'][$index][$k];
                  $ticket_prize_data['special_amount']     = $_POST['special_prizes'][$index][$k];
                  $ticket_prize_data['super_amount']     = $_POST['super_prizes'][$index][$k];
                  $ticket_prize_data['prize_id']     = $k;
                  var_dump($ticket_prize_data);
                  $sql_store_prize = "INSERT INTO `ticket_prizes` (`ticket_id`, `session_id`, `prize_id`, `amount`, `special_amount`, `super_amount`) VALUES (".$ticket_prize_data['ticket_id'].", '".$ticket_prize_data['session_id']."', '".$ticket_prize_data['prize_id']."', '".$ticket_prize_data['amount']."', '".$ticket_prize_data['special_amount']."', '".$ticket_prize_data['super_amount']."');";
                  $result = mysqli_query($conn, $sql_store_prize);
                }
              }
              
                
                  }
              }

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
        } else {
          echo '<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Opps Sorry!</strong> Please Enter the name and Please try again.
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

                        $fetch_s = mysqli_query($conn, $sql_select);
                        $row = mysqli_fetch_array($fetch_s);
                        if($fetch_s) {
                          if (mysqli_num_rows($fetch_s) > 0) {
                            $link = '';
                            $tab = '';
                            while($row = mysqli_fetch_assoc($fetch_s)) {
                              var_dump($row);
                              $link .= '<a class="btn btn-success" href="#session_'.$row['id'].'" onclick="showStuff(this, '.$row['id'].')">'.$row['name'].'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                              $tab .= ' <div class="tabContent" id="session_'.$row['id'].'" style="display: none;">

                              <div class="row" >
                                <div class="col-md-6">
                                <input type="hidden" id="u_id" class="form-control" name="rowid[]" value="'.$row['id'].'"/>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sun </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][0]"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mon</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][1]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tue</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][2]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Wed</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][3]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Thu</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][4]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fri</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][5]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sat</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][6]" />
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
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][2]"  placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="special_prizes['.$row['id'].'][2]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="super_prizes['.$row['id'].'][2]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][7]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][7]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][7]" placeholder="Enter" />
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


                        <!-- Update modal -->
                                      <!-- Modal -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              $link .= '<a class="btn btn-success" href="#session_update'.$row['id'].'" onclick="showStuff_update(this, '.$row['id'].')">'.$row['name'].'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                              $tab .= ' <div class="tabContent_update" id="session_update'.$row['id'].'" style="display: none;">

                              <div class="row" >
                                <div class="col-md-6">
                                <input type="hidden" id="u_id" class="form-control" name="rowid[]" value="'.$row['id'].'"/>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sun </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][0]"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mon</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][1]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tue</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][2]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Wed</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][3]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Thu</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][4]" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fri</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][5]" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sat</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" placeholder="Enter" name="day['.$row['id'].'][6]" />
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
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 1</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][0]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 2</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][1]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][2]"  placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="special_prizes['.$row['id'].'][2]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 3</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control"  name="super_prizes['.$row['id'].'][2]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 4</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][3]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 5</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][4]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 6</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][5]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 7</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][6]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                              </div>
        
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="prizes['.$row['id'].'][7]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Special Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="special_prizes['.$row['id'].'][7]" placeholder="Enter" />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" style="width: 50%;">Super Prize 8</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="super_prizes['.$row['id'].'][7]" placeholder="Enter" />
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



                        <!-- End of update modal -->





                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> Sr no. </th>
                            <th> Name </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql_select = "SELECT * FROM `tickets` WHERE `is_active` = 1 ";
                          $fetch = mysqli_query($conn, $sql_select);
                          if($fetch) {
                            if (mysqli_num_rows($fetch) > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($fetch)) {
                                echo '<tr class="table-secondary">
                                            <td> '.$i.' </td>
                                            <td> '.$row['name'].' </td>
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
var tabContents = document.getElementsByClassName('tabContent');
tabContents['0'].style.display = 'block';

var tabContent_update = document.getElementsByClassName('tabContent_update');
tabContent_update['0'].style.display = 'block';

var id;
function showStuff(element, id)  {
  var tabContents = document.getElementsByClassName('tabContent');
  for (var i = 0; i < tabContents.length; i++) { 
      tabContents[i].style.display = 'none';
  }
  document.getElementById("session_"+id).style.display = "block"; 
}


function showStuff_update(element, id)  {
  var tabContent_update = document.getElementsByClassName('tabContent_update');
  for (var i = 0; i < tabContent_update.length; i++) { 
    tabContent_update[i].style.display = 'none';
  }
  document.getElementById("session_update"+id).style.display = "block"; 
}


function update(id) {
  $.ajax({
    url: "fetch_ticket.php",
    method: "POST",
    data: {_id: id},
    dataType:"json",
    success:function(data) {
      $("#update input[name='name']").val(data['ticket']['name']);
                    $("#update input[name='unique_id']").val(id);
                    for (var session in data['ticket_session_names']) {
						
                        for( var i = 0; i < data['ticket_session_names'][session].length; i++ ){
                            $("#update input[name='day["+session+"]["+i+"]']").val(data['ticket_session_names'][session][i]['name']);
                        }

						for( var j = 0; j < data['ticket_prizes'][session].length; j++ ){
							var ticket_prizes = data['ticket_prizes'][session][j];
							$("#update input[name='prizes["+session+"]["+j+"]']").val(ticket_prizes.amount);
							$("#update input[name='special_prizes["+session+"]["+j+"]']").val(ticket_prizes.special_amount);
							$("#update input[name='super_prizes["+session+"]["+j+"]']").val(ticket_prizes.super_amount);
						}
                    }
    }
  })
}


</script>
