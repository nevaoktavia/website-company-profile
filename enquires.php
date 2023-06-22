<? include("inc_header.php") ?>
<? include("inc_footer.php") ?>

<?php
// Mengirim email
function sendEmail($to, $subject, $message)
{
    // Mengatur header email
    $headers = "From: coolyeahh13@gmail.com" . "\r\n" .
        "Reply-To: coolyeahh13@gmail.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Mengirim email
    return mail($to, $subject, $message, $headers);
}

// Mengambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Mengirim enquires
$enquirySubject = "New Enquiry";
$enquiryMessage = "Name: " . $name . "\n" .
    "Email: " . $email . "\n" .
    "Message: " . $message;

// Ganti "coolyeahh13@gmail.com" dengan alamat email tujuan
sendEmail("coolyeahh13@gmail.com", $enquirySubject, $enquiryMessage);

// Mengirim order
$orderSubject = "New Order";
$orderMessage = "Name: " . $name . "\n" .
    "Email: " . $email . "\n" .
    "Message: " . $message;

// Ganti "coolyeahh13@gmail.com" dengan alamat email tujuan
sendEmail("coolyeahh13@gmail.com", $orderSubject, $orderMessage);

// Redirect ke halaman "success" setelah pengiriman formulir
header("Location: success.php");
exit();
?>