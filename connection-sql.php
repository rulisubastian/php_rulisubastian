<?php
    $host = "localhost";
    $user = "root"; 
    $pass = "";
    $db   = "testdb";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $nama   = $_GET['nama'] ?? '';
    $alamat = $_GET['alamat'] ?? '';
    $hobi   = $_GET['hobi'] ?? '';
    $page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit  = 10;
    $offset = ($page - 1) * $limit;

    $countSql = "
        SELECT COUNT(DISTINCT p.id) as total
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id
        WHERE 1=1
    ";

    if ($nama != '') {
        $countSql .= " AND p.nama LIKE '%" . $conn->real_escape_string($nama) . "%'";
    }
    if ($alamat != '') {
        $countSql .= " AND p.alamat LIKE '%" . $conn->real_escape_string($alamat) . "%'";
    }
    if ($hobi != '') {
        $countSql .= " AND h.hobi LIKE '%" . $conn->real_escape_string($hobi) . "%'";
    }

    $countResult = $conn->query($countSql);
    $totalData = $countResult->fetch_assoc()['total'];
    $totalPages = ceil($totalData / $limit);

    $sql = "
        SELECT p.id, p.nama, p.alamat, h.hobi, GROUP_CONCAT(h.hobi SEPARATOR ', ') as hobi
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id
        WHERE 1=1
    ";

    if ($nama != '') {
        $sql .= " AND p.nama LIKE '%" . $conn->real_escape_string($nama) . "%'";
    }
    if ($alamat != '') {
        $sql .= " AND p.alamat LIKE '%" . $conn->real_escape_string($alamat) . "%'";
    }
    if ($hobi != '') {
        $sql .= " AND h.hobi LIKE '%" . $conn->real_escape_string($hobi) . "%'";
    }

    $sql .= " GROUP BY p.id ORDER BY p.id LIMIT $limit OFFSET $offset";

    $result = $conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        if (!isset($data[$id])) {
            $data[$id] = [
                'nama' => $row['nama'],
                'alamat' => $row['alamat'],
                'hobi' => []
            ];
        }
        if ($row['hobi']) {
            $data[$id]['hobi'][] = $row['hobi'];
        }
}
?>