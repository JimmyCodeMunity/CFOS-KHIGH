<?php
@include('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the PHPMailer library

// Function to generate a 4-digit random code
function generateRandomCode() {
    return mt_rand(1000, 9999);
}

session_start();

if (isset($_SESSION['useremail'])) {
    $sender_email = $_SESSION['email'];
} else {
    // Redirect or handle the situation where user email is not available
    header('location:logout.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if email is provided
    if (isset($_POST['email'])) {
        $recipient_email = $_POST['email'];
        $subject = 'Verify User';

        // Generate random code
        $random_code = generateRandomCode();

        // Save sender email to session
        

        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'dev.jimin02@gmail.com'; //username here
            $mail->Password = 'bmskagzffskviwmo'; //app password here/email password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Recipient
            $mail->setFrom('dev.jimin02@gmail.com', 'CFOS');
            $mail->addAddress($recipient_email);

            // Content
            $mail->isHTML(true); // Set to true to send HTML content
            $mail->Subject = 'Mail Test';

            // HTML email template
            $emailTemplate = '<html> 
                                <body>
                                    <p>Hello User,</p>
                                    <p>This is a test email. Your verification code is: '.$random_code.'</p>
                                </body>
                            </html>';

            $mail->msgHTML($emailTemplate);

            // Send email
            if ($mail->send()) {
                // Redirect to success page
                header('location: successmail.php');
                $sender_email = $_SESSION['email'];
                // Save sender email and code to database
                // Replace with your database connection and query
                
                // Example MySQL query
                
                $sql = "INSERT INTO loanapplications (email, code) VALUES ('$sender_email', '$random_code')";
                mysqli_query($conn,$sql);
            } else {
                throw new Exception('Message could not be sent.');
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        // Redirect to the form if email is not provided
        header("Location: send.php");
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: send.php");
}
?>
