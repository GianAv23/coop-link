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
    <div class="w-screen min-h-screen p-16 bg-bgColor">

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

        <form class="flex flex-col gap-4 md:px-44 lg:px-64 xl:px-80" method="post" enctype="multipart/form-data">

            <div>
                <input type="hidden" name="id" value="<?= $userkontak['idKontak'] ?>">
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
                        class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" value="">
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
                    <input class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" placeholder="Enter your email"
                        id="email" type="text" name="email" value="">
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
                        class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData" value="">
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

                    <input type="date" name="address" id="alamat" placeholder="Enter your email"
                        class="rounded-lg w-full bg-bgLogo/20 py-3 px-4 text-cardData">
                </div>
            </div>
            <!-- DATE OF BIRTH -->

            <!-- BUTTON START -->
            <div class="flex flex-row gap-2 mt-2">

                <a href="index.php"
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

</body>

</html>