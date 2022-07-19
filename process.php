<?php
session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(msqli_error($mysli));
$name = '';
$location = '';
$update = false;
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')");
    $_SESSION['message'] = 'Record Has Been Saved';
        $_SESSION['msg_type'] = 'success';
    header("Location: index.php");
};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM `data` WHERE Id=$id");
     $_SESSION['message'] = 'Record Has Been Deleted';
        $_SESSION['msg_type'] = 'danger';
   include("./index.php");

};

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = $mysqli->query("SELECT * FROM `data` WHERE id=$id");
    // echo $id;
    if($id == $id){
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $location = $n['location'];
    }else{
        echo "Wrong";
    };
};
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$location = $_POST['location'];

	$mysqli->query("UPDATE `data` SET name='$name', location='$location' WHERE id=$id");
    $_SESSION['message'] = "Record updated!"; 
    $_SESSION['msg_type'] = 'success';
	header('location: index.php');
}
    ?>
