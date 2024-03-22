<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="content rounded-xl h-screen w-screen border-2 text-white">
        <div class="user mt-4 ms-4 sm:ms-10 sm:mt-10 sm:text-3xl">Hi, Xiao Dylan LTD.</div>
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
                <span class="font-bold">Tabungan Sukarela</span><span> membuat anda menjadi banyak duit ( jika duit anda
                    sudah banyak
                    )</span>
            </div>
            <button class="text-black font-bold rounded-2xl p-2 mt-8 mb-4 mx-4 sm:my-6 sm:px-20 sm:py-3 sm:ms-auto">Add
                Balance</button>
        </div>
        <footer
            class="text-center text-xs sm:text-lg rounded-full border border-gray-800 mt-4 mx-4 mb-2 p-1 text-gray-800">
            <span>© 2024 | UTS Web Programming LEC</span>
        </footer>
    </div>

</body>

</html>