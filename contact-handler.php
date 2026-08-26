<?php
// Pavilion website enquiry handler.
// Set this to a real Pavilion mailbox before using the form publicly.
$recipient = "REPLACE_WITH_PAVILION_EMAIL";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed.");
}

function clean($value) {
    return trim(str_replace(["\r", "\n"], " ", $value ?? ""));
}

$name = clean($_POST["name"] ?? "");
$company = clean($_POST["company"] ?? "");
$email = filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL);
$phone = clean($_POST["phone"] ?? "");
$service = clean($_POST["service"] ?? "");
$message = trim($_POST["message"] ?? "");

if (!$name || !$email || !$message) {
    http_response_code(400);
    exit("Please complete your name, email address and message.");
}

if ($recipient === "hello@pspt.ltd") {
    http_response_code(503);
    exit("The enquiry form is not yet connected to a Pavilion mailbox.");
}

$subject = "Pavilion website enquiry - " . $service;
$body = "Name: $name\nCompany: $company\nEmail: $email\nTelephone: $phone\nArea of interest: $service\n\nMessage:\n$message\n";
$headers = "From: website@pspt.ltd\r\nReply-To: " . $email . "\r\n";

if (mail($recipient, $subject, $body, $headers)) {
    header("Location: thank-you.html");
    exit;
}

http_response_code(500);
echo "Your enquiry could not be sent. Please contact Pavilion directly.";
?>