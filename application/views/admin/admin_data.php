<div class="alert alert-info" role="alert">
    Admin Data
</div>

<?php $this->view('messages') ?>

<div class="d-sm-flex align-items-center mb-3">
    <a href="<?=base_url()?>admin/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Username</th>
            <th>Name</th>
            <th>Address</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            foreach ( $dataAdmin->result() as $admin ) : ?>
        <tr>
            <td><?=$no++?>.</td>
            <td><?=$admin->username?></td>
            <td><?=$admin->name?></td>
            <td><?=$admin->address?></td>
            <td><?=$admin->level == 1 ? "Super Admin" : "Admin"?></td>
            <td>
                <a href="<?=base_url('admin/edit/'.$admin->id_admin)?>" class="badge badge-success">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a href="<?=base_url('admin/delete/'.$admin->id_admin)?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
