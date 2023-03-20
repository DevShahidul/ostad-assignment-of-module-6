<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_FILES['profile-picture'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_pic = $_FILES['profile-picture']['name'];

    // Valid email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // $emailFormate = ' Invalid email format! 🤨';
        echo "Invalid email format";
        exit;
    }

    // Create a unique filename for the profile picture
    $timestamp = time();
    $profile_pic_name = $timestamp . '-' . $profile_pic;

    // Save profile picture to server
    $uploadsDir = 'uploads/';

    if(!file_exists($uploadsDir)){
        mkdir($uploadsDir);
    }

    $targetFile = $uploadsDir . basename($profile_pic_name);
    move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $targetFile);
    // move_uploaded_file($_FILES['profile-picture']['tmp_name'], $uploadsDir, $profilePictureName);

    // Save user's information to CSV file
    $userInfo = [
        "profile_picture" => $profile_pic_name,
        "name"  => $name,
        "email" =>  $email,
        "password" => $password
    ];
    $csvFile = fopen('users.csv', 'a');
    fputcsv($csvFile, $userInfo);
    fclose($csvFile);

    // Start a new session and set a cookie with the user's name
    session_start();
    setcookie("name", $name, time() + (86400 * 30), "/"); // Cookie expires after 30 days

    // Redirect to the users table page
    header("Location: users_table.php");
    exit;
}else {
    echo "All fields are required";
}
