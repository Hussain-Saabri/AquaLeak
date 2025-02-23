<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    
    <div class="container  mx-auto  flex justify-center items-center h-screen">
        <div class="w-full max-w-md ">
            <form class="mt-20 bg-white shadow-md border-4  border-black rounded-2xl px-8  pb-8 " action="signup-user.php" method="POST" autocomplete="">
                <h2 class="text-2xl text-center font-semibold mb-4">Signup</h2>
                <p class="text-center mb-4">It's quick and easy.</p>
                <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center mb-4">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="mb-4 ">
    <input class="rounded-lg bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="text" name="name" placeholder="Full Name" autocomplete="off" required value="<?php echo $name ?>">
</div>
<div class="mb-4">
    <input class="rounded-lg bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
</div>
<div class="mb-4">
    
    <input class="rounded-lg bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="password" name="password" placeholder="Password" required>
</div>
<div class="mb-4">
    <input class="rounded-lg bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="password" name="cpassword" placeholder="Confirm password" required>
</div>
<div class="mb-4">
    <input class="rounded-lg bg-indigo-500 hover:bg-black text-white font-bold py-2 px-4 rounded-full w-full cursor-pointer" type="submit" name="signup" value="Signup">
</div>
<div class="text-center">Already a member? <a class="text-indigo-500 hover:underline" href="login-user.php">Login here</a></div>

            </form>
        </div>
    </div>
</body>
</html>
