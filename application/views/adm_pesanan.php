<?php
	include('adm_awal.php');
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pesanan</h6>
            </div>
            <div class="card-body  pb-2">
				  <?php
					if ($JmlPsn==0)
					{
						echo '<div class="alert alert-info">Belum ada pesanan sepeda</div>';
					}
					else
					{
						?>
						<div class="table-responsive">
						<table class="table table-sm table-bordered" id="dataTable">
						<thead><tr><th>ID</th><th>Member</th><th>Tgl Pesan</th><th>Jenis</th><th>No Seri</th><th>Harga</th>
							<th>Lama</th><th>Jumlah</th><th>Mulai Jam</th><th>Selesai Jam</th><th>Aksi</th></tr>
						</thead>
						<tbody>
						<?php
						foreach($DtPsn as $d)
						{
							echo '<tr><td>'.$d->idpesanan.'</td>
									  <td>'.$d->namamember.'</td>
									  <td>'.$d->tglpesanan.'</td>
									  <td>'.$d->jenis.'</td>
									  <td>'.$d->noseri.'</td>
									  <td>'.number_format($d->harga,0,',','.').'</td>
									  <td>'.$d->lama.' jam</td>
									  <td>'.number_format($d->jmlharga,0,',','.').'</td>
									  <td>'.$d->mulaijam.'</td>
									  <td>'.$d->selesaijam.'</td>
									  <td>
										<a href="'.base_url().'admin/pesananedit/'.$d->idpesanan.'"
											class="btn btn-sm btn-primary">Edit</a>
										<a href="#" class="btn btn-sm btn-danger"
									onclick="return hapus(\''.$d->idpesanan.'\',\''.$d->idpesanan.'\');" >
										 Del</a>
									  </td>
								   </tr>';
						}						   
						?>
						</tbody>
						</table>
						</div>
				  <script>
					function hapus(nama, idnya)
					{

						Swal.fire({
							title: 'Hapus Pesanan ?',
							html: "Anda akan menghapus Nomor : <b>" + nama + "</b> !",
							icon: 'question',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Ya',
							cancelButtonText: 'Tidak',    

						}).then((result) => {
							if (result.value) {            
							window.location.href = "<?= base_url();?>admin/pesanandel/" + idnya;           
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