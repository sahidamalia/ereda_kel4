<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	public $data;
	
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['ADM_ID']))
		{
			$_SESSION['ADM_ID']=0;
			$_SESSION['ADM_NAMA']='';
		}	
		if (!isset($_SESSION['PopUpMsg']))
		{
			$_SESSION['PopUpMsg']='';
			$_SESSION['PopUpClr']='info';
		}			
		$h=$this->db->query("SELECT * FROM web WHERE id=1");
		$this->data['WEB']=$h->row_array();
	}
	
	public function index()
	{
		$gagal=0;
		if (isset($_POST['nama']))
		{
			
			$p=array($_POST['nama'], $_POST['passwd']);
			$cek=$this->db->query("SELECT * FROM admin WHERE username=? AND passwd=? LIMIT 0,1", $p);
			if ($cek->num_rows()>0)
			{
				
				$dt=$cek->row_array();
				$_SESSION['ADM_ID']=$dt['idadmin'];
				$_SESSION['ADM_NAMA']=$dt['nama_adm'];
				redirect('admin');
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
		$this->load->view('adm_login', $this->data);
	}
}
?>