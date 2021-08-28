<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Collapsable Card Example -->
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <?=form_error('menu','<div class="alert alert-danger" role="alert">','</div>');?>
    <?= $this->session->flashdata('message');  ?>
    <a href="#collapseCardUser" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardUser">
    <h4 class="m-0 font-weight-bold text-primary">Tabel User</h4>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardUser"><div class="card-body"><div class="table-responsive">
        <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role_id</th>
              <th>last_login</th>
              <th>is_active</th>
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
              <td><?= date('d-M-Y',$ua['last_login']);?></td>
              <td>
                <?php $label = ($ua['is_active']==1) ? 'Aktif' : 'Tidak Aktif' ; ?><?=$label?>                        
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
    </div></div></div>
  </div>

        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Button trigger modal -->
