<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
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

    <div class="w-screen min-h-screen px-10 pb-10">

        <!-- NAVBAR START -->
        <div class="sticky top-0 bg-black/30 backdrop-blur-md flex flex-row px-4 justify-between py-5 my-4">

            <!-- PROFIL BUTTON START -->
            <div class="mt-1 p-3 absolute max-h-0 right-0 top-14" id="subModal" style="display:none ;">

                <div class="modalProfile bg-bgLogo backdrop-blur-lg rounded-xl p-4 items-center">
                    <form class="flex flex-col gap-4" method="post">
                        <div class="flex flex-col gap-2 items-start">
                            <div class="rounded-full w-12 h-12 bg-white bg-center bg-cover"
                                style="background-image: url(<?= "foto path nasabah pid"?>);">
                            </div>

                            <span class="font-semibold text-bgColor">value nama nasabah</span>
                        </div>

                        <button class="flex flex-row justify-between">
                            <span class="text-bgColor">View Profile</span>
                            <span class="text-bgColor">></span>
                        </button>

                        <button class="flex flex-row justify-between">
                            <span class="text-bgColor">Change Password</span>
                            <span class="text-bgColor">></span>
                        </button>

                        <button class="bg-bgColor/80 rounded-full border-2 border-dashed border-cardData/50 px-3 py-2"
                            type="submit" name="logout">
                            <span class="text-bgWhite font-semibold text-sm">Log
                                Out</span></button>
                    </form>
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
                    value nama nasabah
                </span>
                <div class="ml-3 w-7 h-7 rounded-full border border-bgWhite bg-cover bg-center"
                    style="background-image: url(<?= "foto path nasabah pid"?>);">
                </div>
            </div>
        </div>
        <!-- NAVBAR END -->

        <!-- CONTENT START -->

        <div class="content rounded-xl border-2 text-white">

            <div class="flex flex-row justify-between items-center">
                <div class="user mt-4 ms-4 sm:ms-10 sm:mt-10 sm:text-3xl">Hi, Xiao Dylan LTD.</div>
                <button
                    class="rounded-full border border-bgWhite px-4 mt-4 me-4 sm:ms-10 sm:mt-10 sm:text-3xl">History</button>
            </div>

            <div class="pokok flex justify-end me-4 mt-10 sm:mt-3 sm:me-10">
                <div class="flex flex-col text-end">
                    <div class="head text-sm sm:text-2xl">
                        <span>Tabungan</span>
                        <span class="font-bold">Pokok</span>
                    </div>
                    <div class="amount text-2xl sm:text-7xl sm:font-bold mt-2">Rp 4.000.000</div>
                </div>
            </div>
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
                        <div class="amount mt-2 sm:mt-0 sm:font-bold">Rp 10.000.000</div>
                    </div>
                </div>
                <div class="sukarela rounded-xl border mt-4 mx-4 sm:w-full">
                    <div class="brand font-bold text-xs sm:text-lg mt-4 ms-4 sm:mt-8 sm:mx-8">
                        <span>Coop</span><span style="color: #9FED81;">Link</span>
                    </div>
                    <div class=" flex flex-col text-end mt-2 me-4 mb-3 sm:me-8 sm:mb-5 sm:mt-5">
                        <div class="head text-sm sm:text-2xl">
                            <span>Tabungan</span>
                            <span class="font-bold">Sukarela</span>
                        </div>
                        <div class="amount mt-2 sm:mt-0 sm:font-bold">Rp 10.000.000</div>
                    </div>
                </div>
            </div>
            <div class="balance rounded-xl mx-4 my-4 sm:my-6 flex flex-col sm:flex-row">
                <div class="detail text-xs sm:text-lg mt-5 mx-4 sm:my-6">
                    <span class="font-bold">Tabungan Wajib</span><span> dibayarkan setiap 1 bulan sekali sebesar Rp
                        500.000</span><br>
                    <span class="font-bold">Tabungan Sukarela</span><span> membuat anda menjadi banyak duit ( jika duit
                        anda
                        sudah banyak
                        )</span>
                </div>
                <button
                    class="text-black font-bold rounded-2xl p-2 mb-8 mt-8 mx-4 sm:my-6 sm:px-20 sm:py-3 sm:ms-auto">Add
                    Balance
                </button>
            </div>


            <!-- <footer
                class="text-center text-xs sm:text-lg rounded-full border border-gray-800 mt-4 mx-4 mb-2 p-1 text-gray-800">
                <span>© 2024 | UTS Web Programming LEC</span>
            </footer> -->
        </div>

        <!-- CONTENT END -->
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