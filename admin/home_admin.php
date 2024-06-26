<?php
require_once '../dbCOOPLINK.php';

if( !isset($_SESSION["adminID"]) ){ //KALAU BELUM LOGIN TIDAK BISA MASUK
    header("Location: login_form.php");
    exit;
}

if( isset($_POST["logout"]) ){ // LOGOUT HAPUS SEMUA SESSION
    session_destroy();
    header("Location: login_form.php");
    exit;
}

$var = jumlah_Total_Uang();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home | CoopLink</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <div class="bg-bgBlack w-screen min-h-screen px-10 pb-10 overflow-x-hidden">

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


        <div class="content rounded-3xl border-2 text-white">
            <!-- Hi User & History Button START -->
            <div class="flex flex-row justify-between items-center">
                <div class="user mt-4 ms-4 sm:ms-10 sm:mt-10 sm:text-3xl">Hi, Admin</div>

                <form action="history_admin.php">
                    <!-- INI GW BUAT LINK KE HISTORY ADMIN -->
                    <button class="rounded-full border border-bgWhite px-4 mt-4 me-4 sm:ms-10 sm:mt-10 sm:text-xl">
                        History
                    </button>
                </form>

            </div>
            <!-- Hi User & History Button END -->

            <!-- Tabungan POKOK START -->
            <div class="pokok flex justify-end me-4 mt-10 sm:mt-3 sm:me-10">
                <div class="flex flex-col text-end">
                    <div class="head text-sm sm:text-2xl">
                        <span>Tabungan</span>
                        <span class="font-bold">Pokok</span>
                    </div>
                    <div class="amount text-2xl sm:text-5xl sm:font-bold mt-2"><?= $var["totalPokok"] ?></div>
                </div>
            </div>
            <!-- Tabungan POKOK END -->

            <!-- Tabungan Wajib START -->
            <div class="web sm:flex sm:mt-5">
                <div class="wajib rounded-xl border mt-4 mx-4 sm:w-full">
                    <div class="brand font-bold text-xs sm:text-lg mt-4 ms-4 sm:mt-8 sm:mx-8">
                        <span>Coop</span><span style="color: #9FED81;">Link</span>
                    </div>
                    <div class=" flex flex-col text-end mt-2 me-4 mb-3 sm:me-8 sm:mb-5 sm:mt-5">
                        <div class="head text-sm sm:text-2xl">
                            <span>Tabungan</span>
                            <span class="font-bold">Wajib</span>
                        </div>
                        <div class="amount mt-2 sm:mt-0 sm:font-bold"><?= $var["totalWajib"] ?></div>
                    </div>
                </div>
                <!-- Tabungan Wajib END -->

                <!-- Tabungan Sukarela START -->
                <div class="sukarela rounded-xl border mt-4 mx-4 sm:w-full">
                    <div class="brand font-bold text-xs sm:text-lg mt-4 ms-4 sm:mt-8 sm:mx-8">
                        <span>Coop</span><span style="color: #9FED81;">Link</span>
                    </div>
                    <div class=" flex flex-col text-end mt-2 me-4 mb-3 sm:me-8 sm:mb-5 sm:mt-5">
                        <div class="head text-sm sm:text-2xl">
                            <span>Tabungan</span>
                            <span class="font-bold">Sukarela</span>
                        </div>
                        <div class="amount mt-2 sm:mt-0 sm:font-bold"><?= $var["totalSukaRela"] ?></div>
                    </div>
                </div>
            </div>
            <!-- Tabungan Sukarela END -->

            <div class="balance rounded-xl mx-4 my-4 sm:my-6 flex flex-col sm:flex-row sm:justify-between">
                <div class="detail text-xs sm:text-lg mt-5 mx-4 sm:my-6">
                    <span>Admin Wajib mengontrol setiap interaksi user</span><br>
                    <span>untuk alasan keamanan Admin melakukan verifikasi</span>
                </div>
                <div class="flex flex-col items-center sm:flex-row">
                    <form action="payment_verification.php">
                        <!-- INI LINK KE PAYMENT VERIFICATION -->
                        <button
                            class="text-black font-bold text-xs rounded-2xl py-3 px-7 mt-4 mb-2 mx-4 sm:text-base sm:my-6 sm:px-16 sm:py-3 hover:bg-textColor2/40 hover:text-textColor2">
                            View User Payment
                        </button>
                    </form>

                    <form action="user_verification.php">
                        <!-- BUAT LINK KE USER VERIFICATION -->
                        <button
                            class="text-black font-bold text-xs rounded-2xl py-3 px-9 mt-2 mb-4 mx-4 sm:text-base sm:my-6 sm:px-16 sm:py-3 hover:bg-textColor2/40 hover:text-textColor2">User
                            Verification
                        </button>
                    </form>
                </div>
            </div>


            <!-- <footer
                class="text-center text-xs sm:text-lg rounded-full border border-gray-800 mt-4 mx-4 mb-2 p-1 text-gray-800">
                <span>© 2024 | UTS Web Programming LEC</span>
            </footer> -->
        </div>
    </div>
    <script>
    let subModal = document.getElementById("subModal");

    function toogleModal() {
        if (subModal.style.display === "none") {
            subModal.style.display = "block";
        } else {
            subModal.style.display = "none";
        }
    }
    </script>
</body>

</html>