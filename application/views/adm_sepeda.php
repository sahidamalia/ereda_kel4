<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Sepeda
				<span class="float-end">
					<a href="<?= base_url();?>admin/sepedanew" class="btn btn-sm btn-primary">
						Tambah</a>
			  </h6>
            </div>
            <div class="card-body  pb-2">
				<?php
				if ($JmlSepeda==0)
				{
					echo '<div class="alert alert-info text-white">Belum ada data</div>';
				}
				else
				{
					?>
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Jenis Sepeda</th><th>No Seri</th><th>Harga</th><th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  foreach($Sepeda as $j)
				  {
					  ?>
                    <tr>
                      <td><?= $j->jenis;?></td>
                      <td><?= $j->noseri;?></td>
                      <td><?= number_format($j->harga,0,',','.');?></td>
                      <td><?= $STATUS[$j->status];?></td>
					  <td>
						<a href="<?= base_url();?>admin/sepedaedit/<?= $j->idsepeda;?>"
							class="btn btn-info btn-sm"> Edit</a>
						<a href="#" class="btn btn-sm btn-danger"
									onclick="return hapus('<?= $j->noseri;?>','<?= $j->idsepeda;?>');" >
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
							title: 'Hapus Sepeda?',
							html: "Anda akan menghapus <b>" + nama + "</b> !",
							icon: 'question',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Ya',
							cancelButtonText: 'Tidak',    

						}).then((result) => {
							if (result.value) {            
							window.location.href = "<?= base_url();?>admin/sepedadel/" + idnya;           
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