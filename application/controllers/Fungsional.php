<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsional extends CI_Controller {
	public $tabelUser = 'user';
	public $tabelKegiatan = 'kegiatan';
	public $tabelPelatihan = 'pelatihan';

	public function __construct()
    {
				parent::__construct();
				$this->load->model('crud_m');
    }

	public function index()
	{
		$where = array(
						'id' => $this->session->userdata("id")
						);
		$data['user']=$this->crud_m->ambilData($this->tabelUser,$where);
		$this->load->view('fungsional/fungsional_dashboard_v',$data);
	}

	//=====================================
	//CRUD KEGIATAN
	//=====================================

	public function kegiatan()
	{
		$data['kegiatan']=$this->crud_m->ambilData($this->tabelKegiatan);
		$this->load->view('fungsional/fungsional_kegiatan_v',$data);
	}

		//=====================================
		//CRUD ANGGOTA
		//=====================================
		public function anggota()
		{
			$iddiv = $this->input->post('divisi');
			$where = array(
					'id_divisi' => $iddiv
					);

			$data['nilai']=$this->crud_m->ambilData($this->tabelUser,$where);
			$this->load->view('fungsional/fungsional_anggota_v',$data);
		}

		public function aksiUpdateAnggotafungsional($id)
		  {
				$where = array(
    		'id' => $id
    		);
    		$query = $this->crud_m->ambilData($this->tabelUser,$where);

    		$row = $query->row();

				$data = array(
        "id" => $row->id,
    		"username" => $row->username,
    		"password" => $row->password,
    		"nama" => $row->nama,
				"notelp" => $row->notelp
    		);

				$this->load->view('Fungsional/fungsional_editprofile_v', $data);

		  }

			public function aksiAfterEditAnggotaFungsional(){
				$id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
				$notelp = $this->input->post('notelp');

        $data = array(
		    		"username" => $username,
		    		"password" => $password,
		    		"nama" => $nama,
						"notelp" => $notelp
            );
        $where = array(
            'id' => $id
            );

        $this->crud_m->updateData($this->tabelUser,$data,$where);
        redirect('Fungsional/index');
			}

			//=====================================
			//CRUD PELATIHAN
			//=====================================

			public function pelatihan()
			{
				$where = array(
					'id_divisi' =>$this->session->userdata('id_divisi')
				);
				$data['pelatihan']=$this->crud_m->ambilData($this->tabelPelatihan,$where);
				$this->load->view('fungsional/fungsional_pelatihan_v',$data);
			}

			//=====================================
			//CRUD Nilai
			//=====================================
			public function nilai()
			{
				$id = $this->session->userdata("id");
				$idlevel = 3;
				$where = array(
					'id !=' => $id,
				'level' => $idlevel,
					'id_divisi' => $this->session->userdata("id_divisi")
				);
				$data['nilai']=$this->crud_m->ambilData($this->tabelUser,$where);
				$this->load->view('fungsional/fungsional_nilai_v',$data);
			}

			public function aksiUpdateNilaiFungsional($id)
				{
					$where = array(
					'id' => $id
					);
					$query = $this->crud_m->ambilData($this->tabelUser,$where);

					$row = $query->row();

					$data = array(
					"id" => $row->id,
					"nilaiaktif" => $row->nilaiaktif,
					"nilaianggota" => $row->nilaianggota,
					"nama" => $row->nama
					);

					$this->load->view('Fungsional/fungsional_berinilai_v', $data);
				}

				public function aksiAfterEditNilaiFungsional(){
					$id = $this->input->post('id');
					$nilaianggota = $this->input->post('nilaianggota');
					$nilaiaktif = $this->input->post('nilaiaktif');

					$nilai=(($nilaiaktif*0.7)+($nilaianggota*0.3));

					$data = array(
							"nilaianggota" => $nilaianggota,
							"nilai" => $nilai
							);
					$where = array(
							"id" => $id
							);

					$this->crud_m->updateData($this->tabelUser,$data,$where);
					redirect('Fungsional/nilai');
				}

}
