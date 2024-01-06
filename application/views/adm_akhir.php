<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Sistem Informasi UBSI Purwokerto.  <i class="fa fa-heart"></i> Semester Ganjil 2023-2024
                
              </div>
            </div>
            <di
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url();?>css_js/jquery-2.2.4.min.js"></script>
  <script src="<?= base_url();?>css_js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>css_js/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url();?>css_js/smooth-scrollbar.min.js"></script>
  
  <script src="<?= base_url();?>css_js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url();?>css_js/id.verify.notify.js"></script>
  
	<script src="<?= base_url();?>dttable/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>dttable/dataTables.bootstrap5.min.js"></script>
  <script>
	$(document).ready(function() {
			 $('#dataTable').dataTable();
		});
		
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