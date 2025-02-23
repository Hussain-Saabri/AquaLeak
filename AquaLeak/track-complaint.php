<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track</title>
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
        
        <?php
        require 'connection.php';
        if(isset($_POST['tracksubmit'])){
            $complaintid = $_POST["complaintid"];
            $rows = mysqli_query($con, "SELECT * FROM status where complaint_id=$complaintid");

            if(mysqli_num_rows($rows) > 0) {
                $resolved = false; // Flag to check if any status is resolved
                $feedbackButton = ''; // Initialize the feedback button

                foreach ($rows as $row) {
                    if ($row['status'] === 'resolved' || $row['status'] === 'Resolved') {
                        $resolved = true;
                    }
                    
                    echo "<h1 class='text-2xl text-black font-bold text-center'>Complaint Tracking Details</h1>";
                    echo "<br>";
                }
        ?>
        <div class="overflow-x-auto">
            <table class="table-auto rounded-lg w-full overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4 bg-green-500">Complaint_ID</th>
                        <th class="py-2 px-4 bg-green-500">Complainant_Name</th>
                        <th class="py-2 px-4 bg-green-500">Date</th>
                        <th class="py-2 px-4 bg-green-500">Status</th>
                        <?php
                        if ($resolved) {
                            echo '<th class="py-2 px-4 bg-green-500">Feedback</th>';
                        }
                    
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($rows as $row) {
                        echo "<tr class='" . ($i % 2 == 0 ? "bg-blue-100" : "bg-blue-200") . "'>";
                        echo "<td class='py-2 px-4 font-bold'>$row[complaint_id]</td>";
                        echo "<td class='py-2 px-4'>$row[name]</td>";
                        //format the date
                        $formattedDate = date("d F, h:i A", strtotime($row['date']));
                        echo "<td class='py-2 px-4'>$formattedDate</td>";
                        
                        $status = $row['status']; // Define the $status variable based on $row['status']
                        
                        if ($status == 'Not Processed Yet') {
                            echo "<td class='py-2 px-4'><span class='bg-red-500 text-white py-1 px-2 rounded-lg'>Not Processed Yet</span></td>";
                        } elseif ($status == 'in process') {
                            echo "<td class='py-2 px-4'><span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>In Process</span></td>";
                        } 
                        elseif ($status == 'pending') {
                            echo "<td class='py-2 px-4'><span class='bg-yellow-500 text-white py-1 px-2 rounded-lg'>Pending</span></td>";
                        
                        }
                        
                        elseif ($status == 'closed' || $status == 'resolved' || $status == 'Resolved' ) {
                            echo "<td class='py-2 px-4'><span class='bg-green-500 text-white py-1 px-2 rounded-lg'>Closed/Resolved</span></td>";
                        } else {
                            echo "<td class='py-2 px-4'><span class='bg-gray-500 text-white py-1 px-2 rounded-lg'>$status</span></td>";
                        }
                        
                        if ($resolved) {
                            echo '<td class="py-2 px-4"><span class="bg-red-500 text-white py-1 px-2 rounded-lg"><a href="feedback.php?id=' . $row['complaint_id'] . '">Feedback</a></span></td>';
                        }
                        
                       
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        } else {
            echo "<div class='mx-auto text-center'>";
    echo "<div class='bg-red-500 text-white inline-block py-5 px-4 mb-4 rounded-lg'>";
    echo "No Records found towards details provided. Please verify data entered.";
    echo "</div>";
    echo "</div>";
        }
    }
    ?>
    </div>
    <br>
    <div class="text-center mx-auto">
    <a href="home.php" class="rounded-lg bg-blue-500 text-white py-2 px-4">Back</a>
</div>

</body>
</html>
