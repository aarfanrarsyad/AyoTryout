<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="col-sm border-bottom-info shadow h-100 py-2 mb-2">
    <div class="card shadow">
      <!-- Card Header - Accordion -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Danus</h6>
        </div>
          <?=$this->session->flashdata('message')?>
      <!-- Card Content - Collapse -->
      <div class="show">
        <div class="card-body">
          <?php if ($partner['nama_danus']==NULL||$partner['nama_danus']=='') :?>
          <div class="col-lg mb-2">
            <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#buatDanus">Buat Danus</a>
          </div>
          <?php else: ?>
          <div class="row"><div class="col-lg">
              <form action="<?= base_url('partner/editDanus'); ?>" method="post">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="email">email</label>
              <div class="col-sm">
                <input class="form-control" type="text" value="<?= $partner['email'] ?>" readonly id="email" name="email" ></input>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="editNamaDanus">Nama Danus</label>
              <div class="col-sm">
                <input class="form-control" type="text" value="<?= $partner['nama_danus'] ?>" id="editNamaDanus" name="editNamaDanus" ></input>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="tglMulai">tanggal Mulai</label>
              <div class="col-sm">
                <input class="form-control" type="date" value="<?= $partner['tgl_mulai'] ?>" id="tglMulai" name="tglMulai" ></input>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="tglSelesai">tanggal Selesai</label>
              <div class="col-sm">
                <input class="form-control" type="date" value="<?= $partner['tgl_selesai'] ?>" id="tglSelesai" name="tglSelesai" ></input>
              </div>
            </div>
            <!-- <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="tglMulai">Tanggal Mulai</label>
              <div class="col-sm">
              <div class="input-group mb-3">
                <select class="custom-select" id="tglMulai" name="tglMulai">
                  <option selected>Tanggal...</option>
                  <?php for ($i=1; $i <= 31 ; $i++) :?> 
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
                </select>
                <select class="custom-select" id="blnMulai" name="blnMulai">
                  <option selected>Bulan...</option>
                  <?php for ($i=1; $i <= 12 ; $i++) : 
                    $bln = array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des')?>
                  <option value="<?= $i ?>"><?= $bln[$i] ?></option>
                  <?php endfor; ?>
                </select>
                <select class="custom-select" id="thnMulai" name="thnMulai">
                  <option selected>Tahun...</option>
                  <?php for ($i=2019; $i <= 2020 ; $i++) :?> 
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              </div>
            </div> -->

            <!-- <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="tglSelesai">Tanggal Selesai</label>
              <div class="col-sm">
              <div class="input-group mb-3">
                <select class="custom-select" id="tglSelesai" name="tglSelesai">
                  <option selected>Tanggal...</option>
                  <?php for ($i=1; $i <= 31 ; $i++) :?> 
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
                </select>
                <select class="custom-select" id="blnSelesai" name="blnSelesai">
                  <option selected>Bulan...</option>
                  <?php for ($i=1; $i <= 12 ; $i++) : 
                    $bln = array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des')?>
                  <option value="<?= $i ?>"><?= $bln[$i] ?></option>
                  <?php endfor; ?>
                </select>
                <select class="custom-select" id="thnSelesai" name="thnSelesai">
                  <option selected>Tahun...</option>
                  <?php for ($i=2019; $i <= 2020 ; $i++) :?> 
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              </div>
            </div> -->
            
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="kepentingan">Kepentingan</label>
              <div class="col-sm">
              <div class="input-group mb-3">
                <select class="custom-select" id="kepentingan" name="kepentingan">
                  <?php $kepentingan = ($partner['kepentingan']=='') ? 'Pilih kepentingan' : $partner['kepentingan'] ; ?>
                  <option selected><?= $kepentingan ?></option>
                  <option value="ukm">UKM</option>
                  <option value="himada">HIMADA</option>
                  <option value="organisasi">Organisasi</option>
                  <option value="individu">Individu</option>
                  <option value="lainnya">lainnya</option>
                </select>
              </div>
              </div>
            </div>

            <div class="form-group row justify-content-end">
              <div class="coll-sm mr-3">
                <button class="btn-primary btn" type="submit">Ubah</button>
              </div>
            </div>
            </form>
          </div>
        </div>
          <?php endif; ?>
      </div>
    </div>   
  </div></div>

  <?php if ($partner['status']=='3'): ?>


<div class="col-lg border-bottom-info shadow h-100 py-2 mb-2"><div class="card shadow">
	<!-- Card Header - Accordion -->
	<a class="d-block card-header py-3" href="#collapseCardBarang" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardBarang">
		<h6 class="m-0 font-weight-bold text-primary d-sm-inline">Tabel Barang</h6>
	</a>
	<!-- Card Content - Collapse -->
		<a href="<?= base_url('partner/tambah');?>" class="d-sm-inline btn btn-primary shadow-sm mb-1"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</a>
	<div class="collapse show" id="collapseCardBarang"><div class="card-body"><div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga Jual-beli</th>
              <th>Stok/terjual</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;
            foreach ($barang as $brg ) :?>
              <tr>
                <td><?=$i++?></td>
                <td><?= $brg['nama_barang'] ?></td>
                <td><?= $brg['harga_jual'].'-'.$brg['harga_beli'] ?></td>
                <td><?= $brg['stok'].'/'.$brg['terjual'] ?></td>
                <td>
                  <a href="<?= base_url('partner/edit/'.$brg['id']);?>" class="mx-1 my-1"><i class="fas fa-fw fa-edit"></i></a >
                  <a href="<?= base_url('partner/hapus/'.$brg['id']);?>" class="mx-1 my-1"><i class="fas fa-fw fa-trash"></i></a >
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div></div></div>
</div></div>

<div class="col-lg border-bottom-info shadow h-100 py-2 mb-2"><div class="card shadow">
	<!-- Card Header - Accordion -->
	<a href="#collapseCardPesanan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardPesanan">
		<h6 class="m-0 font-weight-bold text-primary d-sm-inline">Tabel Pesanan</h6>
	</a>
	<!-- Card Content - Collapse -->
	<div class="collapse show" id="collapseCardPesanan"><div class="card-body"><div class="table-responsive">
		
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>63</td>
              <td>2011/07/25</td>
              <td>$170,750</td>
            </tr>
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
          </tbody>
        </table>

      </div></div></div>
</div></div>


  <?php endif; ?>
 
<!-- Modal -->
<div class="modal fade" id="buatDanus" tabindex="-1" role="dialog" aria-labelledby="modalDanus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDanus">Buat danus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg">
              <form action="<?= base_url('partner/addDanus'); ?>" method="post">
                <div class="form-group">
                  <label class="col-sm col-form-label" for="namaDanus">Nama Danus</label>
                  <?=form_error('namaDanus','<small class="text-danger pl-4">','</small>')?>
                  <div class="col-sm">
                    <input class="form-control" type="text" id="namaDanus" name="namaDanus" ></input>
                  </div>
                </div>
                <div class="form-group row justify-content-end">
                  <div class="coll-sm mr-3">
                    <button class="btn-primary btn" type="submit">Buat</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

</div>
        <!-- /.container-fluid