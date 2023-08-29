<?php
require_once 'config.php';

if($_POST) {

    $full_name = $_POST['full-name'];
    $visitor_email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comment'];

    if(isset($_POST['emailTo'])) {
        $emailTo = $_POST['emailTo'];
        $nameTo = $_POST['nameTo'];
    } else {
        $emailTo = "info@beaconcresthomes.com";
        // $emailTo = "dhuetinck@beaconcresthomes.com";
        // $emailTo = "anarmandakh@gkaadvertising.com";
        $nameTo = "Beacon Crest Homes";
    }

    // $subjectName = $full_name;
    $subjectName = 'webform1355';

    $html = " You received an inquiry from:<br>Name: " . $full_name . ".<br>Email: " . $visitor_email . ".<br>Phone: " . $phone . "<br><br><br>Message: <br>" . $comments . ".";

    try {
        // prepare email message
        $message = Swift_Message::newInstance()
            ->setSubject($subjectName)
            ->setFrom(['no-reply@beaconcresthomes.com' => $full_name])
            ->setTo([$emailTo => $nameTo])
            ->setBody($html, 'text/html');

        // create the transport
        $transport = Swift_SmtpTransport::newInstance($smtp_server, 465, 'ssl')
            ->setUsername($username)
            ->setPassword($password);
        $mailer = Swift_Mailer::newInstance($transport);
        $result = $mailer->send($message);

        if ($result) {
            echo "Thank you for contacting us";
        } else {
            echo "Couldn't send email Please Try again";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

?> 