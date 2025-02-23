<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Data</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="p-5">
    <h1 class="text-3xl text-center font-bold">Your Complaint History</h1>
    <br>
    <div class="container mx-auto"> <!-- Center the container and set the maximum width -->
        <div class="overflow-x-auto">
            <table class="table-auto rounded-lg w-full overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4 bg-red-500">Complaint_Number</th>
                        <th class="py-2 px-4 bg-green-500">Details</th>
                        <th class="py-2 px-4 bg-yellow-500">Phone</th>
                        <th class="py-2 px-4 bg-purple-500">Location</th>
                        <th class="py-2 px-4 bg-green-500">Photo</th>
                        <th class="py-2 px-32 bg-pink-500">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    require 'connection.php';

                    // Check if the user is logged in
                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                        $reportQuery = "SELECT report.*, status.status FROM report 
                        LEFT JOIN status ON report.id = status.complaint_id
                        WHERE report.email = '$email'";

                        $reportData = mysqli_query($con, $reportQuery);
                        $i=1;
                        while ($row = mysqli_fetch_assoc($reportData)) {
                            echo "<tr class='" . ($i % 2 == 0 ? "bg-blue-100" : "bg-blue-200") . "'>";
                            echo "<td class='text-center py-2 px-4 font-bold'>" . $row['id'] . "</td>";
                            echo "<td class='text-center py-2 px-4'>" . $row['details'] . "</td>";
                            echo "<td class='text-center py-2 px-4'>" . $row['phone'] . "</td>";
                            echo "<td class='text-center py-2 px-4' style='width:50px;height:50px;'><a href='https://www.google.com/maps?q=$row[location]' target='_blank'><i class='fas fa-map-marker-alt text-green-500 text-lg'></i></a></td>";
                            echo "<td class='text-center'><a href='" . $row['photo'] . "' target='_blank'><i class='fas fa-image image-logo'></i></a></td>";
                            $status = strtolower($row['status']);
                            echo "<td class='text-center py-2 px-4'>";
                            if ($status == 'not yet processed') {
                                echo "<span class='bg-red-500 text-white py-1 px-2 rounded-lg'>Not Processed Yet</span>";
                            } elseif ($status == 'in process') {
                                echo "<span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>In Process</span>";
                            } 
                            elseif ($status == 'pending') {
                                echo "<span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>In Process</span>";
                            }
                            
                            elseif ($status == 'closed' || $status == 'resolved') {
                                echo "<span class='bg-green-500 text-white py-1 px-2 rounded-lg'>Closed/Resolved</span>";
                            } else {
                                echo "<span class='bg-gray-500 text-white py-1 px-2 rounded-lg'>$status</span>";
                            }
                            echo "</td>";
                            $i++;
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='py-4 px-4'>You need to be logged in to view your data.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-center space-x-4 text-center mt-4">
        <a href="home.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Back to Home</a>
    </div>
</body>
</html>
