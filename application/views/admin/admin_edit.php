<div class="alert alert-info" role="alert">
    Admin Edit
</div>
<div class="card col-lg-6">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group <?=form_error('name') ? 'has-error' : null ?>">
                <label >Name</label>
                <input type="hidden" name="id_admin" value="<?=$dataAdmin->id_admin?>">
                <input type="text" name="name" value="<?=$this->input->post('name') ?? $dataAdmin->name?>" class="form-control" placeholder="Full Name">
                <?=form_error('name')?>
            </div>
            <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                <label>Username</label>
                <input type="text" name="username" value="<?=$this->input->post('username') ?? $dataAdmin->username?>" id="username" class="form-control" placeholder="Username">
                <?=form_error('username')?>
            </div>
            <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                <label>Password </label><small> (Biarkan kosong jika tidak diganti)</small>
                <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control" placeholder="Password">
                <?=form_error('password')?>
            </div>
            <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                <label>Confirmation Password</label>
                <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control" placeholder="Confirmation Password">
                <?=form_error('passconf')?>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Address">
                    <?=$this->input->post('address') ?? $dataAdmin->address?>
                </textarea>
            </div>
            <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                <label>Level</label>
                <select name="level" class="form-control">
                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $dataAdmin->level ?>
                    <option value="1">Super Admin</option>
                    <option value="2" <?=$level == 2 ? "selected" : null ?>>Admin</option>
                </select>
                <?=form_error('level')?>
            </div>
            <div class="">
              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> <i class="fab fa-telegram-plane"></i> Simpan</button>
              <button type="Reset" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> <i class="fab fa-undo"></i> Reset</button>
            </div>
        </form>
    </div>
</div>