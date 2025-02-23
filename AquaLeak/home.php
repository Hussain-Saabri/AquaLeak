<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>

<html>
<head>
<title><?php echo $fetch_info['name'] ?> | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <header class=" fixed right-0 left-0 z-50 shadow-lg flex  justify-between h-16   justify-end px-12" >
        
        <a class="text-5xl mt-1 text-green-500 font-semibold" href="home.php">AquaLeak</a>
        <nav class="items-center  flex space-x-10 justify-end text-black ">
           
            <ul class="flex aligned-centre space-x-16  ">
                <li><b><a href="home.php" class="hover:underline hover:text-blue-500">Home</a></b></li>
                <li><b><a href="about_us.php" class="hover:underline hover:text-blue-500">About</a></b></li>
               
                <li><b><a href="contact_us.php" class="hover:underline hover:text-blue-500">Contact</a></b></li>
                
            </ul>
            

            
            <a href="report.php" class="rounded-[12px]  py-2 px-5 bg-red-500 hover:underline hover:bg-red-700 text-black"><b>Report</b></a>
           
            <div class="relative group">
                <button class="rounded-[12px] bg-blue-500 text-black py-2 px-4">
                    <b><?php echo $fetch_info['name'];?></b>
                    <i class="fas fa-user ml-2"></i>
                </button>
                <ul class="rounded-[12px] font-bold w-full absolute hidden bg-blue-400 text-white py-2 px-4 top-full group-hover:block">
                <li><a href="user_complaint_list.php">Complaint List</a></li>
                <li><a href="logout-user.php">Logout</a></li>

                    
                    <li class=""><a href="admin.html">Admin</a></li>
                </ul>
            </div>
            
        </nav>
       
         
        
        
    </header>
    
    <div class="flex py-10">
    <div class="left-side py-10 px-10">
        <h1 class="text-4xl block   font-black text-gray-900 sm:text-6xl xl:text-7xl">
            <span class="block">Track and Report</span>
            <span class="block">Leaky Water Taps</span>
            <span class="block">with AquaLeak</span>
            
        </h1>
        <br>
        
        <form method="POST" action="track-complaint.php" class="flex py-8">
        <input type="text" name="complaintid" placeholder="Complaint Number..." required class="rounded-lg p-3 border font-bold border-2 shadow-none focus:outline-none mr-4">
        <button type="submit" name="tracksubmit" class="rounded-lg w-40 font-bold border p-5 border-2 text-white bg-black shadow-none">Track</button>
        
</form>

    </div>
    
    <div class="right-side(image) py-14 pr-1 w-1/2">
        <img src="Images/image(4).jpg" alt="" class="rounded-lg shadow-lg border border-gray-300">
    </div>
</div>
<div>
    
    

</div>
</body>
</html>
