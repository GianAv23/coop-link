<?php
require_once '../dbCOOPLINK.php';

if (isset($_POST["name"]) && isset($_POST["passw1"]) && isset($_POST["passw2"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["birthday"]) && isset($_POST["gender"]) && isset($_POST["jumlahBayar"]) && isset($_POST["submit"]) && isset($_POST['g-recaptcha-response'])) {
    $recaptcha_response = $_POST['g-recaptcha-response'];

    if (validate_recaptcha($recaptcha_response)) {
        if ($_POST["passw1"] === $_POST["passw2"]) {
            $file_path_bukti_bayar = foto_Path("BUKTI_TRANSFER");
            $file_path_profile = foto_Path("FOTO_USER");

            if ($file_path_bukti_bayar === "Error" && $file_path_profile === "Error") {
                $error_message = "Error uploading files";
            } else {
                $cek = registrasi_Nasabah($_POST["email"], $_POST["name"], $_POST["passw1"], $_POST["address"], $_POST["gender"], $_POST["birthday"], $file_path_bukti_bayar, $file_path_profile, $_POST["jumlahBayar"]);

                if ($cek === "Berhasil") {
                    header("Location: login_form.php");
                    exit;
                } else {
                    $error_message = $cek;
                }
            }
        } else {
            $error_message = "Passwords must match";
        }
    } else {
        $error_message = 'reCAPTCHA verification failed, please try again.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
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
    <div class="relative w-screen min-h-screen bg-bgColor overflow-x-hidden">

        <!-- ELLIIPSE START -->
        <img class="absolute z-0 top-0 left-0" src="../assets/ellipse2.svg" alt="">
        <!-- ELLIIPSE END -->

        <div class="w-screen min-h-screen flex flex-col justify-center py-20 px-10 md:px-32 lg:px-60 xl:px-80">
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
            <form class="z-10 flex flex-col gap-6 mt-8" method="post" enctype="multipart/form-data">

                <!-- ERROR MESSAGE START -->
                <?php if (!empty($error_message)) : ?>
                <div id="error-message" class="flex p-3 justify-center bg-textColor2/30 rounded-lg">
                    <span class="text-textColor2 font-medium text-sm flex text-center"><?= $error_message ?></span>
                </div>
                <?php endif; ?>
                <!-- ERROR MESSAGE END -->

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

                        <input type="text" name="address" id="alamat" placeholder="Enter your address"
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

                        <input type="date" name="birthday" id="alamat" placeholder="Enter your date of birth"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- DATE OF BIRTH -->

                <!-- UPLOAD PROFILE PICTURE START -->
                <div class="mb-4 gap-2 flex flex-col">
                    <label for="upload" class="text-cardData font-semibold">Upload Profile Picture</label>
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
                <!-- UPLOAD PROFILE PICTURE END -->

                <!-- NOMINAL PAYMENT START -->
                <div class=" flex flex-col gap-1">
                    <div>
                        <label class="text-cardData font-semibold" for="jumlahBayar">
                            Nominal Payment
                        </label>
                    </div>

                    <div>
                        <input type="number" name="jumlahBayar" id="jumlahBayar" placeholder="Enter nominal amount"
                            class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                    </div>
                </div>
                <!-- NOMINAL PAYMENT END -->

                <!-- UPLOAD BUKTI TRF START -->
                <div class="mb-4 gap-2 flex flex-col">
                    <label for="upload" class="text-cardData font-semibold">Upload Transfer Proof</label>
                    <div>

                        <input type="file" class="w-full text-sm text-slate-500 
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-textColor2 file:text-slate-900
                    hover:file:bg-textColor hover:file:text-cardData
                    " id="upload" name="BUKTI_TRANSFER">

                    </div>
                </div>
                <!-- UPLOAD BUKTI TRF END -->

                <!-- CAPTCHA START -->
                <div class="g-recaptcha flex justify-center items-center"
                    data-sitekey="6LeQr6IpAAAAAFwL29Ssdz2thuqBv4-r8EWIEi11">
                </div>
                <!-- CAPTCHA END -->

                <!-- BUTTON START -->
                <div class="flex flex-row">

                    <!-- LINK KE LOGIN KARENA MASIH HARUS DI ACC -->
                    <button class="w-full shadow bg-textColor2 py-2 px-4 rounded-full" type="submit" name="submit">
                        <span class="text-textColor font-bold">Sign Up</span>
                    </button>

                </div>
                <!-- BUTTON END -->
            </form>
        </div>

</body>

</html>