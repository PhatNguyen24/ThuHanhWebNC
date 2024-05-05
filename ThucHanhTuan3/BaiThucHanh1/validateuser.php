<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $username_input = $_POST["username"];
        $password_input = $_POST["password"];

        // Kiểm tra thông tin đăng nhập
        $sql = "SELECT * FROM login WHERE ten_dang_nhap='$username_input' AND mat_khau='$password_input'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công, chuyển hướng hoặc thực hiện các thao tác khác
            echo "Login successful!";
            echo "Hello, ".$username_input."! <br>";
            echo "<form action='logout.php' method='post'>
                  <input type='submit' name='logout' value='Logout'>
              </form>";
        } else {
            // Đăng nhập không thành công, quay lại trang đăng nhập
            echo "<script>
                    alert('Invalid username or password!');
                    window.location.href = 'login.html';
                </script>";
        }
    }
    mysqli_close($conn);
?>

