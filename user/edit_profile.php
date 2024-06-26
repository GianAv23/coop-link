<?php
require_once '../dbCOOPLINK.php';

if( !isset($_SESSION["nasabahID"]) ){ //KALAU BELUM LOGIN TIDAK BISA MASUK
    header("Location: login_form.php");
    exit;
}

$var = info_Nasabah();

if( isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["gender"]) && isset($_POST["dob"]) && isset($_POST["submit"]) ){

    $path_foto = foto_Path("FOTO_USER"); // SESUAIN NAME DENGAN "FOTO_USER" DI FORM INPUT NAME-NYA
    if( $path_foto === "Error" ){
        header("Location: edit_profile.php"); //ini nanti error_message aja
        exit;
    }

    if( edit_Profile($_POST["name"], $_POST["email"], $_POST["address"], $_POST["gender"], $_POST["dob"], $path_foto ) ){
        header("Location: home_user.php");
        exit;
    }else{
        header("Location: edit_profile.php"); //ini error message aja 
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
    <title>Edit Profile | CoopLink</title>

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
    <div class="relative w-screen min-h-screen bg-bgColor overflow-x-hidden">

        <!-- ELLIIPSE START -->
        <img class="absolute z-0 top-0 left-0" src="../assets/ellipse2.svg" alt="">
        <!-- ELLIIPSE END -->

        <div class="w-screen min-h-screen flex flex-col justify-center px-10 py-10">

            <!-- HEADER START -->
            <div class="flex flex-col gap-2 mb-8 items-center">
                <!-- LOGO START -->
                <div class="bg-bgLogo/10 rounded-lg w-28 h-8 flex items-center justify-center">
                    <span class="text-white font-bold">
                        Coop<span class="text-textColor2">Link</span>
                    </span>
                </div>
                <!-- LOGO END -->
                <span class="text-cardData font-bold text-3xl">Edit Profile</span>
            </div>
            <!-- HEADER END -->

            <form class="z-10 flex flex-col gap-4 md:px-44 lg:px-64 xl:px-80" method="post"
                enctype="multipart/form-data" action="">

                <div>
                    <input type="hidden" name="id">
                </div>

                <!-- USERNAME START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="a">
                            Username
                        </label>
                    </div>

                    <div>

                        <input type="text" name="name" id="name" placeholder="Enter your username"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData"
                            value="<?= $var["namaUser"] ?>">
                    </div>
                </div>
                <!-- USERNAME END -->

                <!-- EMAIL START -->
                <div class="">
                    <div>
                        <label class=" text-cardData font-semibold" for="email">
                            Email
                        </label>
                    </div>
                    <div>
                        <input class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData"
                            placeholder="Enter your email" id="email" type="email" name="email"
                            value="<?= $var["emailUser"] ?>">
                    </div>
                </div>
                <!-- EMAIL END -->

                <!-- ADDRESS START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="a">
                            Address
                        </label>
                    </div>

                    <div>
                        <input type="text" name="address" id="alamat" placeholder="Enter your email"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData"
                            value="<?= $var["alamat"] ?>">
                    </div>
                </div>
                <!-- ADDRESS END -->

                <!-- GENDER START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="gender">
                            Gender
                        </label>
                    </div>

                    <select class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" name="gender" id="gender"
                        value="<?= $var["kelamin"] ?>">
                        <option class="text-cardData bg-bgColor" value="male">Male</option>
                        <option class="text-cardData bg-bgColor" value="female">Female</option>

                    </select>
                </div>
                <!-- GENDER END -->

                <!-- DATE OF BIRTH -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="hbd">
                            Date of Birth
                        </label>
                    </div>

                    <div>

                        <input type="date" name="dob" id="alamat" placeholder="Enter your Date of Birth"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData"
                            value="<?= $var["tanggalLahir"] ?>">
                    </div>
                </div>
                <!-- DATE OF BIRTH -->



                <!-- ini pid untuk input upload profile picture -->
                <!-- UPLOAD PROFILE PICTURE START -->
                <div class="mb-4 gap-2 flex flex-col">



                    <label for="upload" class="text-cardData font-semibold">Upload Profile Picture</label>
                    <div class="flex flex-col gap-6">
                        <div class="bg-cover bg-center rounded-full border-2 border-cardData/50 border-dashed"
                            style="background-image: url('<?= $var['fotoProfil'] ?>'); width: 100px; height: 100px;">
                        </div>
                        <input type="file" class="w-full text-sm text-slate-500 
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-textColor2 file:text-slate-900
                    hover:file:bg-textColor hover:file:text-cardData
                    " id="upload" name="FOTO_USER" value="<?= $var["fotoProfil"] ?>">

                    </div>
                </div>
                <!-- UPLOAD PROFILE PICTURE END -->

                <!-- BUTTON START -->
                <div class="flex flex-row gap-6 mt-2">

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