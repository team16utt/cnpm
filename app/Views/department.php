<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>

<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Quản lý sinh viên</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý khoa</li>
            </ul>
        </div>
        <div class="col-auto text-right float-right ml-auto">

            <a href="<?= base_url() ?>/department/editdepartment" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                <th>Tên khoa</th>
                                <th>Hệ đào tạo</th>
                                <th>Ngành</th>
                                <th>Thời gian</th>
                                <th class="text-right">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($departments)) : ?>
                                <?php foreach ($departments as $item) : ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['ten_khoa'] ?></td>
                                        <td><?= $item['he_dao_tao'] ?></td>
                                        <td><?= $item['ten_nganh'] ?></td>
                                        <td><?= $item['thoi_gian'] ?></td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a href="<?= base_url() ?>/department/editdepartment?id=<?= $item['id'] ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="<?= base_url() . '/department/deletedepartment?id=' . $item['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xoá chứ?')" class="btn btn-sm bg-danger-light">
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