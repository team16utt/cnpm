<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Quản lý giảng viên</h3>
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
                            <h5 class="form-title"><span>Thông tin giảng viên</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" value="<?= $teacher['ho_ten'] ?>" name="ho_ten">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control" name="chuc_vu">
                                    <option value="0">Administrator</option>
                                    <option value="1">Giảng viên thường</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mã giảng viên</label>
                                <input type="text" class="form-control" value="<?= $teacher['mgv'] ?>" name="mgv" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" class="form-control" value="<?= $teacher['ngay_sinh'] ?>" name="ngay_sinh">
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
                                <label>Điện thoại</label>
                                <input type="text" class="form-control" value="<?= $teacher['sdt'] ?>" name="sdt" />
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6">
                            <div class="form-group">
                                <label>Quê quán</label>
                                <textarea class="form-control" name="que_quan"><?= $teacher['que_quan'] ?></textarea>
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control" name="anh_bia" />
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="form-title"><span>Thông tin tài khoản</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" value="<?= $teacher['ten_dang_nhap'] ?>" name="ten_dang_nhap">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?= $teacher['email'] ?>" name="email">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" value="<?= $teacher['mat_khau'] ?>" name="mat_khau">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" value="<?= $teacher['mat_khau'] ?>" name="re_mat_khau">
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