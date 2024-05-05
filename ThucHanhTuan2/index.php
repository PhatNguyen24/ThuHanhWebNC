<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sinhvien";

    // Tạo kết nối
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        $error_message = "Connection failed: " . $conn->connect_error;
        echo $error_message; // Hiển thị thông điệp lỗi trực tiếp trên màn hình
        error_log($error_message, 0); // Ghi thông điệp lỗi vào log
        exit(); // Dừng việc thực thi mã tiếp theo
    }

    // Tiếp tục thực thi mã tiếp theo nếu kết nối thành công
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td{
            border: 1px solid #ccc;
            padding: 8px;
        }
        th{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>MSSV</th>
            <th>Họ Tên</th>
            <th>Kỳ</th>
            <th>Đăng ký</th>
        </tr>
        <?php
            
            // Câu truy vấn SQL
            $sql = "SELECT SinhVien.MSSV, SinhVien.HoTen, DangKy.Ki, DangKy.Status 
                    FROM SinhVien INNER JOIN DangKy ON SinhVien.MSSV = DangKy.MSSV";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['MSSV'] . "</td>";
                        echo "<td>" . $row['HoTen'] . "</td>";
                        echo "<td>" . $row['Ki'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
            } else {
                $error_message = "Query failed: " . mysqli_error($conn);
                echo $error_message; // Hiển thị thông điệp lỗi trực tiếp trên màn hình
                error_log($error_message, 0); // Ghi thông điệp lỗi vào log
            }

            // Đóng kết nối
            $conn->close();
        ?>
    </table>
</body>
</html>
