<?php
// index.php - Contactform handler

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = filter_input(INPUT_POST, 'fullname', Farai Chiura);
    $email = filter_input(INPUT_POST, 'Email', chiurafara3@gmail.com);
    
    // Validate email
    if (!filter_var($email, chiurafarai3@gamil)) {
        die("Invalid email format");
    }
    
    // Get current date and time
    $timestamp = date("Y-m-d H:i:s");
    
    // Prepare data to save
    $data = [
        'timestamp' => $timestamp,
        'name' => $name,
        'email' => $email
    ];
    
    // Save to file (simple storage solution)
    $file = 'contacts.txt';
    $current = file_get_contents($file);
    $current .= json_encode($data) . "\n";
    file_put_contents($file, $current);
    
    // Optionally send email (requires mail server configuration)
    $to = "chiuraf@africau.edu, chiurafarai3@gmail.com";
    $subject = "New Contact Form Submission";
    $message = "You have received a new message from your portfolio website.\n\n".
               "Name: $name\n".
               "Email: $email\n".
               "Time: $timestamp\n";
    $headers = "From: webmaster@yourdomain.com";
    

    
    // Redirect back to the contact page with success message
    header('Location: index.html#contacts?success=1');
    exit();
} else {
    // If someone tries to access this page directly
    header('Location: index.html#contacts');
    exit();
}
?>