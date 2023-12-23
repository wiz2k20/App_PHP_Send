<?php

include 'db1.php';

$control = $_GET['control'];
//$pswdel = $_POST['okpsw'];

$sql1 = "DELETE FROM app_send_control WHERE control = $control";
//echo "id: " . $id . "<br><br>";
if ($cone->query($sql1) === TRUE) {
    //echo "<font color='green'>[ Record deleted successfully ]</font>" . "<br><br>";    
    $cone->close();
    header('Location: send.php');
    exit;
} else {
    echo "<font color='red'>[ Error: " . $sql1 . " ]</font><br><br>" . $cone->error;
}


//$cone->close();

?>