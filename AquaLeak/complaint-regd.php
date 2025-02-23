<?php require 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Registered</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl font-black text-gray-900 mb-4">Your Complaint Has Been Successfully Registered</h1>

        <?php
        $query = "SELECT * FROM report ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $lastEnteredComplaintID = $row['id'];
                echo "<p class='text-2xl font-black text-gray-900 mb-4'>Your Complaint Number: $lastEnteredComplaintID</p>";

                // Display complaint details in a table
                echo "<table class='bg-blue-500 table-auto rounded-lg w-full overflow-hidden'>";
                echo "<tr class=' text-black'>";
                echo "<th class='py-2 px-4  text-left'>Name</th>";
                
                echo "<th class='py-2 px-4  text-left'>Phone</th>";
                echo "<th class='py-2 px-4  text-left'>Location</th>";
                echo "<th class='py-2 px-4  text-left'>Details</th>";
                echo "<th class='py-2 px-4  text-left'>Photo</th>";
                echo "</tr>";
                echo "<tr class='bg-blue-100'>";
                echo "<td class='py-2 px-4'>$row[name]</td>";
               
                echo "<td class='py-2 px-4'>$row[phone]</td>";
                echo "<td class='py-2 px-4'><a href='https://www.google.com/maps?q=$row[location]' target='_blank'><i class='fas fa-map-marker-alt text-green-500 text-lg'></i></a></td>";
                echo "<td class='py-2 px-4'>$row[details]</td>";
                echo "<td>
                            <a href='$row[photo]' target='_blank'>
                                <i class='fas fa-image image-logo'></i>
                                </a>
                            </td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo "No complaints found.";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        ?>
        
       <a href="home.php" class="text-blue-500 underline mt-4">Click here to go back to home</a>
        
    </div>
    
</body>
</html>
