<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $budget = htmlspecialchars(trim($_POST['budget']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email details
    $to = "support@zestifydigital.com.au"; // Replace with your email
    $email_subject = "New Inquiry from $name: $subject";
    $email_body = "You have received a new inquiry.\n\n".
                  "Here are the details:\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Budget: $budget\n".
                  "Message:\n$message";

    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
