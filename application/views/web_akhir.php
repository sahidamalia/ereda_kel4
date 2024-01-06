</main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Sistem Informasi UBSI Purwokerto. Semester Ganjil 2023-2024
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?= base_url();?>css_js/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url();?>css_js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>css_js/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>css_js/smooth-scrollbar.min.js"></script>
  
  <script src="<?= base_url();?>css_js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url();?>css_js/id.verify.notify.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
	
	<?php 
        if ($_SESSION['PopUpMsg']!='')
        {
            ?>
          swal.fire ({
				title: 'Info',
				html: '<?= $_SESSION['PopUpMsg'];?>',      
				icon: '<?= $_SESSION['PopUpClr'];?>',                 
				  })
			<?php
            $_SESSION['PopUpMsg']='';
        }
        ?>
  </script>
  
  <script src="<?= base_url();?>css_js/soft-ui-dashboard.js"></script>
</body>

</html>