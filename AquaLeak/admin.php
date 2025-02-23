<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aqualeak-Admin Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body class="bg-gray-200">

<?php
$username = "admin";
$password = "admin";

session_start();
if(isset($_SESSION['username'])){
    ?>
    <div class="bg-black fixed w-full h-16 z-10">
        <div class="container mx-auto flex justify-between items-center h-full text-white">
            <div class="logo font-bold text-right text-2xl">
                <h1>Hussain</h1>
            </div>
            <div class="btn">
                <a href="logout-user.php" class="text-white text-xl font-bold uppercase">Logout</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl font-bold text-black">Welcome admin !!</h1>
        <div class="view mt-8 text-center">
            <a href="admin-data.php" class="text-xl font-bold text-white bg-blue-600 py-4 px-16  hover:text-gray-600 hover:bg-blue-500">Complaints</a>
        </div>
    </div>

    
                    
                    
                
    <div class="view mt-8 text-center">
    <div class="relative group">
                <button class="rounded-[12px] bg-blue-500 text-black py-2 px-4">
                  
                    
                </button>
                <ul class="rounded-[12px] font-bold w-full absolute hidden bg-blue-400 text-white py-2 px-4 top-full group-hover:block">
                    <li><a href="logout-user.php">Logout</a></li>
                    <li class=""><a href="logout-user.php">Logout</a></li>
                    <li class=""><a href="admin.html">Admin</a></li>
                </ul>
            </div>
    </div>


    <?php

}
else{
    if($_POST['username']==$username && $_POST['password']==$password){

        $_SESSION['username']=$username;
        ?>
        <script>
            alert('Successfully logged in!')
        </script>

        <div class="bg-black fixed w-full h-16 z-10">
            <div class="container mx-auto flex justify-between items-center h-full text-white">
                <div class="logo font-bold text-right text-2xl">
                    <h1>Hussain</h1>
                </div>
                <div class="btn">
                    <a href="logout.php" class="text-white text-xl font-bold uppercase">Logout</a>
                </div>
            </div>
        </div>

        <div class="container mx-auto h-screen flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold text-white">Welcome admin !!</h1>
            <div class="view mt-8 text-center">
                <a href="admin-data.php" class="text-xl font-bold text-white bg-green-500 py-4 px-16 rounded-full hover:text-gray-600 hover:bg-white">View Complaints</a>
            </div>
        </div>

    <?php

    }
    else{
        ?>
        <script>
            alert('The Username/Password entered by you is incorrect. Please Try Again!!!')
        </script>
        <?php
    }
}

?>

</body>
</html>
