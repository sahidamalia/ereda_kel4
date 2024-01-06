<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbr extends CI_Controller {

	public $data;
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ((!isset($_SESSION['MBR_ID'])) || ($_SESSION['MBR_ID']==0))
		{
			redirect('web/login');
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
		redirect('web/home');
	}
	
	public function logout()
	{
		$_SESSION['MBR_ID']=0;
		$_SESSION['MBR_NAMA']='';
		redirect('web/login');
	}
	
	public function pesannew($ids=false)
	{
		if ($ids===false) { } else
		{
			$h=$this->db->query("SELECT a.*, b.jenis FROM sepeda AS a, jenis AS b 
				WHERE a.idsepeda=? AND a.idjenis=b.idjenis LIMIT 0,1", $ids);
			$this->data['Sepeda']=$h->row_array();
			$this->load->view('mbr_pesannew', $this->data);			
		}
	}
	
	public function pesansimpan()
	{
		if (isset($_POST['lama']))
		{
			$h=$this->db->query("SELECT * FROM sepeda WHERE idsepeda=? LIMIT 0,1", $_POST['ids']);
			if ($h->num_rows()>0)
			{
				$d=$h->row_array();
				$jmlharga=$_POST['lama'] * $d['harga'];
				$p=array($_SESSION['MBR_ID'], $_POST['ids'], $d['idjenis'], $d['harga'], 
					$_POST['lama'], $jmlharga);
					
				$this->db->query("INSERT INTO pesanan (idmember, idsepeda, idjenis, harga, lama, 
					jmlharga, mulaijam, selesaijam) VALUES (?, ?, ?, ?, ?, ?, '', '')", $p);
				$this->db->query("UPDATE sepeda SET status=1 WHERE idsepeda=?", $_POST['ids']);	
				$_SESSION['PopUpMsg']='Pesanan disimpan';
				redirect('mbr/pesanan');
			}
			else
			{
				$_SESSION['PopUpMsg']='Data tidak ditemukan';
			}
		}
		redirect('web/home');
	}

	public function pesanan()
	{
		$h=$this->db->query("SELECT a.*, b.noseri, c.jenis FROM pesanan AS a, sepeda AS b, jenis AS c
			WHERE a.idmember=? AND a.idsepeda=b.idsepeda AND a.idjenis=c.idjenis", $_SESSION['MBR_ID']);
		$this->data['DtPsn']=$h->result();
		$this->data['JmlPsn']=$h->num_rows();
		$this->load->view('mbr_pesanan', $this->data);	
	}
	
	//Profil
	public function profil()
	{
		if (isset($_POST['nama']))
		{
			if ($_POST['passwd']=='')
			{
				$p=array($_POST['nama'], $_POST['telepon'], $_SESSION['MBR_ID']);
				$this->db->query("UPDATE member SET namamember=?, telepon=? WHERE idmember=?", $p);
			}
			else
			{
				$p=array($_POST['nama'], $_POST['telepon'], $_POST['passwd'],  $_SESSION['MBR_ID']);
				$this->db->query("UPDATE member SET namamember=?, telepon=?, passwd=? WHERE idmember=?", $p);
			}
			$_SESSION['PopUpMsg']='Perubahan data disimpan';
			redirect('mbr/profil');
		}
		
		$h=$this->db->query("SELECT * FROM member WHERE idmember=?", $_SESSION['MBR_ID']);
		$this->data['DtMbr']=$h->row_array();
		$this->load->view('mbr_profil', $this->data);	
	}
}
?>