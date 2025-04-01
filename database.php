<?php
class DB {
    private $host = "localhost"; // Địa chỉ máy chủ
    private $db_name = "qlbanhang"; // Tên cơ sở dữ liệu
    private $username = "root"; // Tên người dùng
    private $password = ""; // Mật khẩu
    private $conn; // Biến lưu trữ kết nối

    // Phương thức kết nối
    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Báo lỗi dưới dạng Exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Lấy dữ liệu dưới dạng mảng kết hợp
                PDO::ATTR_EMULATE_PREPARES => false, // Tắt giả lập prepared statements
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }

        return $this->conn;
    }
    public function close(){
        echo 'Đóng kết nối.';
        $this->conn=null;
    }
}
?>
