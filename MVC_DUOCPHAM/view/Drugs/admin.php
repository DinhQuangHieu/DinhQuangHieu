<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div class="">
                <p><?php echo isset($_GET['tt']) ? $_GET['tt'] : ''?></p>
            </div>
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <h3>He Thong Quan Ly Duoc Pham</h3>
            </div>
            <div class="col-md-12 mb-3">
                <a href="index.php?controller=drugs&action=add"><button class="btn btn-primary">Thêm thuốc</button></a>
            </div>
            <div class="col-md-12 ms-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã thuốc</th>
                            <th scope="col">Tên thuốc</th>
                            <th scope="col">Loại thuốc</th>
                            <th scope="col">Mã vạch</th>
                            <th scope="col">Liều lượng</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($bdonor as $bd) {
                            $urlEdit =
                            "index.php?controller=drugs&action=edit&id=" . $bd['id'];
                            $urlDelete =
                            "index.php?controller=drugs&action=delete&id=" . $bd['id'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $bd['id'] ?></th>
                                <td><?php echo $bd['name'] ?></td>
                                <td><?php echo $bd['type'] ?></td>
                                <td><?php echo $bd['barcode'] ?></td>
                                <td><?php echo $bd['dose'] ?></td>
                                <td><a href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo $urlDelete ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>