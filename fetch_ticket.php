<?php
session_start();
include 'conn.php';
if(!isset($_SESSION['USER_ROLE'])) {
    header("Location: login.php");
  }

    edit($_POST['_id'], $conn);
    function edit($id, $conn) {
        $ticket_sessions      = array();
        $ticket_prizes      = array();

        $sql_select = "SELECT * FROM `tickets` WHERE id = $id";
        $fetch = mysqli_query($conn, $sql_select);
        $row_tickets = mysqli_fetch_array($fetch, MYSQLI_ASSOC);

        $sql_ticket_session_names = "SELECT * FROM `ticket_session_names` WHERE ticket_id = $id";
        $fetch = mysqli_query($conn, $sql_ticket_session_names);

        $ticket_session_names = array();

        while($row = mysqli_fetch_assoc($fetch)) {
            $ticket_session_names[] = $row;
        }

        if($ticket_session_names) {
            foreach ( $ticket_session_names as $key => $object ){
                $ticket_sessions[$object['session_id']][] = array (
                    "id" => $object['id'],
                    "name" => $object['name']
                );
            }
        }

        $prizes = array();
        $sql_ticket_prizes = "SELECT * FROM `ticket_prizes` WHERE ticket_id = $id";
        $fetch_ticket_prizes = mysqli_query($conn, $sql_ticket_prizes);
        while($rowticket_prizes = mysqli_fetch_assoc($fetch_ticket_prizes)) {
            $prizes[] = $rowticket_prizes;
        }

        if($prizes) {
            foreach ( $prizes as $key => $object ){
                $ticket_prizes[$object['session_id']][] = $object;
            }
        }
        
        $ticket_data = array (
            "ticket" => $row_tickets,
            "ticket_session_names" => $ticket_sessions,
            "ticket_prizes" => $ticket_prizes
        );

        echo json_encode($ticket_data);
    }