<?php include 'connection-sql.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Soal 3 - Listing & Search</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 30px;
                background: #f9f9f9;
            }
            h2 {
                color: #333;
            }
            table {
                border-collapse: collapse;
                margin: 20px 0;
                width: 100%;
                background: #fff;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            }
            th, td {
                border: 1px solid #ddd;
                padding: 10px 15px;
                text-align: left;
            }
            th {
                background-color: #007BFF;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f6f6f6;
            }
            tr:hover {
                background-color: #f1f1f1;
            }
            form {
                background: #fff;
                padding: 20px;
                margin-top: 20px;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
                width: 350px;
            }
            label {
                display: inline-block;
                width: 70px;
                font-weight: bold;
            }
            input[type="text"] {
                width: 200px;
                padding: 6px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            input[type="submit"] {
                padding: 8px 20px;
                background: #007BFF;
                border: none;
                border-radius: 4px;
                color: white;
                font-weight: bold;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background: #0056b3;
            }
            .pagination {
                margin: 20px 0;
            }
            .pagination a {
                display: inline-block;
                padding: 8px 12px;
                margin: 0 4px;
                border: 1px solid #007BFF;
                border-radius: 4px;
                text-decoration: none;
                color: #007BFF;
            }
            .pagination a.active {
                background: #007BFF;
                color: #fff;
            }
            .pagination a:hover {
                background: #0056b3;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <h2>Daftar Person & Hobi</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Hobi</th>
            </tr>
            <?php if (count($data) > 0): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td>
                            <?php if (!empty($row['nama'])): ?>
                                <?= htmlspecialchars($row['nama']) ?>
                            <?php else: ?>
                                <em style="color:#888;">-</em>
                            <?php endif; ?>
                        <td>
                            <?php if (!empty($row['alamat'])): ?>
                                <?= htmlspecialchars($row['alamat']) ?>
                            <?php else: ?>
                                <em style="color:#888;">-</em>
                            <?php endif; ?>
                        <td>
                            <?php if (!empty($row['hobi'])): ?>
                                <?= htmlspecialchars(implode(", ", $row['hobi'])) ?>
                            <?php else: ?>
                                <em style="color:#888;">Tidak ada hobi</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center">Data tidak ditemukan</td>
                </tr>
            <?php endif; ?>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>&nama=<?= urlencode($nama) ?>&alamat=<?= urlencode($alamat) ?>&hobi=<?= urlencode($hobi) ?>"
                class="<?= ($i == $page) ? 'active' : '' ?>">
                <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
        <form method="get">
            <label>Nama :</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>
            <label>Alamat :</label>
            <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br>
            <label>Hobi :</label>
            <input type="text" name="hobi" value="<?= htmlspecialchars($hobi) ?>"><br>
            <input type="submit" value="SEARCH">
        </form>
    </body>
</html>
