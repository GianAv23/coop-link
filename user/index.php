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
        <div class="user mt-4 ms-4 sm:ms-0 sm:mt-0">Hi, Xiao Dylan LTD.</div>
        <div class="pokok flex justify-end me-4 mt-10">
            <div class="flex flex-col text-end">
                <div class="head text-sm ">
                    <span>Tabungan</span>
                    <span class="font-bold">Pokok</span>
                </div>
                <div class="amount text-2xl mt-2">Rp 4.000.000</div>
            </div>
        </div>
        <div class="wajib rounded-xl border mt-4 mx-4">
            <div class="brand font-bold text-xs mt-4 ms-4">
                <span>Coop</span><span style="color: #9FED81;">Link</span>
            </div>
            <div class=" flex flex-col text-end mt-2 me-4 mb-3">
                <div class="head text-sm">
                    <span>Tabungan</span>
                    <span class="font-bold">Wajib</span>
                </div>
                <div class="amount mt-2">Rp 10.000.000</div>
            </div>
        </div>
        <div class="sukarela rounded-xl border mt-4 mx-4">
            <div class="brand font-bold text-xs mt-4 ms-4">
                <span>Coop</span><span style="color: #9FED81;">Link</span>
            </div>
            <div class=" flex flex-col text-end mt-2 me-4 mb-3">
                <div class="head text-sm">
                    <span>Tabungan</span>
                    <span class="font-bold">Sukarela</span>
                </div>
                <div class="amount mt-2">Rp 10.000.000</div>
            </div>
        </div>
        <div class="balance rounded-xl mx-4 my-4 flex flex-col">
            <div class="detail text-xs mt-5 mx-4">
                <span class="font-bold">Tabungan Wajib</span><span> dibayarkan setiap 1 bulan sekali sebesar Rp
                    500.000</span><br>
                <span class="font-bold">Tabungan Sukarela</span><span> membuat anda menjadi banyak duit ( jika duit anda
                    sudah banyak
                    )</span>
            </div>
            <button class="text-black font-bold rounded-2xl p-2 mt-8 mb-4 mx-4">Add Balance</button>
        </div>
        <footer
            class="text-center text-xs rounded-full border border-gray-800 mx-4 mb-2 p-1 text-gray-800 absolute inset-x-0 bottom-0">
            <span>© 2024 | UTS Web Programming LEC</span>
        </footer>
    </div>

</body>

</html>