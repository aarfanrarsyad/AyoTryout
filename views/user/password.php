        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>
          
          <div class="row">
            <div class="col-lg-8">              
            <?=$this->session->flashdata('message');?>
              <form action="<?=base_url('user/password');?>" method="post">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Nama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="name" name="name" value="<?=$user['name']?>" readonly></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="name" name="name" value="<?=$user['email']?>" readonly></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name">Password Lama</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="password" name="password"></input>
                  <?=form_error('password','<small class="text-danger pl-4">','</small>')?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="password1">Password Baru</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="password1" name="password1"></input>
                  <?=form_error('password1','<small class="text-danger pl-4">','</small>')?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="password2">Ulangi Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="password" id="password2" name="password2"></input>
                  <?=form_error('password2','<small class="text-danger pl-4">','</small>')?>
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