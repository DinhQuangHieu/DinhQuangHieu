<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Nhập thông tin người hiến máu</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Tên thuốc</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Loại thuốc</label>
                        <input type="text" class="form-control" name="type" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Mã vạch</label>
                        <input type="text" class="form-control" name="barcode" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Liều lượng</label>
                        <input type="text" class="form-control" name="dose" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>