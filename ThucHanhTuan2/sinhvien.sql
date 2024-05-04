-- Tạo hoặc kiểm tra sự tồn tại của cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS sinhvien;

-- Sử dụng cơ sở dữ liệu vừa tạo
USE sinhvien;

-- Tạo bảng SinhVien
CREATE TABLE IF NOT EXISTS SinhVien (
    MSSV INT PRIMARY KEY AUTO_INCREMENT,
    HoTen VARCHAR(255)
);

-- Tạo bảng MonHoc
CREATE TABLE IF NOT EXISTS MonHoc (
    MaMH INT PRIMARY KEY AUTO_INCREMENT,
    TenMH VARCHAR(255)
);

-- Tạo bảng DangKy
CREATE TABLE IF NOT EXISTS DangKy (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    MSSV INT,
    MaMH INT,
    Ki VARCHAR(10),
    Status VARCHAR(50),
    FOREIGN KEY (MSSV) REFERENCES SinhVien(MSSV),
    FOREIGN KEY (MaMH) REFERENCES MonHoc(MaMH)
);

-- Chèn dữ liệu vào bảng SinhVien
INSERT INTO SinhVien (HoTen) VALUES 
('Nguyễn Văn A'),
('Trần Thị B'),
('Phạm Minh C');

-- Chèn dữ liệu vào bảng MonHoc
INSERT INTO MonHoc (TenMH) VALUES 
('Toán'),
('Văn'),
('Lịch sử');

-- Chèn dữ liệu vào bảng DangKy
INSERT INTO DangKy (MSSV, MaMH, Ki, Status) VALUES 
(1, 1, 'Học kỳ 1', 'Đã đăng ký'),
(2, 2, 'Học kỳ 1', 'Đã đăng ký'),
(3, 3, 'Học kỳ 1', 'Chưa đăng ký');
