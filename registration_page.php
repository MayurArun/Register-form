<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <div class="title-text">Register Page</div>

            <!-- Registration Form -->
            <form method="post" action="">

                <!-- Enter Name -->
                <div class="input-container">                    
                    <input type="text" name="user" placeholder="Enter name" required />                    
                </div>

                <!-- Enter Email -->
                <div class="input-container">                    
                    <input type="email" name="email" placeholder="Enter email" required />                    
                </div>

                <!-- Enter Password -->
                <div class="input-container">                    
                    <input type="password" name="password" placeholder="Enter password" required />                    
                </div>

                <!-- Enter Address -->
                <div class="input-container">                    
                    <input type="text" name="address" placeholder="Enter address" required />                    
                </div>

                <!-- Enter Phone No. -->
                <div class="input-container">                    
                    <input type="tel" name="phone" placeholder="Enter phone number" required />                    
                </div>

                <!-- REGISTER Button -->
                <div>
                    <button type="submit">REGISTER</button>
                </div>
            </form>

            <div class="divider"></div>

            <div class="register-text">Already have an account? LogIn</div>
            <div class="register-link" onclick="redirectToLogin()">HERE</div>
        </div>
    </div>

    <script>
        function redirectToLogin() {
            // Add logic to redirect to the login page
            window.location.href = 'login.php'; 
        }
    </script>
</body>
</html>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "register_db";

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

          
    // Validate and sanitize user inputs
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Hash the password
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !strpos($email, "@gmail.com")) {
        echo "<script>alert('Invalid email format. Please enter a valid Gmail address.');</script>";
        exit;
    }
    
    // Validate phone number format
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "<script>alert('Invalid phone number format. Please enter a 10-digit number.');</script>";
        exit;
    }
    
    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered. Please enter another email.');</script>";
    } else {
        // Prepare and bind the statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (name, email, password, address, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $user, $email, $password, $address, $phone);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
            
            
        } else {
            echo "Error: " . $stmt->error;
        }
    
        // Close the statement
        $stmt->close();
    }
}
?>