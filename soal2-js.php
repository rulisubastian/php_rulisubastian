<!DOCTYPE html>
    <html>
        <head>
            <title>Soal 2 - Multi Step Form</title>
            <style>
                .step {
                display: none;
                border: 1px solid #000;
                padding: 20px;
                width: 320px;
                margin: 20px;
                }
                .step.active {
                display: block;
                }
                label {
                display: inline-block;
                width: 100px;
                font-weight: bold;
                }
                input[type="text"] {
                width: 120px;
                }
                .btn {
                margin-top: 15px;
                font-size: 16px;
                padding: 5px 15px;
                }
            </style>
        </head>
        <body>
            <!-- Step 1 -->
            <div class="step active" id="step1">
                <label>Nama Anda :</label>
                <input type="text" id="nama" required>
                <br><br>
                <button class="btn" onclick="nextStep(2)">SUBMIT</button>
            </div>

            <!-- Step 2 -->
            <div class="step" id="step2">
                <label>Umur Anda :</label>
                <input type="text" id="umur" required>
                <br><br>
                <button class="btn" onclick="prevStep(1)">KEMBALI</button>
                <button class="btn" onclick="nextStep(3)">SUBMIT</button>
            </div>

            <!-- Step 3 -->
            <div class="step" id="step3">
                <label>Hobi Anda :</label>
                <input type="text" id="hobi" required>
                <br><br>
                <button class="btn" onclick="prevStep(2)">KEMBALI</button>
                <button class="btn" onclick="nextStep(4)">SUBMIT</button>
            </div>

            <!-- Step 4 -->
            <div class="step" id="step4">

            <div style="border:1px solid #000; padding:20px;">
                <p><b>Nama:</b> <span id="outNama"></span></p>
                <p><b>Umur:</b> <span id="outUmur"></span></p>
                <p><b>Hobi:</b> <span id="outHobi"></span></p>
            </div>
            <br>
            <button class="btn" onclick="prevStep(3)">KEMBALI</button>
        </div>

        <script>
            function nextStep(step) {
                // validasi input sebelum lanjut
                if (step === 2 && document.getElementById("nama").value.trim() === "") {
                    alert("Nama harus diisi!");
                    return;
                }
                if (step === 3 && document.getElementById("umur").value.trim() === "") {
                    alert("Umur harus diisi!");
                    return;
                }
                if (step === 4 && document.getElementById("hobi").value.trim() === "") {
                    alert("Hobi harus diisi!");
                    return;
                }

                // sembunyikan semua step
                document.querySelectorAll(".step").forEach(s => s.classList.remove("active"));

                // tampilkan step yg dipilih
                document.getElementById("step" + step).classList.add("active");

                // jika step terakhir, tampilkan hasil
                if (step === 4) {
                    document.getElementById("outNama").textContent = document.getElementById("nama").value;
                    document.getElementById("outUmur").textContent = document.getElementById("umur").value;
                    document.getElementById("outHobi").textContent = document.getElementById("hobi").value;
                }
            }

            function prevStep(step) {
                // sembunyikan semua step
                document.querySelectorAll(".step").forEach(s => s.classList.remove("active"));
                // tampilkan step sebelumnya
                document.getElementById("step" + step).classList.add("active");
            }
        </script>
    </body>
</html>
