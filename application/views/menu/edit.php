        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
          <?php $this->session->flashdata('message') ?>
          
          <div class="row">
            <div class="col-lg-8">
              <?= form_open_multipart('menu/edit');?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="email">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="email" name="email" value="<?=$edit['email']?>" readonly></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="name" name="name" value="<?=$edit['name']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="nowa">No Whatsapp</label>
                  <div class="col-sm-10">
                    <?php $nowa = ($edit['nowa']) ? $edit['nowa'] : '62' ; ?>
                    <input class="form-control" type="text" id="nowa" name="nowa" value="<?=$nowa?>"></input>
                    <a href="https://wa.me/<?=$nowa?>" class="badge badge-success">Chat</a>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Kelas</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="kelas" name="kelas" value="<?=$edit['kelas']?>"></input>
                  </div>
                </div>                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="role_id">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="role_id" name="role_id">
                      <?php switch ($edit['role_id']) {
                      case 1: ?>
                        <option value="1">Admin</option>
                        <option value="2">Partner</option>
                        <option value="3">User</option>
                      <?php  break;
                      case 2: ?>
                        <option value="2">Partner</option>
                        <option value="3">User</option>
                        <option value="1">Admin</option>
                      <?php  break;
                      case 3: ?>
                        <option value="3">User</option>
                        <option value="2">Partner</option>
                        <option value="1">Admin</option>
                      <?php  break;
                      default: ?>
                        <option value="3">User</option>
                        <option value="2">Partner</option>
                        <option value="1">Admin</option>
                      <?php  break;
                      }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="image">Gambar</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="image" name="image" value="<?=$edit['image']?>"></input>
                  </div>
                </div>              
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="is_active">Aktif</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="is_active" name="is_active">
                      <?php switch ($edit['is_active']) {
                      case 1: ?>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      <?php  break;
                      case 0: ?>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                      <?php  break;
                      default: ?>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      <?php  break;
                      }?>
                    </select>
                  </div>
                </div>             
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="date_created">Bergabung Sejak</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="date_created" name="date_created" readonly value="<?=date('d/M/Y',$edit['date_created'])?>"></input>
                  </div>
                </div>
                <div class="form-group row justify-content-end">
                  <div class="coll-sm-10">
                    <button class="btn-primary btn" type="submit">Ubah</button>
                  </div>
                </div>
                </form>
            </div>
          </div>

      </div>
      <!-- End of Main Content -->