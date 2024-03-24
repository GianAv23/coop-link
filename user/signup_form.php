<?php
require_once '../dbCOOPLINK.php';

if( isset($_POST["name"]) && isset($_POST["passw1"]) && isset($_POST["passw2"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["birthday"]) && isset($_POST["gender"]) && isset($_POST["jumlahBayar"]) ){

    if( $_POST["passw1"] === $_POST["passw2"] ){

        $file_path_bukti_bayar = foto_Path("BUKTI_TRANSFER"); // NAME INPUT HARUS BUKTI_TRANSFER
        $file_path_profile = foto_Path("FOTO_USER"); // NAME INPUT HARUS FOTO_USER

        if( $file_path_bukti_bayar === "Error" && $file_path_profile === "Error" ){ // KALO ADA ERROR FILE IMAGE NYA JALANIN KODE INI
            header("Location: signup_form.php");
            exit;
        }
        $cek = registrasi_Nasabah($_POST["email"], $_POST["name"], $_POST["passw1"], $_POST["address"], $_POST["gender"], $_POST["birthday"], 
        $file_path_bukti_bayar, $file_path_profile, $_POST["jumlahBayar"]);
        if( $cek === "Berhasil" ){ 
            header("Location: login_form.php");
            exit;
        } else {
            // INI JALAN KETIKA ADA DATA YANG GK LENGKAP ATAU GK SESUAI
            // RETURN DARI FUNGSI registrasi_Nasabah --> "Berhasil" , "Simpanan Pokok tidak boleh nol" , "Password minimal 8 karakter" , "File bayar Error" , "File foto profile Error" , "Lengkapi datanya" (UNTUK YG INI KAYAK EMAIL / NAME / BIRTH DAY / ADDRESS NYA KOSONG)
            header("Location: signup_form.php");
            exit;
        }

    } else {
        header("Location: signup_form.php");
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
    <title>Sign Up | CoopLink</title>
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
    <div class="w-screen min-h-screen bg-bgColor">

        <div class="w-screen min-h-screen flex flex-col justify-center py-8 px-10 md:px-32 lg:px-60 xl:px-80">
            <!-- HEADER START -->
            <div class="flex flex-col gap-2 mb-8 items-center">
                <!-- LOGO START -->
                <div class="bg-bgLogo/10 rounded-lg w-28 h-8 flex items-center justify-center">
                    <span class="text-white font-bold">
                        Coop<span class="text-textColor2">Link</span>
                    </span>
                </div>
                <!-- LOGO END -->
                <span class="text-cardData font-bold text-3xl">Sign Up Account</span>
            </div>
            <!-- HEADER END -->


            <!-- FORM START -->
            <form class="flex flex-col gap-6 mt-8" method="post">

                <!-- USERNAME START -->
                <div class="flex flex-col gap-1">
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
                        <label class="text-cardData font-semibold" for="p1">
                            Password
                        </label>
                    </div>

                    <div>
                        <input type="password" name="passw1" id="p1" placeholder="Enter your password"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                    <div>
                        <span class="text-cardData font-medium text-xs">Min 8 Characters</span>
                    </div>
                </div>
                <!-- PASSWORD END -->

                <!-- PASSWORD CONFIRM START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="p2">
                            Password Confirm
                        </label>
                    </div>

                    <div>

                        <input type="password" name="passw2" id="p2" placeholder="Enter your password"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- PASSWORD CONFIRM END -->

                <!-- EMAIL START -->
                <div class="flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="a">
                            Email
                        </label>
                    </div>

                    <div>

                        <input type="email" name="email" id="e" placeholder="Enter your email"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
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
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
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

                    <select class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" name="gender" id="gender">
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

                        <input type="date" name="birthday" id="alamat" placeholder="Enter your email"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- DATE OF BIRTH -->


                <div class="flex flex-col gap-1 justify-center items-center">
                    <span class="text-cardData font-medium text-base">Hang on Buddy</span>
                    <span class="text-cardData font-bold text-xl">Almost There</span>
                </div>

                <!-- UPLOAD START -->
                <div class="mb-4 gap-2 flex flex-col">
                    <label for="upload" class="text-cardData font-semibold">Upload</label>
                    <div>

                        <input type="file" class="w-full text-sm text-slate-500 
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-textColor2 file:text-slate-900
                    hover:file:bg-textColor hover:file:text-cardData
                    " id="upload" name="FOTO_USER">

                    </div>
                </div>
                <!-- UPLOAD END -->

                <!-- CAPCTHA START -->


                <!-- CAPCTHA END -->

                <!-- BUTTON START -->
                <div class="flex flex-row">

                    <form action="login_form.php">
                        <!-- LINK KE LOGIN KARENA MASIH HARUS DI ACC -->
                        <button class="w-full shadow bg-textColor2 py-2 px-4 rounded-full" type="submit" name="submit">
                            <span class="text-textColor font-bold">Sign Up</span>
                        </button>
                    </form>

                </div>
                <!-- BUTTON END -->
            </form>
        </div>

</body>

</html>