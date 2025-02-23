<?php
require 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone = $_POST['contact_no'];

    // Insert the feedback into the user_feedback table
    $sql = "INSERT INTO contact (name, email,contact_no,message) VALUES ('$name', '$email','$phone','$message')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Thank You, For Contacting Us');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Get in Touch</h1>
        <form method="POST" action="" class="space-y-4">
            <div class="space-y-2">
                <label for="name" class="text-lg font-semibold text-gray-800">Name</label>
                <input type="text" id="name" name="name" class="w-full border rounded-md p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Your Name">
            </div>
            <div class="space-y-2">
                <label for="email" class="text-lg font-semibold text-gray-800">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded-md p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Your Email">
            </div>
            <div class="space-y-2">
                <label for="contact_no" class="text-lg font-semibold text-gray-800">Contact Number</label>
                <input type="tel" id="contact_no" name="contact_no" class="w-full border rounded-md p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Your Contact Number">
            </div>
            <div class="space-y-2">
                <label for="message" class="text-lg font-semibold text-gray-800">Message</label>
                <textarea id="message" name="message" class="w-full border rounded-md p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none" placeholder="Your Message" rows="4"></textarea>
            </div>
            <button name="submit" type="submit" class="w-full bg-purple-500 text-white rounded-md p-4 text-lg font-semibold hover:bg-purple-600 transition duration-300 transform hover:scale-105">Send Message</button>
        </form>
    </div>
</body>
</html>
