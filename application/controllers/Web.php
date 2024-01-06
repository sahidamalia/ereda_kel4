<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public $data;
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if (!isset($_SESSION['MBR_ID']))
		{
			$_SESSION['MBR_ID']=0;
			$_SESSION['MBR_NAMA']='';
		}	
		if (!isset($_SESSION['PopUpMsg']))
		{
			$_SESSION['PopUpMsg']='';
			$_SESSION['PopUpClr']='info';
		}			
		$h=$this->db->query("SELECT * FROM web WHERE id=1");
		$this->data['WEB']=$h->row_array();
		$this->data['STATUS']=array('Tersedia', 'Dipakai', 'Rusak');
	}
	
	public function index()
	{
		$this->load->view('web_login', $this->data);
	}
	
	public function syarat()
	{
		$this->load->view('web_syarat', $this->data);
	}
	
	public function login()
	{
		$gagal=0;
		if (isset($_POST['email']))
		{			
			$p=array($_POST['email'], $_POST['passwd']);
			$cek=$this->db->query("SELECT * FROM member WHERE email=? AND passwd=? LIMIT 0,1", $p);
			if ($cek->num_rows()>0)
			{
				$dt=$cek->row_array();
				$_SESSION['MBR_ID']=$dt['idmember'];
				$_SESSION['MBT_NAMA']=$dt['namamember'];
				$_SESSION['PopUpMsg']='Berhasil Login';
				redirect('web/home');
			}
			else
			{
				$gagal=1;
			}
		}
		if ($gagal==1)
		{
			$_SESSION['PopUpMsg']='Gagal Login';
		}
		$this->load->view('web_login', $this->data);
	}
	
	public function daftar()
	{
		$gagal=0;
		if (isset($_POST['email']))
		{
			
			$cek=$this->db->query("SELECT * FROM member WHERE email=? LIMIT 0,1", $_POST['email']);
			if ($cek->num_rows()==0)
			{
				$p=array($_POST['nama'], $_POST['telepon'], $_POST['email'], $_POST['passwd']);
				$this->db->query("INSERT INTO member (namamember, telepon, email, passwd)
					VALUES (?, ?, ?, ?)", $p);
				$_SESSION['MBR_ID']=$this->db->insert_id();
				$_SESSION['MBR_NAMA']=$_POST['nama'];
				redirect('web/home');
			}
			else
			{
				$gagal=1;
			}
		}
		if ($gagal==1)
		{
			$_SESSION['PopUpMsg']='Email sudah digunakan';
		}
		$this->load->view('web_daftar', $this->data);
	}
	
	public function home()
	{
		$hasil=array();
		$h=$this->db->query("SELECT * FROM jenis ORDER BY jenis ASC");
		$j=$h->num_rows();
		
		if ($j>0)
		{
			$dt=$h->result(); $n=0;
			foreach($dt as $d)
			{
				$hs=$this->db->query("SELECT * FROM sepeda WHERE idjenis=? ORDER BY noseri ASC", $d->idjenis);
				if ($hs->num_rows()>0)
				{
					$ds=$hs->result();
					$hasil[$n]['jenis']=$d->jenis;
					$hasil[$n]['idjenis']=$d->idjenis;
					$hasil[$n]['sepeda']=array();
					$b=0;
					foreach($ds as $s)
					{
						$hasil[$n]['sepeda'][$b]=array (
							'idsepeda'=>$s->idsepeda,
							'idjenis'=>$s->idjenis,
							'noseri'=>$s->noseri,
							'harga'=>$s->harga,
							'status'=>$s->status
							);
						$b++;
					}
					$n++;
				}
				
			}
		}
		$this->data['Sepeda']=$hasil;
		$this->data['JmlJenis']=$n;
		$this->load->view('web_home', $this->data);
	}
}
?>
