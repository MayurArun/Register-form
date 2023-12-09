<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
    <?php
    // Assuming you have a database connection
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "register_db";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to sanitize user input
    function sanitizeInput($input)
    {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    }

    // Function to validate email and password
    function validateUser($email, $password)
    {
        global $conn;

        // Sanitize input
        $email = sanitizeInput($email);
        $password = sanitizeInput($password);

        // Check if the user exists in the database
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            return true; // User is valid
        } else {
            return false; // Invalid user
        }
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate user credentials
        if (validateUser($email, $password)) {
            // Successful login, you can redirect to another page or perform further actions
            echo "<script>alert('Login successful!');</script>";
        } else {
            echo "<script>alert('Invalid email or password.');</script>";
        }
    }
    ?>

    <div class="main-container">
        <div class="form-container">
            <div class="title-text">Login Page</div>

            <!-- Login Form -->
            <form method="post" action="">
                <!-- Enter Email -->
                <div class="input-container">                    
                        <input type="email" name="email" placeholder="Enter Email" required />                    
                </div>

                <!-- Enter Password -->
                <div class="input-container">                    
                        <input type="password" name="password" placeholder="Enter Password" required />                    
                </div>

                <!-- LOG IN Button -->
                <div class="login-button">
                    <button type="submit" class="login-button-text">LOG IN</button>
                </div>
            </form>

            <div class="divider"></div>

            <div class="register-text">Don't have an account? Register</div>
            <div class="register-link" onclick="redirectToRegistration()">HERE</div>
        </div>
    </div>

    <script>
    function redirectToRegistration() {
        // Add logic to redirect to the registration page
        window.location.href = 'registration_page.php'; 
    }
</script>
</body>
</html>
