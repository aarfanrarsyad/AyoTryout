        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tambah barang</h1>
          <?php $this->session->flashdata('message') ?>
          
          <div class="row">
            <div class="col-lg-8">
              <?= form_open_multipart('partner/tambah');?>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="email">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="email" name="email" value="<?=$partner['email']?>" readonly></input>
                  </div>
                </div>                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="namaDanus">Danus</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="namaDanus" name="namaDanus" value="<?=$partner['nama_danus']?>" readonly></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="nama_barang">Nama Barang</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?=$barang['nama_barang']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="hargaBeli">Harga Beli</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" id="hargaBeli" name="hargaBeli" value="900" value="<?=$barang['harga_beli']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="hargaJual">Harga Jual</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="number" id="hargaJual" name="hargaJual" value="1000" value="<?=$barang['harga_jual']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label align-middle" for="gambar">Gambar</label>
                  <div class="col-sm">
                      <input class="form-control mb-1" type="text" id="gambar1" name="gambar1" placeholder="Link gambar1" value="<?=$barang['gambar1']?>"></input>
                      <input class="form-control mb-1" type="text" id="gambar2" name="gambar2" placeholder="Link gambar2 (optional)" value="<?=$barang['gambar2']?>"></input>
                      <input class="form-control mb-1" type="text" id="gambar3" name="gambar3" placeholder="Link gambar3 (optional)" value="<?=$barang['gambar3']?>"></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="varian">Varian</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input class="form-control bg-light border border-info" type="text" id="varian" name="varian" placeholder="nama Varian" value="<?=$barang['varian']?>"></input>
                      <?php for ($i=0; $i <3 ; $i++) : ?>
                      <input type="text" class="form-control" placeholder="varian<?=$i+1?>" name="varian<?=$i+1?>">
                      <?php endfor; ?>
                      <div class="input-group-append">
                        <button class="btn align-middle btn-outline-info" type="button" id="addVarian"><i class="fas fa-plus"></i></button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="stok">Stok</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><?=$barang['stok']?></span>
                        <span class="input-group-text">+</span>
                      </div>
                    <input class="form-control" type="number" id="stok" name="stok" value="0"></input>
                    </div>
                  </div>
                </div>

               <div class="form-group row justify-content-end">
                  <div class="coll-sm-10">
                    <a class="btn btn-info mx-2" href="<?=base_url('partner/setting/')?>#collapseCardBarang" role="button">Kembali</a>
                  </div>
                  <div class="coll-sm-10">
                    <button class="btn-primary btn" type="submit">Ubah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

      </div>
      <!-- End of Main Content -->