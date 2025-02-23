<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100">
<div>
        <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-lg flex justify-between h-16 px-12" >
            <a href="index.html" class="text-5xl text-green-600 p-1" >AquaLeak</a>
            <nav class="items-center  flex space-x-10 justify-end text-black ">
                <ul class="flex aligned-centre space-x-12  ">
                    <li><b><a href="index.html" class="hover:underline hover:text-blue-500">Home</a></b></li>
                    <li><b><a href="about_us.php" class="hover:underline hover:text-blue-500">About</a></b></li>
                    
                    <li><b><a href="contact_us.php" class="hover:underline hover:text-blue-500">Contact</a></b></li>
                    
                </ul>
                
                <a href="login-user.php" class="rounded-lg py-2 px-5 bg-blue-500 hover:underline hover:bg-blue-700 text-black"><b>Login</b></a>
                
                
            </nav>
            
        </header>
        
    </div>

    <div class="container mx-auto flex justify-center  h-screen mt-20 ">
        <div class="w-full max-w-md ">
        <div>
        <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="border-4 broder-black  text-white bg-red-500 text-center mb-4 font-semibold">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>
                </div>
            <form class="bg-white mt-20 border-4 shadow-md rounded-2xl border-black px-8 pt-6 pb-8" action="login-user.php" method="POST" autocomplete="">
            
                <p class="text-center mb-4">Login with your email and password.</p>
                
                <div class="mb-4">
                    <input class=" rounded-lg bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="mb-4">
                    <input class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="text-left mb-4"><a class="text-indigo-500 hover:underline" href="forgot-password.php">Forgot password?</a></div>
                <div class="mb-4">
                    <input class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full w-full cursor-pointer" type="submit" name="login" value="Login">
                </div>
                <div class="text-center">Not yet a member? <a class="text-indigo-500 hover:underline" href="signup-user.php">Signup now</a></div>
            </form>
        </div>
    </div>
</body>
</html>
