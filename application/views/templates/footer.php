<!-- ##### Footer Area Start ##### -->

<?php if ($this->uri->segment(1)=='danus'||$this->uri->segment(1)==NULL) :?>
<footer class="footer_area clearfix">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    &copy;<script>document.write(new Date().getFullYear());</script>This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a> n <i>develop by</i>  <a href="https://instagram.com/arfan_l_r" target="_blank">Arfan rasyid</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?=base_url('assets/');?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=base_url('assets/');?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?=base_url('assets/');?>js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="<?=base_url('assets/');?>js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="<?=base_url('assets/');?>js/active.js"></script>
<?php else: ?>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; WeeM Team <?=date('Y');?> using <a href="https://startbootstrap.com/themes/sb-admin-2/">sb-admin-2</a>.</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
<?php endif; ?>

<?php if ($this->uri->segment(1)!=='danus'&&$this->uri->segment(1)!==NULL) :?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php endif; ?>

      <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>
<script>
    alert(hxsrsth);
  $('.custom-file-input').on('click',function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

</body>

</html>