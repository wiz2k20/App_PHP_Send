<?php declare(strict_types=1);
include 'db1.php';

$varMensagemSucesso = "Registry added";
$varMensagemErro = "An error occurred when submitting your registry";

function insertRegistry(string $varDate, string $varTime, string $varAbout, string $varComments) {
  $stmt = $GLOBALS['conn']->prepare("INSERT INTO app_send_control (date, time, about, comment) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $varDate, $varTime, $varAbout, $varComments);
  $stmt->execute();
  $varAffectedRows = $stmt->affected_rows;
  return $varAffectedRows;
  //return "testando aki";
}


    // $sql = "INSERT INTO app_send_control (date, time, about, comment) VALUES ('$varDate', '$varTime', '$varAbout', '$varComments')";
    // if (!mysqli_query($conn, $sql)) {
    //     $return_arr['dbresutl'] = $varMensagemErro;
    // } else {
    //     $return_arr['dbresult'] = $varMensagemSucesso;
    // }

    //https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    //https://www.w3schools.com/php/php_mysql_prepared_statements.asp
    // i - integer
    // d - double
    // s - string
    // b - BLOB

    // $resultInsert = mysqli_query ($cone, $sql);
    // echo $resultInsert;
    // if ($cone->query($sql) === TRUE) {
    //   echo "<textoverde>[ New record created successfully ]</textoverde>" . "<br><br>";
    // } else {
    //   echo "<font color='red'>[ Error: " . $sql . " ]</font><br><br>" . $cone->error;
    // }
?>