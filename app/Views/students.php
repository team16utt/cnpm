<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Quản lý sinh viên</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý sinh viên</li>
            </ul>
        </div>
        <div class="col-auto text-right float-right ml-auto">

            <a href="<?= base_url() ?>/student/editstudent" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
    <div class="col-sm-12">

        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0 datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lớp</th>
                                <th>Họ và tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Quê quán</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($students)) : ?>
                                <?php foreach ($students as $item) : ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['ten_lop'] ?></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="<?= base_url() ?>/student/studentDetail?id=<?= $item['id'] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php if ($item['anh_bia'] == null || $item['anh_bia'] == '/public/img/avatar/') echo base_url() . '/public/img/avatar/user.png';
                                                                                                                                                                                                    else echo base_url() . $item['anh_bia'];
                                                                                                                                                                                                    ?>" alt="User Image"></a>
                                                <a href="<?= base_url() ?>/student/studentDetail?id=<?= $item['id'] ?>"><?= $item['ho_ten'] ?></a>
                                            </h2>
                                        </td>
                                        <td><?= $item['gioi_tinh'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($item['ngay_sinh']))  ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['sdt'] ?></td>
                                        <td><?= $item['que_quan'] ?></td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a href="<?= base_url() ?>/student/editstudent?id=<?= $item['id'] ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="<?= base_url() . '/student/deleteStudent?sid=' . $item['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xoá chứ?')" class="btn btn-sm bg-danger-light">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>