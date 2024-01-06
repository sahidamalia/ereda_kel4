<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $data;
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if ((!isset($_SESSION['ADM_ID'])) || ($_SESSION['ADM_ID']==0))
		{
			redirect('adminlogin');
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
		
		$h=$this->db->query("SELECT a.*, b.noseri, c.jenis, d.namamember FROM pesanan AS a, sepeda AS b, 
			jenis AS c, member AS d
			WHERE a.idmember=d.idmember AND a.idsepeda=b.idsepeda AND a.idjenis=c.idjenis AND a.selesaijam=''");
		$this->data['DtPsn']=$h->result();
		$this->data['JmlPsn']=$h->num_rows();
		$this->load->view('adm_home', $this->data);
	}
	
	public function logout()
	{
		$_SESSION['ADM_ID']=0;
		$_SESSION['ADM_NAMA']='';
		redirect('admin');
	}
	
	public function jenis()
	{
		$h=$this->db->query("SELECT * FROM jenis ORDER BY jenis ASC");
        $this->data['Jenis']=$h->result();
		$this->data['JmlJenis']=$h->num_rows();
		$this->load->view('adm_jenis', $this->data);
	}
	
	public function jenisnew()
	{
		if (isset($_POST['jenis']))
		{
			$this->db->query("INSERT INTO jenis (jenis) VALUES (?)", $_POST['jenis']);
			$id=$this->db->insert_id();
			$fn=$_FILES['gambar']['tmp_name'];
			$fz=$_FILES['gambar']['size'];
			if ($fz>0)
			{
				$ftmp='./img/jenis/'.$id.'.jpg';
				move_uploaded_file($fn, $ftmp);				
			}
			redirect('admin/jenis');
		}
		
		$this->load->view('adm_jenisnew', $this->data);
		
	}
	
	public function jenisedit($id=false)
	{
		if (isset($_POST['idjenis']))
		{
			$p=array($_POST['jenis'],$_POST['idjenis']);
			$this->db->query("UPDATE jenis SET jenis=? WHERE idjenis=?", $p);
			$fn=$_FILES['gambar']['tmp_name'];
			$fz=$_FILES['gambar']['size'];
			if ($fz>0)
			{
				$ftmp='./img/jenis/'.$_POST['idjenis'].'.jpg';
				move_uploaded_file($fn, $ftmp);				
			}
			redirect('admin/jenis');
		}
		if ($id===false) { } else
		{
			$h=$this->db->query("SELECT * FROM jenis WHERE idjenis=?", $id);
			$this->data['Jenis']=$h->row_array();
			$this->load->view('adm_jenisedit', $this->data);
		}
		
	}
	
	public function jenisdel($id=false)
	{
		if ($id===false) { } else
		{
			$h=$this->db->query("SELECT * FROM sepeda WHERE idjenis=? LIMIT 0,1", $id);
			if ($h->num_rows()==0)
			{
				$this->db->query("DELETE FROM jenis WHERE idjenis=?", $id);
				$_SESSION['PopUpMsg']='Jenis sudah dihapus !';
				$f='./img/sepeda/'.$id.'.jpg';
				if (file_exists($f)) { unlink($f); }
			}
			else
			{
				$_SESSION['PopUpMsg']='Jenis masih memiliki sepeda, tidak boleh dihapus !';
			}
		}
		redirect('admin/jenis');
	}
	
	// SEPEDA
	public function sepeda()
	{
		$h=$this->db->query("SELECT a.*, b.jenis FROM sepeda AS a, jenis AS b WHERE a.idjenis=b.idjenis ORDER BY b.jenis ASC, a.noseri ASC");
        $this->data['Sepeda']=$h->result();
		$this->data['JmlSepeda']=$h->num_rows();
		$this->load->view('adm_sepeda', $this->data);
	}
	
	public function sepedanew()
	{
		if (isset($_POST['noseri']))
		{
			$p=array($_POST['idjenis'], strtoupper($_POST['noseri']), $_POST['harga']);
			$this->db->query("INSERT INTO sepeda (idjenis, noseri, harga, status)
				VALUES (?, ?, ?, 0)", $p);
			redirect('admin/sepeda');
		}
		$h=$this->db->query("SELECT * FROM jenis ORDER BY jenis ASC");
        $this->data['Jenis']=$h->result();
		$this->load->view('adm_sepedanew', $this->data);
	}
	
	public function sepedaedit($id=false)
	{
		if (isset($_POST['noseri']))
		{
			$p=array($_POST['idjenis'], strtoupper($_POST['noseri']), $_POST['harga'],
				$_POST['status'], $_POST['id']);
			$this->db->query("UPDATE sepeda SET idjenis=?, noseri=?, harga=?, status=?
				WHERE idsepeda=?", $p);
			redirect('admin/sepeda');
		}
		if ($id===false) { } else
		{
			$h=$this->db->query("SELECT * FROM sepeda WHERE idsepeda=?", $id);
			$this->data['Sepeda']=$h->row_array();
			$h=$this->db->query("SELECT * FROM jenis ORDER BY jenis ASC");
			$this->data['Jenis']=$h->result();
			$this->load->view('adm_sepedaedit', $this->data);
		}
	}
	
	public function sepedadel($idm=false)
	{
		if ($idm===false) { } else
		{
			$cek=$this->db->query("SELECT * FROM pesanan WHERE idsepeda=? LIMIT 0,1", $idm);
			if ($cek->num_rows()==0)
			{
				$this->db->query("DELETE FROM sepeda WHERE idsepeda=?", $idm);
				$_SESSION['PopUpMsg']='Sepeda sudah dihapus';
			}
			else
			{
				$_SESSION['PopUpMsg']='Sepeda masih ada pesanan, tidak boleh dihapus';
			}	
		}
		redirect('admin/sepeda');
	}
	//PESANANA
	public function pesanan()
	{
		$h=$this->db->query("SELECT a.*, b.noseri, c.jenis, d.namamember FROM pesanan AS a, sepeda AS b, 
			jenis AS c, member AS d
			WHERE a.idmember=d.idmember AND a.idsepeda=b.idsepeda AND a.idjenis=c.idjenis");
		$this->data['DtPsn']=$h->result();
		$this->data['JmlPsn']=$h->num_rows();
		$this->load->view('adm_pesanan', $this->data);	
	}
	
	public function pesananedit($idp=false)
	{
		if (isset($_POST['idp']))
		{
			$cek=$this->db->query("SELECT * FROM pesanan WHERE idpesanan=? LIMIT 0,1", $_POST['idp']);
			$dt=$cek->row_array();
			$jmlharga=$dt['harga']*$_POST['lama'];
			
			$p=array($_POST['lama'], $jmlharga, $_POST['mulaijam'],
				$_POST['selesaijam'], $_POST['idp']);
			$this->db->query("UPDATE pesanan SET lama=?, jmlharga=?, mulaijam=?, selesaijam=?
				WHERE idpesanan=?", $p);
			redirect('admin/pesanan');
		}
		if ($idp===false) { } else
		{
			$h=$this->db->query("SELECT a.*, b.noseri, c.jenis, d.namamember FROM pesanan AS a, sepeda AS b, 
			jenis AS c, member AS d
			WHERE a.idpesanan=? AND a.idmember=d.idmember AND a.idsepeda=b.idsepeda AND a.idjenis=c.idjenis LIMIT 0,1", $idp);
			$this->data['DtPsn']=$h->row_array();
			$this->load->view('adm_pesananedit', $this->data);
		}
	}
	
	public function pesanandel($idp=false)
	{
		if ($idp===false) { } else
		{
			$cek=$this->db->query("SELECT idsepeda FROM pesanan WHERE idpesanan=? LIMIT 0,1", $idp);
			$dt=$cek->num_rows();
			$this->db->query("UPDATE sepeda SET status=0 WHERE idsepeda=?", $dt['idsepeda']);
			
			$this->db->query("DELETE FROM pesanan WHERE idpesanan=?", $idp);
			$_SESSION['PopUpMsg']='Pesanan sudah dihapus';
		}
		redirect('admin/pesanan');
	}
	
	// SEPEDA
	public function member()
	{
		$h=$this->db->query("SELECT * FROM member ORDER BY namamember ASC");
        $this->data['Member']=$h->result();
		$this->data['JmlMember']=$h->num_rows();
		$this->load->view('adm_member', $this->data);
	}
	
	public function memberedit($id=false)
	{
		if (isset($_POST['idm']))
		{
			if ($_POST['passwd']=='')
			{
				$p=array($_POST['nama'], $_POST['telepon'], $_POST['idm']);
				$this->db->query("UPDATE member SET namamember=?, telepon=?
					WHERE idmember=?", $p);
			}
			else
			{
				$p=array($_POST['nama'], $_POST['telepon'], $_POST['passwd'],
					$_POST['idm']);
				$this->db->query("UPDATE member SET namamember=?, telepon=?, passwd=?
					WHERE idmember=?", $p);
			}	
			redirect('admin/member');
		}
		if ($id===false) { } else
		{
			$h=$this->db->query("SELECT * FROM member WHERE idmember=?", $id);
			$this->data['Member']=$h->row_array();
			$this->load->view('adm_memberedit', $this->data);
		}
	}

	public function memberdel($idm=false)
	{
		if ($idm===false) { } else
		{
			$cek=$this->db->query("SELECT * FROM pesanan WHERE idmember=? LIMIT 0,1", $idm);
			if ($cek->num_rows()==0)
			{
				$this->db->query("DELETE FROM member WHERE idmember=?", $idm);
				$_SESSION['PopUpMsg']='Member sudah dihapus';
			}
			else
			{
				$_SESSION['PopUpMsg']='Member masih punya pesanan, tidak boleh dihapus';
			}	
		}
		redirect('admin/member');
	}
	
	//Akiun
	public function akun()
	{
		if (isset($_POST['nama']))
		{
			if ($_POST['passwd']=='')
			{
				$p=array($_POST['nama'], $_POST['namauser'], $_SESSION['ADM_ID']);
				$this->db->query("UPDATE admin SET nama_adm=?, username=? WHERE idadmin=?", $p);
			}
			else
			{
				$p=array($_POST['nama'], $_POST['namauser'], $_POST['passwd'],  $_SESSION['ADM_ID']);
				$this->db->query("UPDATE admin SET nama_adm=?, username=?, passwd=? WHERE idadmin=?", $p);
			}
			$_SESSION['PopUpMsg']='Perubahan data disimpan';
			redirect('admin/akun');
		}
		
		$h=$this->db->query("SELECT * FROM admin WHERE idadmin=?", $_SESSION['ADM_ID']);
		$this->data['DtAdm']=$h->row_array();
		$this->load->view('adm_akun', $this->data);	
	}
	
	//LAPORAN
	public function laporan()
	{
		$this->load->view('adm_laporan', $this->data);	
	}
	
	public function laporanctk()
	{
		if (isset($_POST['tgla']))
		{
			if ($_POST['tgla']>$_POST['tglb'])
			{
				$a=$_POST['tgla']; $_POST['tgla']=$_POST['tglb']; $_POST['tglb']=$a;
			}
			$p=array($_POST['tgla'], $_POST['tglb']);
			$h=$this->db->query("SELECT a.*, b.noseri, c.jenis, d.namamember FROM pesanan AS a, sepeda AS b, 
			jenis AS c, member AS d WHERE a.idmember=d.idmember AND a.idsepeda=b.idsepeda AND a.idjenis=c.idjenis AND a.selesaijam<>'' AND SUBSTRING(a.tglpesanan,1,10) BETWEEN ? AND ? ORDER BY a.idpesanan ASC", $p);
		$this->data['DtPsn']=$h->result();
		$this->data['JmlPsn']=$h->num_rows();
		$this->data['TglA']=$_POST['tgla'];
		$this->data['TglB']=$_POST['tglb'];;
		$this->load->view('adm_laporanctk', $this->data);	
		}
	}
}
?>