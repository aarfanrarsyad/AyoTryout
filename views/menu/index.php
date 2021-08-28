        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-6">
              <?=form_error('menu','<div class="alert alert-danger" role="alert">','</div>');?>
              <?= $this->session->flashdata('message');  ?>
              <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Sub Menu</a> -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Bergabung Sejak</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                    foreach ($userAll as $ua ) :?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$ua['name'];?></td>
                      <td><?=$ua['email'];?></td>
                      <td><?php switch ($ua['role_id']) {
                      case 1:
                        echo "Admin";
                        break;
                      case 2:
                        echo "Partner";
                        break;
                      case 3:
                        echo "User";
                        break;
                      default:
                        echo "viewer";
                        break;
                      }?></td>
                      <td><?= date('d-M-Y',$ua['date_created']);?></td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <?php $chk = ($ua['is_active']==1) ? 'checked' : '' ; ?>
                          <input type="checkbox" class="custom-control-input" id="Check<?=$ua['id'];?>" <?=$chk?>>
                          <label class="custom-control-label" for="customCheck1">Aktif</label>
                        </div>                        
                      </td>
                    <td>
                      <a href="<?= base_url('menu/edit/'.$ua['id']);?>" class="mx-1 my-1"><i class="fas fa-fw fa-edit"></i></a >
                    </td>
                    <td>
                      <a href="<?= base_url('menu/hapus/'.$ua['id']);?>" class="mx-1 my-1"><i class="fas fa-fw fa-trash"></i></a>
                    </td>
                    </tr>
                   <?php endforeach; ?>
                  </tbody>
                </table>
              </div>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Button trigger modal -->
