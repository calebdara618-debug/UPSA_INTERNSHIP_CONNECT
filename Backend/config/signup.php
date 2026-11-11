<?php
session_start();

require_once __DIR__ . '/database.php';

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request method.");
}

// Receive form data
$userType        = trim($_POST['userType'] ?? '');
$fullname        = trim($_POST['fullname'] ?? '');
$email           = trim($_POST['email'] ?? '');
$phone           = trim($_POST['phone'] ?? '');
$password        = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$terms           = $_POST['terms'] ?? '';

// 1. Check required fields
if ($userType === '' || $fullname === '' || $email === '' || $phone === '' || $password === '' || $confirmPassword === '') {
    exit("Please fill in all required fields.");
}

// 2. Validate account type
if (!in_array($userType, ['student', 'organization'], true)) {
    exit("Invalid account type.");
}

// 3. Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Please enter a valid email address.");
}

// 4. Validate password length
if (strlen($password) < 8) {
    exit("Password must contain at least 8 characters.");
}

// 5. Confirm passwords
if ($password !== $confirmPassword) {
    exit("Passwords do not match.");
}

// 6. Check terms and conditions
if ($terms !== 'on') {
    exit("Please accept the Terms and Conditions.");
}

try {
    // 7. Check whether email already exists
    $checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $checkEmail->execute(['email' => $email]);

    if ($checkEmail->fetch(PDO::FETCH_ASSOC)) {
        exit("This email address is already registered.");
    }

    // 8. Securely hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 9. Insert user into PostgreSQL database
    $sql = "INSERT INTO users (fullname, email, phone, password, role) 
            VALUES (:fullname, :email, :phone, :password, :role) 
            RETURNING id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'fullname' => $fullname,
        'email'    => $email,
        'phone'    => $phone,
        'password' => $hashedPassword,
        'role'     => $userType
    ]);

    // 10. Get newly created user ID
    $userId = $stmt->fetchColumn();

    // 11. Create user session
    session_regenerate_id(true);

    $_SESSION['user_id']  = $userId;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['email']    = $email;
    $_SESSION['role']     = $userType;

    // 12. Native PHP Redirect based on account type
    if ($userType === 'student') {
        header("Location: ../../Frontend/dashboard.php");
    } else {
        header("Location: ../../Frontend/dashboard.php");
    }
    exit();

} catch (PDOException $e) {
    error_log("Signup Error: " . $e->getMessage());
    exit("Registration failed. Please try again.");
}
?>