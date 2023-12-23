<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once './vendor/autoload.php';

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marcbrcx@gmail.com';
    $mail->Password = 'auud huwj fxdj hbec';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->Port = 587;

    // $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->SMTPAuth = false;
    // $mail->SMTPAutoTLS = false; 
    // $mail->Port = 25; 

    $mail->setFrom('marcbrcx@gmail.com', 'Your Hotel');
    $mail->addAddress('marcbrcx@gmail.com', 'Me');
    $mail->Subject = 'Thanks for choosing Our Hotel!';

    $mail->isHTML(TRUE);
    $mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
    $mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';

    // add attachment 
    // just add the '/path/to/file.pdf'
    // $attachmentPath = './confirmations/yourbooking.pdf';
    // if (file_exists($attachmentPath)) {
    //     $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
    // }

    if(!$mail->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
    $mail->smtpClose();

?>