<?php
    $jml = $_GET['jml'] ?? 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Soal 1 - Tabel Total</title>
        <style>
            table {
                border-collapse: collapse;
                margin: 20px 0;
                font-family: Arial, sans-serif;
            }
            td {
                border: 1px solid #444;
                padding: 8px 12px;
                text-align: center;
            }
            .total {
                background-color: #f2f2f2;
                font-weight: bold;
                color: #333;
            }
        </style>
    </head>
    <body>
        <?php
            echo "<table>\n";

            for ($a = $jml; $a > 0; $a--) {
                // hitung total tiap baris
                $total = 0;
                for ($b = $a; $b > 0; $b--) {
                    $total += $b;
                }

                // cetak baris total
                echo "<tr><td class='total' colspan='$jml'>Total: $total</td></tr>\n";

                // cetak baris angka
                echo "<tr>";
                    for ($b = $a; $b > 0; $b--) {
                        echo "<td>$b</td>";
                    }
                    
                    // jika ada sisa kolom, gunakan colspan
                    if ($jml - $a > 0) {
                        echo "<td colspan='" . ($jml - $a) . "'></td>";
                    }
                echo "</tr>\n";
            }

            echo "</table>";
        ?>
    </body>
</html>
