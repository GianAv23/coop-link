<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
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

    <div class="relative bg-bgColor w-screen h-screen">

        <!-- ELLIIPSE START -->
        <img class="absolute z-0 top-0 left-0" src="assets/ellipse2.svg" alt="">
        <!-- ELLIIPSE END -->

        <div class="w-screen min-h-screen flex flex-col justify-center px-10 md:px-32 lg:px-60 xl:px-96">

            <!-- HEADER START -->
            <div class="flex flex-col gap-2 mb-8 items-center">
                <!-- LOGO START -->
                <div class="bg-bgLogo/10 rounded-xl px-8 py-4 flex items-center justify-center">
                    <span class="text-white font-bold text-3xl">
                        Coop<span class="text-textColor2">Link</span>
                    </span>
                </div>
                <!-- LOGO END -->
            </div>
            <!-- HEADER END -->

            <!-- FORM START -->
            <form class="z-10 flex flex-col gap-6 mt-8" method="post">
                <!-- BUTTON START -->


                <a href="user/home_user.php"
                    class="flex justify-center bg-textColor2 w-full py-2 rounded-full font-bold text-textColor hover:bg-textColor2/40 hover:text-textColor2">
                    <span>Nasabah</span>
                </a>


                <a href="admin/home_admin.php"
                    class="flex justify-center bg-textColor2 w-full py-2 rounded-full font-bold text-textColor hover:bg-textColor2/40 hover:text-textColor2">
                    <span>Admin</span>
                </a>

                <!-- BUTTON END -->

            </form>
            <!-- FORM END -->
        </div>
    </div>
    <script></script>

</body>

</html>