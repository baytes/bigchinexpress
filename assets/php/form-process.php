<?php

$errorMSG = "";

// NAME
if (empty($_POST["first_name"])) {
    $errorMSG = "Name is required ";
} else {
    $first_name = $_POST["first_name"];
}
if (empty($_POST["last_name"])) {
    $errorMSG = "Name is required ";
} else {
    $last_name = $_POST["last_name"];
}

// ADDRESS
if (empty($_POST["address"])) {
    $errorMSG = "Address is required ";
} else {
    $address = $_POST["address"];
}
// PHONE
if (empty($_POST["phone"])) {
    $errorMSG = "phone is required ";
} else {
    $phone = $_POST["phone"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// RESTAURANT
if (empty($_POST["restaurant"])) {
    $errorMSG = "Restaurant is required ";
} else {
    $restaurant = $_POST["restaurant"];
}

// NUMBER OF ORDERS
if (empty($_POST["num_orders"])) {
    $errorMSG = "Number of orders is required ";
} else {
    $num_orders = $_POST["num_orders"];
}

// ORDER(s)
if (empty($_POST["order1"])) {
    $errorMSG = "At Least One Order is required ";
} else {
    $order1 = $_POST["order1"];
}
/*
if (empty($_POST["order2"])) {
    $errorMSG = "At Least One Order is required ";
} else {
    $order2 = $_POST["order2"];
}
if (empty($_POST["order3"])) {
    $errorMSG = "At Least One Order is required ";
} else {
    $order3 = $_POST["order3"];
}
*/

require '../mailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "bigchinexpress@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "4dnsFW3w";
$mail->setFrom('bigchinexpress@gmail.com', 'Big Chin Express Delivery');
//Set who the message is to be sent to
$mail->addAddress('bigchinexpress@gmail.com', 'Big Chin Express Delivery');
//Set the subject line
$mail->Subject = 'Big Chin Express Order';

//$EmailTo = "bigchinexpress@gmail.com";
//$Subject = "New Message Received";

// prepare email body text
$mail->Body = "";
$mail->Body .= "First Name:";
$mail->Body .= $first_name;
$mail->Body .= "\n";
$mail->Body .= "Last Name: ";
$mail->Body .= $last_name;
$mail->Body .= "\n";
$mail->Body .= "Address: ";
$mail->Body .= $address;
$mail->Body .= "\n";
$mail->Body .= "Phone: ";
$mail->Body .= $phone;
$mail->Body .= "\n";
$mail->Body .= "Email: ";
$mail->Body .= $email;
$mail->Body .= "\n";
$mail->Body .= "Restaurant: ";
$mail->Body .= $restaurant;
$mail->Body .= "\n";
$mail->Body .= "Order: ";
$mail->Body .= $order1;
$mail->Body .= "\n";

// send email
$success = $mail->send();
//echo "success";
echo '<script type="text/javascript">
           window.location = "http://www.bigchinexpress.com/orderSubmitted.html"
      </script>';
//$success = mail($EmailTo, $Subject, $Body, "From:".$email);
/*
// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
*/
?>