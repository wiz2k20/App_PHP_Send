<?php
// https://makitweb.com/return-json-response-ajax-using-jquery-php/
include 'functions/crud.php';

// MENSAGEM DE DEBUG NO CONSOLE
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    //debug_to_console("BEGIN");
}
  

$return_arr = array();
$varAbout = strtoupper($_POST['about']);
$varComments = strtoupper($_POST['comments']);
$return_arr['about'] = $varAbout;
$return_arr['comments'] = $varComments;

// if (empty($_POST["job"])) {
// echo "<textoverde>[ Checkbox unchecked ]</textoverde><br><br>";
// } else {
// echo "<textoverde>[ Checkbox CHECKED ]</textoverde><br><br>";
// $checkcc = 'suporte04@windel.com.br';
// }

date_default_timezone_set("America/Sao_Paulo");
//$date1 = date("d/m/Y");
$varDate = date("Y/m/d");
$varTime = date("H:i:s");
$varWeek = date("l");
$varMensagemData = "Date: " . $varDate . " ( " . $varTime . " ) - " . $varWeek ;
$return_arr['fulldate'] = $varMensagemData;
/* echo "Week: " . $week1 . "<br>"; */
/* echo "Time: " . $time1 . "<br><br>"; */
//echo "Date: " . date("d/m/Y") . " (" . date("l") . ")" . "<br><br>";
//echo "Time: " . date("H:i:s");

$return_arr['dbresult'] = insertRegistry($varDate, $varTime, $varAbout, $varComments);
echo json_encode($return_arr);


// = = = = = MAIL FUNCTION = = = = =
// $msg1 = "First line of text\nSecond line of text";
// use wordwrap() if lines are longer than 70 characters
// $msg1 = wordwrap($msg1,70);


//include 'form_send_email.php';


// $to1 = 'marcbrcx@gmail.com';
// $about1 = '_ ' . $about;

// $head1 = [
//     'MIME-Version: 1.0',
//     'Content-Type: text/html; charset=ISO-8859-1',
//     'From: DATA ark1 <data@ark1.work>',
//     //'Cc: playstreet2019@gmail.com'
//     'Cc: ' . $checkcc . ''
// ];
// $head1 = implode("\r\n", $head1);

// $msg1 = "<html><body>";
// $msg1 .= "<br><br>";
// $msg1 .= "<p style='font-size:20px'>about:</p>";
// $msg1 .= "<p style='font-size:20px'><font color='green'>" . $about1 . "</font></p>";
// $msg1 .= "<br>";
// $msg1 .= "<p style='font-size:20px'>text:</p>";
// $msg1 .= "<p style='font-size:20px'><font color='blue'>" . $comments . "</font></p>";
// $msg1 .= "<br><br>";
// $msg1 .= "</body></html>";

// if (mail($to1, $about1, $msg1, $head1)) {
//     echo "<textoverde>[ Your mail has been sent successfully ]</textoverde><br><br>";
// } else {
//     echo "<font color='red'>[ Unable to send email. Please try again ]</font><br><br>";
// }
// mail(to, subject, message, headers, parameters)

?>