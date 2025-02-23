<?php require_once "controllerUserData.php"; ?>

<?php 
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if($email != false && $password != false){
        $sql = "SELECT * FROM usertable WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        // The rest of your code here for when the user is logged in.
    }
}
?>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<title>
    About Us
    </title>

echo $fetch_info['name'] ?> | About Us</title>
<body class="bg-blue-100">
    
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-lg flex justify-between h-16 px-12">
        <a href="home.php" class="text-5xl text-green-600 p-1">AquaLeak</a>
        <nav class="items-center  flex space-x-10 justify-end text-black ">
            <ul class="flex aligned-centre space-x-12  ">
                <li><b><a href="home.php" class="hover:underline hover:text-blue-500">Home</a></b></li>
                
                
                <li><b><a href="contact_us.php" class="hover:underline hover:text-blue-500">Contact</a></b></li>
                
            </ul>
            
            <a href="report.php" class="rounded-[12px]  py-2 px-5 bg-red-500 hover:underline hover:bg-red-700 text-black"><b>Report</b></a>
            
                
               
            

                    
                    
                </ul>
            </div>
            
        </nav>
       
         
        
        
    </header>

 <br><br><br>
    <div class="container text-black font-bold mx-auto mt-6 p-32 bg-blue-400 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Who We Are</h2>
        <p class="text-gray-600">
            AquaLeak is a community-driven platform dedicated to addressing water-related issues. We empower individuals to share information about leaked water taps and pipes in their neighborhoods, helping communities take proactive measures to conserve water resources.
        </p>

        <h2 class="text-2xl font-bold mt-6 mb-4">Our Mission</h2>
        <p class="text-gray-600">
            Our mission is to promote awareness and collaboration in resolving water leakage problems. We believe that by sharing information and working together, we can make a significant impact on water conservation efforts.
        </p>

        <h2 class="text-2xl font-bold mt-6 mb-4">Contact Us</h2>
        <p class="text-gray-600">
            If you have any questions or suggestions, please feel free to contact us at <a href="contact_us.php" class="text-yellow-500">contact@aqualeak.com</a>.
        </p>
    </div>
 
</body>
</html>
