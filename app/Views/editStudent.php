<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Quản lý sinh viên</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
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
                            <h5 class="form-title"><span>Thông tin học sinh</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" value="<?= $student['ho_ten'] ?>" name="ho_ten">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mã sinh viên</label>
                                <input type="text" class="form-control" value="<?= $student['msv'] ?>" name="msv">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" value="<?= $student['ngay_sinh'] ?>" name="ngay_sinh">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control" name="gioi_tinh">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Lớp</label>
                                <select class="form-control" name="ma_lop">
                                    <?php if (isset($classes)) : ?>
                                        <?php foreach ($classes as $item) : ?>
                                            <option value="<?= $item['id'] ?>" <?php if ($item['id'] == $student['ma_lop']) echo 'selected'; ?>><?= $item['ten_lop'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ngày vào trường</label>
                                <div>
                                    <input type="date" class="form-control" value="<?= $student['khoa_vao_truong'] ?>" name="khoa_vao_truong">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" value="<?= $student['sdt'] ?>" name="sdt" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?= $student['email'] ?>" name="email" />
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6">
                            <div class="form-group">
                                <label>Khoá học</label>
                                <input type="text" class="form-control" value="<?= $student['khoa_hoc'] ?>" name="khoa_hoc" />
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6">
                            <div class="form-group">
                                <label>Quê quán</label>
                                <textarea class="form-control" name="que_quan"><?= $student['que_quan'] ?></textarea>
                            </div>
                        </div>

                        <div class=" col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control" name="anh_bia" />
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