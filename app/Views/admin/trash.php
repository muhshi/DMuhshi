<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Admin|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Manajemen User</h1>
        <p>Pengelolaan User</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Tempat Sampah</h3>
            <div class="tile-body col-md-12">
                <div class="card-body">
                    <div class="card-title" style="text-align: right;">
                        <a type="button" class="btn btn-primary" href="<?= base_url('admin'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td> <?= $user->name; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-success" href="<?= base_url('admin/restore/' . $user->userid); ?>"><i class="fa fa-recycle"></i> Restore</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="tile-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>