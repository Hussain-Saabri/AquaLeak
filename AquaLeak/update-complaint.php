<?php
require 'connection.php';
session_start();


    if(isset($_POST['update']))
    {
        $complaintnumber = $_GET['id'];
        $status = $_POST['status'];

        $sql = mysqli_query($con, "update status set status='$status' where complaint_id='$complaintnumber'");

        echo "<script>alert('Complaint details updated successfully');</script>";
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <form name="updateticket" id="updatecomplaint" method="post"> 
            <div class="mb-4">
                <label for="complaint-number" class="block text-gray-700 font-bold">Complaint Number</label><br>
                <span class="text-gray-800 py-2 px-4 bg-gray-300 rounded-md"><?php echo htmlentities($_GET['id']); ?></span>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold">Status</label>
                <select name="status" required="required" class="form-select bg-gray-100 border border-gray-300 p-2 rounded-md w-full">
                    <option value="">Select Status</option>
                    <option value="in process">In Process</option>
                    <option value="Resolved">Resolved</option>
                    <option value="not processed yet">not processed yet</option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
                <a href="admin-data.php" name="Submit2" type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2">Close this window</a>
            </div>
        </form>
    </div>
</body>
</html>
