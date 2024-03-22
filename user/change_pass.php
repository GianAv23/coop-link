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
    <div class="w-screen min-h-screen bg-bgColor">

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

            <form class="flex flex-col gap-6 md:px-44 lg:px-64 xl:px-80" method="post">

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
                <div class="mt-6">
                    <button type="submit" name="submit" class="bg-textColor2 w-full py-2 rounded-full"><span
                            class="text-textColor font-bold">Change Password</span>
                    </button>
                </div>
                <!-- BUTTON END -->

            </form>

        </div>

</body>

</html>