<?php
require_once __DIR__ . '/database.php';

$email = 'calebdara618@gmail.com';
$plainPassword = '1234';

// Generate a valid, secure hash for "1234"
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

try {
    $sql = "UPDATE users SET password = :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'password' => $hashedPassword,
        'email' => $email
    ]);

    echo "Success! Password for <b>$email</b> has been updated to hash a password of <b>$plainPassword</b>.<br>";
    echo "<a href='../../frontend/login.php'>Go back to Login</a>";
} catch (\PDOException $e) {
    // Fixed: changed $e:getMessage() to $e->getMessage()
    echo "Error updating password: " . $e->getMessage();
}
?>