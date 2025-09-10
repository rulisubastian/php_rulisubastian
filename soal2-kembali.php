<!DOCTYPE html>
<html>
    <?php
        $step = $_POST['step'] ?? 1;
    ?>
    <head>
        <title>Soal 2</title>
        <style>
            form, .result {
                border: 1px solid #000;
                padding: 20px;
                width: 320px;
                margin: 20px;
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
        <?php if ($step == 1): ?>
            <form method="post">
                <label>Nama Anda :</label>
                <input type="text" name="nama" value="<?= $_POST['nama'] ?? '' ?>" required>
                <br><br>
                <input type="hidden" name="step" value="2">
                <input type="submit" class="btn" value="Submit">
            </form>

        <?php elseif ($step == 2): ?>
            <form method="post">
                <label>Umur Anda :</label>
                <input type="text" name="umur" value="<?= $_POST['umur'] ?? '' ?>" required>
                <br><br>
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="nama" value="<?= htmlspecialchars($_POST['nama']) ?>">
                <input type="submit" class="btn" value="SUBMIT">
            </form>
            <form method="post" style="margin-top:5px;">
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="nama" value="<?= htmlspecialchars($_POST['nama']) ?>">
                <input type="submit" class="btn" value="KEMBALI">
            </form>

        <?php elseif ($step == 3): ?>
            <form method="post">
                <label>Hobi Anda :</label>
                <input type="text" name="hobi" value="<?= $_POST['hobi'] ?? '' ?>" required>
                <br><br>
                <input type="hidden" name="step" value="4">
                <input type="hidden" name="nama" value="<?= htmlspecialchars($_POST['nama']) ?>">
                <input type="hidden" name="umur" value="<?= htmlspecialchars($_POST['umur']) ?>">
                <input type="submit" class="btn" value="SUBMIT">
            </form>
            <form method="post" style="margin-top:5px;">
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="nama" value="<?= htmlspecialchars($_POST['nama']) ?>">
                <input type="hidden" name="umur" value="<?= htmlspecialchars($_POST['umur']) ?>">
                <input type="submit" class="btn" value="KEMBALI">
            </form>

        <?php elseif ($step == 4): ?>
            <div class="result">
                Nama: <?= htmlspecialchars($_POST['nama']) ?><br>
                Umur: <?= htmlspecialchars($_POST['umur']) ?><br>
                Hobi: <?= htmlspecialchars($_POST['hobi']) ?><br>
            </div>
            <form method="post" style="margin-top:5px;">
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="nama" value="<?= htmlspecialchars($_POST['nama']) ?>">
                <input type="hidden" name="umur" value="<?= htmlspecialchars($_POST['umur']) ?>">
                <input type="hidden" name="hobi" value="<?= htmlspecialchars($_POST['hobi']) ?>">
                <input type="submit" class="btn" value="KEMBALI">
            </form>
        <?php endif; ?>
    </body>
</html>
