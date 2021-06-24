<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Quản lý khoa</h3>
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
                            <h5 class="form-title"><span>Thông tin khoa</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Tên khoa</label>
                                <input type="text" class="form-control" value="<?= $dpm['ten_khoa'] ?>" name="ten_khoa">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Hệ đào tạo</label>
                                <input type="text" class="form-control" value="<?= $dpm['he_dao_tao'] ?>" name="he_dao_tao">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ngành</label>
                                <select class="form-control" name="nganh_id">
                                    <?php if (isset($majors)) : ?>
                                        <?php foreach ($majors as $item) : ?>
                                            <option value="<?= $item['id'] ?>" <?php if ($item['id'] == $dpm['nganh_id']) echo 'selected'; ?>><?= $item['ten_nganh'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Thời gian</label>
                                <input type="datetime-local" class="form-control" value="<?= $dpm['thoi_gian'] ?>" name="thoi_gian">
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