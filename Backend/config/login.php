<?php
session_start();

// Use __DIR__ to guarantee it finds database.php in the same folder safely
require_once __DIR__ . '/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Safely trim inputs
    $email    = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';
    $userType = trim($_POST["userType"] ?? ''); // Captured from your HTML select dropdown

    if (empty($email) || empty($password)) {
        echo "Please fill in all required fields.";
        exit();
    }

    try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Secure session generation
            session_regenerate_id(true);

            $_SESSION['user_id']   = $user['id'];
            $_SESSION['fullname']  = $user['fullname'] ?? '';
            $_SESSION['email']     = $user['email'];
            $_SESSION['role']      = $user['role'] ?? $userType;

            // Optional: Redirect based on user role if your database stores it
            if (isset($user['role']) && $user['role'] === 'organization') {
                // header("Location: ../organization/dashboard.php");
            } else {
                header("Location: ../../Frontend/dashboard.php");
            }
            exit();
        } else {
            echo "The email and/or password you entered doesn't exist.";
        }
    } catch (\PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>