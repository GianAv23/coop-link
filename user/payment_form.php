<?php
require_once '../dbCOOPLINK.php';

if( !isset($_SESSION["nasabahID"]) ){ //KALAU BELUM LOGIN TIDAK BISA MASUK
    header("Location: login_form.php");
    exit;
}

if( isset($_POST["kategori_simpanan"]) && isset($_POST["tgl_pembayaran"]) && isset($_POST["amount"]) ){

    $file_path_bukti_bayar = foto_Path("BUKTI_TRANSFER");

    if( $file_path_bukti_bayar === "Error" ){ //KALO ADA ERROR JALANIN KODE INI
        header("Location: payment_form.php");
        exit;
    }

    if( pembayaran_Nasabah( $_POST["kategori_simpanan"], $_POST["tgl_pembayaran"], $_POST["amount"], "MASUKIN FILE PATHNYA BUKTI TRANSFER" ) ){ 
        header("Location: home_user.php");
        exit;
    } else {
        header("Location: payment_form.php");
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
    <title>Payment | CoopLink</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    bgColor: "#141A12",
                    bgLogo: "#9FED81",
                    cardData: "#EEEEEE",
                    // cardData: "#282828",
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
                <span class="text-cardData font-bold text-3xl">Add Balance</span>
            </div>
            <!-- HEADER END -->


            <!-- FORM START -->
            <form class="flex flex-col gap-6 mt-8" method="post">
                <!-- PAYMENT START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="kategori_simpanan">
                            Category
                        </label>
                    </div>

                    <select class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" name="kategori_simpanan"
                        id="kategori_simpanan">
                        <option class="text-cardData bg-bgColor" value="wajib">Simpanan Wajib</option>
                        <option class="text-cardData bg-bgColor" value="sukarela">Simpanan Sukarela</option>
                    </select>
                </div>
                <!-- PAYMENT END -->

                <!-- PAYMENT DATE -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="tgl_pembayaran">
                            Payment Date
                        </label>
                    </div>

                    <div>
                        <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" placeholder="Enter your email"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- PAYMENT DATE -->

                <!-- AMOUNT START -->
                <div class=" flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="amount">
                            Amount
                        </label>
                    </div>

                    <div>
                        <input type="number" name="amount" id="amount" placeholder="Enter amount"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- AMOUNT END -->

                <!-- BUTTON START -->
                <div class="flex flex-row gap-4 mt-2">

                    <a href="home_user.php"
                        class="w-full shadow bg-bgLogo/20 border-dashed border-2 border-cardData py-2 px-4 rounded-full text-center block">
                        <span class="text-cardData font-bold">Cancel</span>
                    </a>
                    <button class="w-full shadow bg-bgLogo py-2 px-4 rounded-full" type="submit" name="submit">
                        <span class="text-bgColor font-bold">Submit</span>
                    </button>

                </div>
                <!-- BUTTON END -->

            </form>
        </div>
    </div>

</body>

</html>