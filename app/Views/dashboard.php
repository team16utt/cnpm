<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>
<?php session_start() ?>
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Chào mừng <?= $_SESSION['user']['ho_ten'] ?></h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Trang chủ</li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection() ?>