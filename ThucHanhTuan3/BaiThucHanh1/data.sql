CREATE DATABASE IF NOT EXISTS login;
USE login;

CREATE TABLE login (
    ten_dang_nhap VARCHAR(50),
    mat_khau VARCHAR(50)
);


insert into login(ten_dang_nhap, mat_khau) value(
    'hoang khuyen', '123456'
)