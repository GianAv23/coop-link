<?php
require_once '../dbCOOPLINK.php';

if( !isset($_SESSION["adminID"]) ){ //KALAU BELUM LOGIN TIDAK BISA MASUK
    header("Location: login_form.php");
    exit;
}

$var = show_Register(0); // 0 untuk indikasi nampilin semua user yang mau di acc atau reject
if( isset($_POST["acc"]) ){
    acc_Register(true, $_POST["acc"]);
    header("Location: user_verification.php");
    exit;
}

if( isset($_POST["del"]) ){
    acc_Register(false, $_POST["del"]);
    header("Location: user_verification.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Verification | CoopLink</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    bgColor: "#141A12",
                    bgLogo: "#9FED81",
                    cardData: "#282828",
                    textColor2: "#9FED81",
                    bgWhite: "#EEEEEE",
                    bgBlack: "#121212",
                },
            }
        }
    }
    </script>
</head>

<body>
    <div class="bg-bgBlack w-screen min-h-screen overflow-hidden">

        <!-- NAVBAR START -->
        <div class="flex flex-row px-10 justify-between pt-8">
            <div class="flex items-center justify-start">
                <span class="text-white font-semibold text-xl">
                    Coop<span class="text-textColor2">Link</span>
                </span>
            </div>

            <div class="rounded-full border border-bgWhite py-1 px-1 flex items-center justify-center">

                <span class="text-white font-semibold ml-5">
                    Admin
                </span>

                <div class="ml-3 w-7 h-7 rounded-full border border-bgWhite bg-cover bg-center"
                    style="background-image: url(assets/test.jpg);">
                </div>


            </div>
        </div>
        <!-- NAVBAR END -->

        <!-- BODY START -->
        <div class="flex flex-row justify-between">
            <div class="w-full h-full bg-bgBlack rounded-3xl border border-textColor2 m-8">
                <div class="flex flex-col p-6 gap-4 shrink-0">
                    <div class="mb-3 flex items-center gap-4">
                        <!-- untuk kembali ke home -->
                        <button
                            class="rounded-full w-30 h-8 bg-bgLogo p-2 flex flex-row items-center justify-center"><span
                                class="font-medium text-base" onclick="window.location.href='home_admin.php'"> 
                                <!-- on click buat back ke halaman home -->
                                < Back </span></button>
                        <span class="font-normal text-bgWhite text-lg lg:text-2xl">User Registration
                            <span class="text-textColor2 font-bold">Verification</span></span>
                    </div>


                    <div class="h-[600px] flex-grow overflow-y-scroll flex flex-col gap-4">

                        <!-- INI YANG DI LOOP PID -->
                        <?php foreach($var as $v) : ?>
                        <div
                            class="bg-cardData/50 rounded-3xl border border-bgWhite flex flex-col p-4 backdrop-blur-md">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-start">

                                <div class="flex flex-col gap-0">
                                    <span class="font-semibold text-bgWhite text-lg">
                                        <?= $v["namaRegis"] ?><!-- value nama nasabah -->
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm text-textColor2">
                                        <?= $v["emailRegis"] ?><!-- value email nasabah -->
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm">
                                        <?= $v["birtDRegis"] . " | " . $v["alamRegis"] ?><!-- value tanggal pembayaran | value alamat -->
                                    </span>
                                </div>

                                <div class="mt-6 flex flex-row justify-between md:gap-10 md:pb-4">
                                    <button class="rounded-xl bg-bgColor border border-textColor2 px-4 py-1">
                                        <span class="font-medium text-textColor2 text-xs md:text-sm">
                                            <?php $v["filebayarRegis"] ?>
                                        </span>
                                    </button>

                                    <div class="flex flex-row gap-2">
                                        <form action="" method="post">
                                            <button class="rounded-xl bg-bgLogo px-4 py-1" type="submit" name="acc" value="<?= $v["regisID"] ?>">
                                                <span class="font-medium text-bgColor text-xs md:text-sm">Accept</span>
                                            </button>
    
    
                                            <button class="rounded-xl border border-textColor2 px-4 py-1" type="submit" name="del" value="<?= $v["regisID"] ?>">
                                                <span class="font-medium text-bgWhite text-xs md:text-sm">Reject</span>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- INI YANG DI LOOP PID -->
                    </div>
                </div>
            </div>
        </div>
        <!-- BODY END -->
    </div>


    <!-- <div class="flex justify-center">
        <div class="fixed bottom-0 w-96 py-2 rounded-full border border-bgWhite mb-4 flex items-center justify-center">
            <span class="text-sm text-bgWhite">2024 | UTS Web Programming</span>
        </div>
    </div> -->
    </div>


</body>

</html>