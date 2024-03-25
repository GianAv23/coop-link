<?php
require_once '../dbCOOPLINK.php';

if( !isset($_SESSION["adminID"]) ){ //KALAU BELUM LOGIN TIDAK BISA MASUK
    header("Location: login_form.php");
    exit;
}

$var = verifi_Bayar();
if( isset($_POST["acc"]) ){
    acc_Bayar(true, $_POST["acc"]);
    header("Location: payment_verification.php");
    exit;
}

if( isset($_POST["del"]) ){
    acc_Bayar(false, $_POST["del"]);
    header("Location: payment_verification.php");
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
    <title>Payment Verification | CoopLink</title>
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
    <div class="bg-bgBlack w-screen min-h-screen overflow-hidden px-10">

        <!-- NAVBAR START -->
        <div class="sticky top-0 backdrop-blur-md flex flex-row px-4 justify-between py-5 my-4">

            <!-- PROFIL BUTTON START -->
            <div class="mt-1 p-3 absolute max-h-0 right-0 top-14 " id="subModal" style="display:none ;">

                <div class="modalProfile bg-bgLogo backdrop-blur-lg rounded-xl p-4 items-center">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2 items-start">
                            <span class="font-bold text-bgColor">Admin</span>
                        </div>

                        <form action="user_list.php">
                            <button class="flex flex-row justify-between" type="submit">
                                <span class="text-bgColor">View User List</span>
                            </button>
                        </form>

                        <form action="" method="post">
                            <button
                                class="bg-bgColor/80 rounded-full border-2 border-dashed border-cardData/50 px-3 py-2"
                                type="submit" name="logout">
                                <span class="text-bgWhite font-semibold text-sm">
                                    Log Out
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- PROFIL BUTTON END -->

            <div class="flex items-center justify-start">
                <span class="text-white font-semibold text-xl">
                    Coop<span class="text-textColor2">Link</span>
                </span>
            </div>

            <div class="rounded-full border border-bgWhite py-1 px-1 flex items-center justify-center cursor-pointer"
                onclick="toogleModal()">

                <span class="text-white font-semibold ml-5">
                    Admin
                </span>

                <div class="ml-3 w-7 h-7 rounded-full bg-cover bg-center"
                    style="background-image: url('../images/profilAdmin.svg');">
                </div>


            </div>
        </div>
        <!-- NAVBAR END -->
        <!-- BODY START -->
        <div class="flex flex-row justify-between">
            <div class="w-full h-full bg-bgBlack rounded-3xl border border-textColor2">
                <div class="flex flex-col p-6 gap-4 shrink-0">
                    <div class="mb-3 flex items-start gap-4 flex-col md:flex-row">
                        <!-- untuk kembali ke home -->
                        <button class="rounded-full w-30 h-8 bg-bgLogo p-2 flex flex-row items-center justify-center"
                            onclick="window.location.href='home_admin.php'"><span class="font-medium text-base">
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
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">

                                <div class="flex flex-col gap-0 md:justify-center">
                                    <span class="font-semibold text-bgWhite text-lg">
                                        <?= $v["namaUser"] ?>
                                        <!-- value nama nasabah -->
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm text-textColor2">
                                        <?= $v["emailUser"] ?>
                                        <!-- value email nasabah -->
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm">
                                        <?= $v["tanggalTf"] . " | " . $v["alamat"] ?>
                                        <!-- value tanggal pembayaran | value alamat -->
                                    </span>

                                </div>

                                <div class="flex flex-col">

                                    <div class="flex flex-row md:justify-end">
                                        <span class="font-semibold text-bgWhite text-lg pt-4 md:pt-0">
                                            <?= $v["jmlhTf"] ?>
                                            <!-- value nominal pembayaran -->
                                        </span>
                                    </div>

                                    <div class="flex flex-row justify-between mt-6 md:gap-12 ">
                                        <div class="rounded-xl bg-bgColor border border-textColor2 px-4 py-1">
                                            <span class="font-medium text-textColor2 text-xs md:text-sm">
                                                <?= $v["kategori"] ?>
                                                <!-- Transfer Proof -->
                                            </span>
                                        </div>

                                        <div class="flex flex-row gap-2">
                                            <form action="" method="post">
                                                <button class="rounded-xl bg-bgLogo px-4 py-1" type="submit" name="acc"
                                                    value="<?= $v["tfID"] ?>">
                                                    <span
                                                        class="font-medium text-bgColor text-xs md:text-sm">Accept</span>
                                                </button>

                                                <button class="rounded-xl border border-textColor2 px-4 py-1"
                                                    type="submit" name="del" value="<?= $v["tfID"] ?>">
                                                    <span
                                                        class="font-medium text-bgWhite text-xs md:text-sm">Reject</span>
                                                </button>
                                            </form>
                                        </div>

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