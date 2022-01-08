<?php

require_once 'model/DrugsModel.php';
class DrugsController{
    function index(){
        $bdModal = new DrugsModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/Drugs/index.php';
    }
    function admin(){
        $bdModal = new DrugsModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/Drugs/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $type = $_POST['type'];
            $barcode = $_POST['barcode'];
            $dose = $_POST['dose'];
            if(empty($name) ||  empty($type) || empty($barcode) || empty($dose)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $bdModal = new DrugsModal();
                $bdArr = [
                    'name' => $name,
                    'type' => $type,
                    'barcode' => $barcode,
                    'dose' => $dose,
                ];
                $isAdd = $bdModal->insert($bdArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=drugs&action=admin&tt=$TT");
                exit();
            }

        }
        require_once 'view/Drugs/add.php';
    }
    function edit(){
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=drugs&action=admin");
            return;
        }
        if (!is_numeric($_GET['id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=drugs&action=admin");
            return;
        }
        $id = $_GET['id'];
        $bdModal = new DrugsModal();
        $BD = $bdModal->getBDById($id);
        $error = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $barcode = $_POST['barcode'];
            $dose = $_POST['dose'];
            if(empty($name) ||  empty($type) || empty($barcode) || empty($dose)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                $bdArr = [
                    'id' => $id,
                    'name' => $name,
                    'type' => $type,
                    'barcode' => $barcode,
                    'dose' => $dose,
                ];
                $isAdd = $bdModal->update($bdArr);
                if ($isAdd) {
                    $TT=  "Sửa thành công";
                }
                else {
                    $TT= "Sửa thất bại";
                }
                header("Location: index.php?controller=drugs&action=admin&tt=$TT");
                exit();
            }
        }
        require_once 'view/drugs/edit.php';
    }
    function delete(){
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=drugs&action=index");
            exit();
        }
        $bdModal = new DrugsModal();
        $isDelete = $bdModal->delete($id);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $TT=  "Xóa bản ghi thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=drugs&action=admin&tt=$TT");
        exit();
    }
}
