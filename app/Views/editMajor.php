<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Quản lý ngành</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-6">
                            <?php if ($message == "fail") : ?>
                                <div class="alert alert-danger">
                                    <strong>Không thành công !</strong> Đã xảy ra lỗi!!!
                                    <?php if ($error) : ?>
                                        <?php foreach ($error as $item) : ?>
                                            <li><?= $item ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <h5 class="form-title"><span>Thông tin ngành</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Tên ngành</label>
                                <input type="text" class="form-control" value="<?= $major['ten_nganh'] ?>" name="ten_nganh">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>