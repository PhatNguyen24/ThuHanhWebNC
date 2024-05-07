<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Display</title>
</head>
<body>
    <h1>File Upload and Display</h1>
    
    <!-- Form để tải lên các tệp tin -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <h2>Uploaded Files</h2>
    <table border="1">
        <tr>
            <th><a href="?sort=name">File Name</a></th>
            <th><a href="?sort=type">File Type</a></th>
            <th><a href="?sort=date">Upload Date</a></th>
            <th>File Size (Bytes)</th>
        </tr>
        <?php
            // Thư mục lưu trữ tệp tin đã tải lên
            $uploadDirectory = "uploads/";

            // Kiểm tra nếu thư mục không tồn tại, tạo mới
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Xử lý yêu cầu sắp xếp
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
            $sortColumn = '';
            switch ($sort) {
                case 'name':
                    $sortColumn = 'name';
                    break;
                case 'type':
                    $sortColumn = 'type';
                    break;
                case 'date':
                    $sortColumn = 'date';
                    break;
                default:
                    $sortColumn = 'name';
                    break;
            }

            // Lấy danh sách các tệp tin đã tải lên
            $files = glob($uploadDirectory . '*');
            
            // Sắp xếp các tệp tin theo cột được chọn
            usort($files, function ($a, $b) use ($sortColumn) {
                if ($sortColumn == 'date') {
                    return filemtime($a) - filemtime($b);
                } else {
                    return strcmp($a, $b);
                }
            });

            // Hiển thị thông tin của các tệp tin đã tải lên
            foreach ($files as $file) {
                echo "<tr>";
                echo "<td>" . basename($file) . "</td>";
                echo "<td>" . mime_content_type($file) . "</td>";
                echo "<td>" . date("Y-m-d H:i:s", filemtime($file)) . "</td>";
                echo "<td>" . filesize($file) . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
