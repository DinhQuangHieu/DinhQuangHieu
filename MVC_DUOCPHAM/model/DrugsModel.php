<?php
require_once 'config/db.php';
class DrugsModal{
    private $id;
    private $name;
    private $type;
    private $barcode;
    private $dose;

    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM drugs";
        $result = mysqli_query($conn, $sql);
        $arr_bd = [];
        if(mysqli_num_rows($result)>0){
            $arr_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_bd;
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO drugs (name, type, barcode, dose)
        VALUES ('{$param['name']}', '{$param['type']}', '{$param['barcode']}', '{$param['dose']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
    public function getBDById($id = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM drugs WHERE id={$id}";
        $results = mysqli_query($connection, $querySelect);
        $bdArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $bdArr = $bds[0];
        }
        $this->closeDb($connection);

        return $bdArr;
    }


    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function update($bd = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE drugs 
        SET name = '{$bd['name']}', type = '{$bd['type']}', barcode = '{$bd['barcode']}', dose = '{$bd['dose']}' WHERE id = {$bd['id']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM drugs WHERE id = {$id}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}