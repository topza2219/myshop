<?php
// Include database connection
include('./admin/config.php');

// Initialize variables
$username = $email  =$password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];   
    $password = $_POST['password'];
   
    $username = $_POST['username'];

    // Validate form inputs
    if(empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // Only proceed if there are no errors
    if (count($errors) == 0) {
        // Hash the password
       

        // Prepare SQL statement
        $sql = "INSERT INTO users (username, email, password, created_at) 
                VALUES ('$username', '$email', '$password', NOW())";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Display errors if there are any
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
