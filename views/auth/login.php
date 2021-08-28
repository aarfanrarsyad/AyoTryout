<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  <?=$this->session->flashdata('message')?>
                </div>
                <form class="user" method="post" action="<?=base_url('auth')?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Alamat Email" name="email" value="<?=set_value('email')?>">
                  <?=form_error('email','<small class="text-danger pl-4">','</small>')?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                  <?=form_error('password','<small class="text-danger pl-4">','</small>')?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                  <hr>
                  <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login dengan Google
                  </a>
                </form>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Lupa Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?=base_url()?>auth/registration">Buat Akun!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
