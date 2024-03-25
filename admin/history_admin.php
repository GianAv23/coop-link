<?php
require_once '../dbCOOPLINK.php';
if( !isset($_SESSION["adminID"]) ){
    header("Location: login_form.php");
    exit;
}

$var = history_Admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>History Admin | CoopLink</title>
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
                    verified: "#9FED81",
                    reviewed: "#ffdd33",
                    rejected: "#cc362b"
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

        <!-- BODY START -->
        <div class="flex flex-row justify-between">
            <div class="w-full h-full bg-bgBlack rounded-3xl border border-textColor2">
                <div class="flex flex-col p-6 gap-4 shrink-0">
                    <div class="mb-3 flex items-center gap-4">
                        <!-- untuk kembali ke home -->
                        <button class="rounded-full w-30 h-8 bg-bgLogo p-2 flex flex-row items-center justify-center"
                            onclick="window.location.href='home_admin.php'"><span class="font-medium text-base">
                                <!-- on click buat back ke halaman home -->
                                < Back </span></button>
                        <span class="font-normal text-bgWhite text-lg md:text-xl lg:text-2xl">History
                            <span class="text-textColor2 font-bold">Admin</span></span>
                    </div>


                    <div class="h-[600px] flex-grow overflow-y-scroll flex flex-col gap-4">

                        <!-- INI YANG DI LOOP PID -->
                        <?php foreach($var as $v) : ?>
                        <div
                            class="bg-cardData/50 rounded-3xl border border-bgWhite flex flex-col p-4 backdrop-blur-md">
                            <div class="flex flex-col md:justify-between">

                                <div class="flex flex-col gap-2 md:justify-center">
                                    <span class="font-bold text-bgWhite text-lg">
                                        <?= $v["namaUser"] ?>
                                    </span>

                                    <div>
                                        <hr>
                                    </div>
                                </div>



                                <div class="flex flex-col justify-between md:flex-row">

                                    <div class="flex flex-col pt-2">
                                        <span class="font-semibold text-bgWhite text-base md:pt-0">
                                            <?= $v["kategori"] ?>
                                            <!-- value kategori simpanan -->
                                        </span>


                                        <span class="font-semibold text-bgWhite/60 text-base">
                                            <?= $v["tanggalTf"] ?>
                                            <!-- value tanggal pembayaran -->
                                        </span>
                                    </div>

                                    <div class="flex flex-col pt-2 md:items-end">
                                        <span class="font-semibold text-bgWhite text-base md:pt-0">
                                            <?= $v["jmlhTf"] ?>
                                            <!-- value nominal pembayaran -->
                                        </span>


                                        <span
                                            class="<?php echo getStatusColorClass($v["statusTf"]); ?> font-semibold text-base">
                                            <?= $v["statusTf"] ?>
                                            <!-- value status pembayaran -->
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php
                        function getStatusColorClass($status) {
                            switch ($status) {
                                case 'Reviewed':
                                    return 'text-reviewed';
                                case 'Verified':
                                    return 'text-verified';
                                case 'Rejected':
                                    return 'text-rejected';
                                default:
                                    return ''; // default color if status doesn't match
                            }
                        }
                        ?>
                        <!-- Function Ubah warna status pembayaran -->
                    </div>
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