<?php
require_once 'Mail.php';


$fname = $_POST['firstnamelastname'];
$rsvp = $_POST['optradio'];
$visitor_email = $_POST['emailaddress'];
$location = $_POST['streetaddress'];
$phnumber = $_POST['phonenumber'];
$hotel = $_POST['optradiob'];
$headers = array(
    'From' => '<kwakuandoprahawedding@gmail.com>',
    'To' => '<opraha.a.miles@gmail.com>',
    'Subject' => 'Wedding RSVP Confirmation'
);

$email_body = "You have received a new message from $fname. \n" .
			  "Name: $fname\n" .
              "RSVP?: $rsvp"
			  "Email: $visitor_email\n" .
			  "Address: $location\n" .
			  "Phone Number: $phnumber\n" .
			  "Hotel?:\n $hotel";

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'kwakuandoprahawedding@gmail.com',
        'password' => 'wedding2016'
));
$mail = $smtp->send($visitor_email,$headers,$email_body);
#Done. Redirect to thank you page
header('Location: thank-you.html');
exit();
?>