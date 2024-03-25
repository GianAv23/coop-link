<?php
require_once '../dbCOOPLINK.php';

if( isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["newpass"]) && isset($_POST["confirpass"]) ){

    if( $_POST["newpass"] === $_POST["confirpass"] ){

        if( change_User_Pass($_POST["newpass"], $_POST["name"]) ){
            header("Location: login_form.php");
            exit;
        } else {
            // INI BAKAL JALAN KETIKA PASSWORD NYA KURANG DARI 8 KARAKTER
            header("Location: change_pass.php");
            exit;
        }
        
    } else {
        header("Location: change_pass.php");
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
    <title>Change Pass | CoopLink</title>

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
    <div class="relative w-screen min-h-screen bg-bgColor">

        <!-- ELLIIPSE START -->
        <img class="absolute z-0 top-0 left-0" src="../assets/ellipse2.svg" alt="">
        <!-- ELLIIPSE END -->

        <div class="w-screen min-h-screen flex flex-col justify-center py-10 px-8">

            <!-- HEADER START -->
            <div class="flex flex-col gap-2 mb-8 items-center">
                <!-- LOGO START -->
                <div class="bg-bgLogo/10 rounded-lg w-28 h-8 flex items-center justify-center">
                    <span class="text-white font-bold">
                        Coop<span class="text-textColor2">Link</span>
                    </span>
                </div>
                <!-- LOGO END -->
                <span class="text-cardData font-bold text-3xl">Change Password</span>
            </div>
            <!-- HEADER END -->

            <form class="z-10 flex flex-col gap-6 md:px-44 lg:px-64 xl:px-80" method="post" action="">

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
                            New Password
                        </label>
                    </div>

                    <div>

                        <input type="password" name="newpass" id="p" placeholder="Enter your new password"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>

                    <div>
                        <span class="text-cardData font-medium text-xs">Min 8 Characters</span>
                    </div>

                </div>
                <!-- PASSWORD END -->

                <!-- CONFIRM PASSWORD START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="p2">
                            Confirm New Password
                        </label>
                    </div>

                    <div>

                        <input type="password" name="confirpass" id="p2" placeholder="Enter your password"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- CONFIRM PASSWORD END -->


                <!-- BUTTON START -->
                <div class="mt-6 flex flex-row gap-6">
                    <a href="home_user.php"
                        class="w-full shadow bg-bgLogo/20 border-dashed border-2 border-cardData py-2 px-4 rounded-full text-center block">
                        <span class="text-cardData font-bold">Cancel</span>
                    </a>
                    <button type="submit" name="submit"
                        class="bg-textColor2 w-full py-2 rounded-full font-bold text-textColor hover:bg-textColor2/40 hover:text-textColor2"><span>Change
                            Password</span>
                    </button>
                </div>
                <!-- BUTTON END -->

            </form>

        </div>

</body>

</html>