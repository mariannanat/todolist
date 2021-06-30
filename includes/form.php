<?php
//creo sessione per i messaggi save e delete
session_start();

//connsessione al db todolist + errore in caso di connessione fallita
$mysqli = new mysqli ('localhost', 'root', '', 'todolist') or die (mysqli_error(mysqli));

$id = 0;
$update = false;
$name = '';
$surname = '';
$day = '';
$activity = '';

//controllo il funzionamento del save button del form
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $day = $_POST['day'];
    $activity = $_POST['activity'];

    $mysqli->query("INSERT INTO todolist.todo (name, surname, day, activity) VALUES ('$name', '$surname', '$day', '$activity')")
    or die($mysqli->error);

    //messaggio session
    $_SESSION['message'] = "Data has been inserted 😎";
    $_SESSION['message_type'] = "success";
    //INVIA UNA REINDIRIZZAZIONE DOVE ABBIAMO INSERITO IL task
    header ('Location: https://localhost/DOT_ACADEMY/todo/index.php');
    exit;
}

//controllo delete button

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM todolist.todo WHERE ID='$id' ") or die($mysqli->error());
    
    $_SESSION['message'] = "Data has been deleted ☠";
    $_SESSION['message_type'] = "danger";

    header ('Location: https://localhost/DOT_ACADEMY/todo/index.php');
    exit;
}

 //controllo edit button
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM todolist.todo WHERE ID='$id' ") or die($mysqli->error());
    //if(count (empty($result)) > 0){
    
        $row = $result->fetch_assoc();
    
        $name = $row['name'];
        $surname = $row['surname'];
        $day = $row['day'];
        $activity = $row['activity'];

    
   // }//elseif ($row !== null && $row['name'] == $name && $row['surname'] == $surname && $row['day'] == $day) {
       // $update = true;
    //}
    }
//update

if(isset($_POST['update'])){
    //$update = true;
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $day = $_POST['day'];
    $activity = $_POST['activity'];

    $mysqli->query("UPDATE todolist.todo SET name='$name', surname='$surname', day='$day', activity='$activity' WHERE ID='$id'")
    or die($mysqli->error);

    $_SESSION['message'] = "Data has been updated!";
    $_SESSION['message_type'] = "warning";

    header ('Location: https://localhost/DOT_ACADEMY/todo/index.php');
    exit;
}
