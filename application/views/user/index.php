<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Profil</h1>
  <div class="row col-lg-10">
    <?=$this->session->flashdata('message');?>
  </div>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4 my-auto">
        <img src="<?=base_url('assets/img/profile/').$user['image'];?>" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <?php $kelas = $user['kelas']?' ('.$user['kelas'].')':''; ?>
          <?php $nowa = $user['nowa']?'<p class="card-text">+'.$user['nowa'].'</p>':''; ?>
          <h5 class="card-title"><?=$user['name'].$kelas;?></h5>
          <p class="card-text"><?=$user['email'];?></p>
          <p class="card-text"><small class="text-muted">Bergabung sejak <?=date('d F Y',$user['date_created']);?></small></p>
        </div>
      </div>
    </div>
  </div>
  <?php if (!$danus&&$user['role_id']!=='1') :?>
  <div class="col-lg-6 mb-2">
  <a href="<?=base_url('user/apply')?>" class="btn btn-info btn-block">Ajukan menjadi partner</a>
  </div>
  <?php endif; ?>

<div class="row">
    <div class="col">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
          <h6 class="m-0 font-weight-bold text-primary">Collapsable1</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample1">
          <div class="card-body">
          This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
          <h6 class="m-0 font-weight-bold text-primary">Collapsable2</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample2">
          <div class="card-body">This is a collapsable card example using Bootstrap's built in collapse functionality. 
            <strong>Click on the card header</strong> to see the card body collapse and expand!
          </div>
        </div>
      </div>
    </div>
</div>




</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->