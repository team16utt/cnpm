<?= $this->extend('_layout') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="about-info">
                    <h4>Thông tin giảng viên</h4>

                    <div class="media mt-3">
                        <?php if (isset($teacher)) : ?>
                            <img src="<?php if ($teacher['anh_bia'] == null || $teacher['anh_bia'] == '/public/img/avatar/') echo base_url() . '/public/img/avatar/user.png';
                                        else echo base_url() . $teacher['anh_bia'];
                                        ?>" class="mr-3" alt="...">
                            <div class="media-body">
                                <ul>
                                    <li>
                                        <span class="title-span">Họ và tên : </span>
                                        <span class="info-span"><?= $teacher['ho_ten'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title-span">Chức vụ : </span>
                                        <span class="info-span">
                                            <?php if ($item['chuc_vu'] == '0') echo 'Administrator';
                                            else echo 'Giảng viên'; ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title-span">Điện thoại : </span>
                                        <span class="info-span"><?= $teacher['sdt'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title-span">Email : </span>
                                        <span class="info-span"><?= $teacher['email'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title-span">Giới tính : </span>
                                        <span class="info-span"><?= $teacher['gioi_tinh'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title-span">Ngày sinh : </span>
                                        <span class="info-span"><?= $teacher['ngay_sinh'] ?></span>
                                    </li>
                                    <li>
                                        <span class="title-span">Quê quán : </span>
                                        <span class="info-span"><?= $teacher['que_quan'] ?></span>
                                    </li>
                                </ul>
                            </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>


    </div>
</div>
<?= $this->endSection() ?>