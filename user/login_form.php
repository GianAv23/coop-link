<?php
require_once '../dbCOOPLINK.php';

if( isset($_POST["name"]) && isset($_POST["passw"]) && isset($_POST["submit"]) ){
    if( cek_Nasabah($_POST["name"], $_POST["passw"]) ){
        header("Location: home_user.php");
        exit;
    }else{
        header("Location: login_form.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log In | CoopLink</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    bgColor: "#141A12",
                    bgLogo: "#9FED81",
                    cardData: "#EEEEEE",
                    editBtn: "#161E31",
                    textColor2: "#9FED81",
                },
            }
        }
    }
    </script>
</head>

<body>

    <div class="bg-bgColor w-screen min-h-screen">

        <div class="w-screen min-h-screen flex flex-col justify-center px-10 md:px-32 lg:px-60 xl:px-96">

            <!-- HEADER START -->
            <div class="flex flex-col gap-2 mb-8 items-center">
                <!-- LOGO START -->
                <div class="bg-bgLogo/10 rounded-lg w-28 h-8 flex items-center justify-center">
                    <span class="text-white font-bold">
                        Coop<span class="text-textColor2">Link</span>
                    </span>
                </div>
                <!-- LOGO END -->
                <span class="text-cardData font-bold text-3xl">Login Account</span>
            </div>
            <!-- HEADER END -->

            <!-- FORM START -->
            <form class="flex flex-col gap-6 mt-8" method="post">

                <!-- USERNAME START -->
                <div class=" flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="a">
                            Username
                        </label>
                    </div>

                    <div>
                        <input type="text" name="name" id="a" placeholder="Enter your username"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- USERNAME END -->

                <!-- PASSWORD START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="p">
                            Password
                        </label>
                    </div>

                    <div>
                        <input type="password" name="passw" id="p" placeholder="Enter your password"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>

                    <a href="change_pass.php" class="flex justify-end"><span
                            class="text-textColor2 font-medium text-sm mt-1">Lupa
                            Password</span>
                    </a>
                </div>
                <!-- PASSWORD END -->

                <!-- BUTTON START -->
                <div class="mt-6">
                    <button type="submit" name="submit" class="bg-textColor2 w-full py-2 rounded-full"><span
                            class="text-textColor font-bold">Log
                            In</span>
                    </button>
                </div>

                <div class="flex justify-center">
                    <span class="text-cardData font-medium text-sm">Don’t have an account? <a
                            class="text-textColor2 font-bold" href="signup_form.php">Sign
                            Up</a></span>
                </div>
                <!-- BUTTON END -->

            </form>
            <!-- FORM END -->
        </div>
    </div>
    <script></script>

</body>

</html>