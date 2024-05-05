<?php
    $uploadDirectory = "uploads/";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetFile = $uploadDirectory . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        // Kiểm tra nếu tệp đã tồn tại
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        // Kiểm tra kích thước tệp
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Cho phép các loại tệp cụ thể
        if($fileType != "txt" && $fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
            echo "Sorry, only TXT, PDF, DOC, DOCX files are allowed.";
            $uploadOk = 0;
        }
        
        // Kiểm tra nếu $uploadOk = 0
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // Nếu mọi thứ đều ổn, thử tải lên tệp
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>
