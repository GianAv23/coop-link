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
    <div class="bg-bgBlack w-screen min-h-screen px-10 overflow-hidden">

        <!-- NAVBAR START -->
        <div class="flex flex-row px-10 justify-between pt-10">
            <div class="flex items-center justify-start">
                <span class="text-white font-semibold text-xl">
                    Coop<span class="text-textColor2">Link</span>
                </span>
            </div>

            <div class="rounded-full border border-bgWhite py-1 px-1 flex items-center justify-center">

                <span class="text-white font-semibold ml-5">
                    Admin
                </span>

                <div class="ml-3 w-7 h-7 rounded-full border border-bgWhite bg-cover bg-center"
                    style="background-image: url(assets/test.jpg);">
                </div>


            </div>
        </div>
        <!-- NAVBAR END -->

        <!-- BODY START -->
        <div class="flex flex-row justify-between">
            <div class="w-full h-full bg-bgBlack rounded-3xl border border-textColor2 m-8">
                <div class="flex flex-col p-6 gap-4 shrink-0">
                    <div class="mb-3 flex items-center gap-4">
                        <!-- untuk kembali ke home -->
                        <button class="rounded-full w-8 h-8 bg-bgLogo p-2 flex items-center justify-center"><span
                                class="font-bold text-xl">
                                < </span></button>
                        <span class="font-normal text-bgWhite text-lg lg:text-2xl">User Payment
                            <span class="text-textColor2 font-bold">Verification</span></span>
                    </div>


                    <div class="h-[600px] flex-grow overflow-y-scroll flex flex-col gap-4">

                        <!-- INI YANG DI LOOP PID -->
                        <div
                            class="bg-cardData/50 rounded-3xl border border-bgWhite flex flex-col p-4 backdrop-blur-md">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-start">

                                <div class="flex flex-col gap-0">
                                    <span class="font-semibold text-bgWhite text-lg">
                                        value nama nasabah
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm text-textColor2">
                                        value email nasabah
                                    </span>
                                    <span class="font-normal text-bgWhite text-sm">
                                        value tanggal pembayaran | value alamat
                                    </span>
                                    <span class="font-semibold text-bgWhite text-lg pt-4">
                                        value nominal pembayaran
                                    </span>
                                </div>

                                <div class="mt-6 flex flex-row justify-between md:gap-10 md:pb-4">
                                    <button class="rounded-xl bg-bgColor border border-textColor2 px-4 py-1">
                                        <span class="font-medium text-textColor2 text-xs md:text-sm">Transfer
                                            Proof</span>
                                    </button>

                                    <div class="flex flex-row gap-2">
                                        <button class="rounded-xl bg-bgLogo px-4 py-1">
                                            <span class="font-medium text-bgColor text-xs md:text-sm">Accept</span>
                                        </button>


                                        <button class="rounded-xl border border-textColor2 px-4 py-1">
                                            <span class="font-medium text-bgWhite text-xs md:text-sm">Reject</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
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