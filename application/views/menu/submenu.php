        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg">
              <?php if(validation_errors()):?>
                <div class="alert alert-danger">
                SubMenu gagal ditambahkan!</div>
              <?php endif; ?>
              <?= $this->session->flashdata('message');?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">SubMenu</th>
                    <th scope="col">Menu</th>
                    <th scope="col">URL</th>
                    <th scope="col">Ikon</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $i=1;
                  foreach ($subMenu as $sm) : ?>
                  <tr>
                    <th scope="row"><?=$i;$i++;?></th>
                    <td><?=$sm['title'];?></td>
                    <td><?=$sm['menu'];?></td>
                    <td><?=$sm['url'];?></td>
                    <td><i class="<?=$sm['icon'];?>"></i></td>
                    <td>
                      <a href="#" class="badge badge-warning">Edit</a>
                      <a href="#" class="badge badge-danger">Delete</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah SubMenu</button>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('menu/submenu');?>" method="post">        
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="title" name="title" placeholder="Nama SubMenu">
        </div>
        <div class="form-group">
          <select class="form-control" id="menu_id" name="menu_id">
              <option value="">Pilih Menu</option>
            <?php foreach ($menu as $m): ?>
              <option value="<?=$m['id'];?>"><?=$m['menu']?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="url" name="url" placeholder="URL">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-control" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-control" for="is_active">
          <i class="fas fa-pen"></i>
              Aktif
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>