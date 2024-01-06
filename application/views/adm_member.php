<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Member</h6>
            </div>
            <div class="card-body  pb-2">
				<?php
				if ($JmlMember==0)
				{
					echo '<div class="alert alert-info text-white">Belum ada data</div>';
				}
				else
				{
					?>
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Nama</th><th>Email</th><th>Telepon</th><th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  foreach($Member as $j)
				  {
					  ?>
                    <tr>
                      <td><?= $j->namamember;?></td>
                      <td><?= $j->email;?></td>
                      <td><?= $j->telepon;?></td>
					  <td>
						<a href="<?= base_url();?>admin/memberedit/<?= $j->idmember;?>"
							class="btn btn-info btn-sm"> Edit</a>
						<a href="#" class="btn btn-sm btn-danger"
									onclick="return hapus('<?= $j->namamember;?>','<?= $j->idmember;?>');" >
										 Del</a>
					  </td>
                    </tr>
				  <?php
				  }
				  ?>
				  </tbody></table>
				  <script>
					function hapus(nama, idnya)
					{

						Swal.fire({
							title: 'Hapus Member ?',
							html: "Anda akan menghapus <b>" + nama + "</b> !",
							icon: 'question',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Ya',
							cancelButtonText: 'Tidak',    

						}).then((result) => {
							if (result.value) {            
							window.location.href = "<?= base_url();?>admin/memberdel/" + idnya;           
							}
						})
					}
				</script>
				 <?php
				}
				?>				
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
	include('adm_akhir.php');
?>	