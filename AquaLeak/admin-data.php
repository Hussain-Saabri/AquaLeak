<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Data</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add CSS for table cells to show vertical lines */
        table td {
            border: 1px solid #e2e8f0; /* Adjust the border color as needed */
            padding: 8px;
            text-align: center;
        }
        /* Center the container and limit its width */
        .container {
            margin: 0 auto;
            max-width: 800px; /* Adjust the maximum width as needed */
        }
    </style>
</head>
<body class="p-5">
    <div class="container mx-auto"> <!-- Center the container and set the maximum width -->
        
        <div class "overflow-x-auto">
            <table class="table-auto rounded-lg w-full overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4 bg-red-500">Complaint_ID</th>
                        <th class="py-2 px-4 bg-green-500">Name</th>
                        
                        <th class="py-2 px-4 bg-yellow-500">Phone</th>
                        <th class="py-2 px-4 bg-purple-500">Location</th>
                        <th class="py-2 px-4 bg-green-500">Photo</th>
                        <th class="py-2 px-32 bg-pink-500">Status</th>
                        <th class="py-2 px-4 bg-green-500">Action</th>
                    </tr>
                </thead>
                <form method="post" action="admin-data.php">
                <tbody>
                    <?php
                    require 'connection.php';

                    // Fetch report data
                    $reportQuery = "SELECT * FROM report";
                    $reportData = mysqli_query($con, $reportQuery);

                    // Fetch status data
                    $statusQuery = "SELECT * FROM status";
                    $statusData = mysqli_query($con, $statusQuery);

                    $statusArray = [];

                    while ($statusRow = mysqli_fetch_assoc($statusData)) {
                        $statusArray[$statusRow['complaint_id']] = $statusRow['status'];
                    }

                    $i = 1;
                    foreach ($reportData as $row) {
                        echo "<tr class='" . ($i % 2 == 0 ? "bg-blue-100" : "bg-blue-200") . "'>";
                        echo "<td class='py-2 px-4 font-bold'>$row[id]</td>";
                        echo "<td class='py-2 px-4'>$row[name]</td>";
                        
                        echo "<td class='py-2 px-4'>$row[phone]</td>";
                        echo "<td class='py-2 px-4' style='width:50px;height:50px;'>
                                <a href='https://www.google.com/maps?q=$row[location]' target='_blank'>
                                    <i class='fas fa-map-marker-alt text-green-500 text-lg'></i>
                                </a>
                            </td>";
                        echo "<td>
                            <a href='$row[photo]' target='_blank'>
                                <i class='fas fa-image image-logo'></i>
                            </a>
                        </td>";
                        // Display status based on the "complaint_id"
                        $status = strtolower($statusArray[$row['id']] ?? 'not yet processed');
            if ($status == 'not processed yet') {
                echo "<td class='py-2 px-4'><span class='bg-red-500 text-white py-1 px-2 rounded-lg'>Not Processed Yet</span></td>";
            } elseif ($status == 'in process') {
                echo "<td class='py-2 px-4'><span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>In Process</span></td>";
            } elseif ($status == 'closed' || $status == 'resolved') {
                echo "<td class='py-2 px-4'><span class='bg-green-500 text-white py-1 px-2 rounded-lg'>Closed/Resolved</span></td>";
            }
                
            elseif ($status == 'pending') 
            {
                    echo "<td class='py-2 px-4'><span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>Pending</span></td>";
            }
            else {
                echo "<td class='py-2 px-4'><span class='bg-gray-500 text-white py-1 px-2 rounded-lg'>$status</span></td>";
            }
            echo '<td class="py-2 px-2 whitespace-nowrap">';
            echo '<span class=" bg-green-500 text-black py-1 px-2 rounded-none">';
            echo '<a href="update-complaint.php?id=' . $row['id'] . '" class="rounded-none text-black hover:underline">Take Action</a>';
            echo '</span>';
            echo '</td>'; 
            

                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center space-x-4 text-center mt-4">
        <a href="admin.php" class="bg-blue-500 hover-bg-blue-600 text-white py-2 px-4 rounded-lg">Back</a>
        
    </div>
    </form>
                
</body>
</html>
