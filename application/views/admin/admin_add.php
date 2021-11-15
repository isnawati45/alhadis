<div class="alert alert-info">
    Admin Form
</div>
<div class="card col-lg-6">
    <div class="card-body">
          <div class="text-left">
              <p>(*) Wajib diisi</p>
          </div>
          <form action="" method="post">
            <div class="card-body">           
              <div class="form-group <?=form_error('name') ? 'has-danger' : null ?>">
                  <label for="name">* Name</label>
                  <input type="text" name="name" value="<?=set_value('name')?>" id="name" class="form-control">
                  <?=form_error('name')?>
              </div>
              <div class="form-group">
                  <label for="username">* Username</label>
                  <input type="text" name="username" value="<?=set_value('username')?>" id="username" class="form-control <?=form_error('username') ? 'is-invalid' : null ?> ">
                  <?=form_error('username')?>
              </div>
              <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                  <label for="password">* Password</label>
                  <input type="password" name="password" value="<?=set_value('password')?>" id="password" class="form-control">
                  <?=form_error('password')?>
              </div>
              <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                  <label for="password">* Konfirmasi Password</label>
                  <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control" placeholder="Konfirmasi Password">
                  <?=form_error('passconf')?>
              </div>
              <div class="form-group">
                  <label for="address">Alamat</label>
                  <textarea type="text" name="address" id="address" class="form-control"><?=set_value('address')?></textarea>
              </div>
              <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                  <label for="level">* Level</label>
                  <select name="level" class="form-control">
                  <option value="">-Pilih-</option>
                  <option value="1" <?=set_value('level') == 1 ? "selected" : null ?>>Super Admin</option>
                  <option value="2" <?=set_value('level') == 2 ? "selected" : null ?>>Admin</option>
                  </select>
                  <?=form_error('level')?>
              </div>
            </div>
            <div class="">
              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> <i class="fas fa-save"></i> Simpan</button>
              <button type="Reset" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"> <i class="fas fa-undo"></i> Reset</button>
            </div>
          </form>
    </div>
</div>