        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
          <?php $this->session->flashdata('message') ?>
          
          <div class="row">
            <div class="col-lg-8">
              <?= form_open_multipart('user/edit');?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="email">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="email" name="email" value="<?=$user['email']?>" readonly></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="name" name="name" value="<?=$user['name']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">No Whatsapp</label>
                  <div class="col-sm-10">
                    <?php $nowa = ($user['nowa']) ? $user['nowa'] : '62' ; ?>
                    <input class="form-control" type="text" id="nowa" name="nowa" value="<?=$nowa?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Kelas</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="kelas" name="kelas" value="<?=$user['kelas']?>"></input>
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