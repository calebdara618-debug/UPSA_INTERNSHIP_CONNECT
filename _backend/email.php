<?php

// 1. Require Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

try {
    // 2. Initialize the Resend client with your API key
    // Replace 're_123456789' with your actual Resend API key
    $resend = Resend::client('');

    // 3. Send the email
    $result = $resend->emails->send([
        'from'    => 'onboarding@resend.dev', // Use your verified domain in production
        'to'      => ['delivered@resend.dev'], // Replace with the recipient email address
        'subject' => 'Hello from Resend and PHP!',
        'html'    => '<p>It works! This email was sent using the Resend PHP SDK in a single file.</p>',
    ]);

    // 4. Output success response
    echo "Email sent successfully! ID: " . $result->id;

} catch (\Exception $e) {
    echo "Error sending email: " . $e->getMessage();
}