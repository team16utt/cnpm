<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Quản lý lớp</h3>
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
                            <h5 class="form-title"><span>Thông tin lớp</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Tên lớp</label>
                                <input type="text" class="form-control" value="<?= $class['ten_lop'] ?>" name="ten_lop">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Giảng viên</label>
                                <select class="form-control" name="gvcn_id">
                                    <?php if (isset($teachers)) : ?>
                                        <?php foreach ($teachers as $item) : ?>
                                            <option value="<?= $item['id'] ?>" <?php if ($item['id'] == $class['gvcn_id']) echo 'selected'; ?>><?= $item['ho_ten'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ngành</label>
                                <select class="form-control" name="khoa_id">
                                    <?php if (isset($departments)) : ?>
                                        <?php foreach ($departments as $item) : ?>
                                            <option value="<?= $item['id'] ?>" <?php if ($item['id'] == $class['khoa_id']) echo 'selected'; ?>><?= $item['ten_khoa'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
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