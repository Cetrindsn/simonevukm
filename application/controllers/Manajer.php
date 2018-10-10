<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer extends CI_Controller {
	public $tabelUser = 'user';
	public $tabelKegiatan = 'kegiatan';
	public $tabelPelatihan = 'pelatihan';
	public $tabelDivisi = 'divisi';
	public $nilaidivisi = 0;

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
		$this->load->view('Manajer/manajer_dashboard_v',$data);
	}

	public function chart() {
		$this->load->view('Manajer/manajer_chart_v');
	}

	public function json() {
		$namacapt = "Grafik Keaktifan Divisi ".$this->session->userdata("divisi");
		$c = array(
			"caption"=>$namacapt,
			"subCaption"=>"UKM Diploma IPB",
			"xAxisName"=>"Nama Anggota",
			"yAxisName"=>"Nilai",
			"theme"=>"fint"
		);
		$d = array();

		$where = array(
			'level' => 3,
			'id_divisi' => $this->session->userdata("id_divisi")
		);

		$query = $this->crud_m->ambilData('user',$where);
		foreach($query->result() as $rcrd){
			array_push($d,array("label"=>$rcrd->nama, "value"=>$rcrd->nilai));
		}

		$gab = array("chart"=>$c,"data"=>$d);
		echo json_encode($gab);;
	}

	public function pdf(){
		$this->load->library('tcpdf/tcpdf');

		$pdf = new tcpdf();
		$orientation = 'P'; //'L';
		$format = 'A4';
		$keepmargins = false;
		$tocpage = false;

		$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);

		$html = '<center><b style="color" align="center">IPB</b>';

		$family = 'dejavusans';
		$style = '';
		$size = '12';
		$pdf->SetFont($family,$style,$size);

		$html = '<br><h1 style="color:black;text-align:center;">Laporan Keaktifan Divisi '.$this->session->userdata('divisi').'</h1>';
		$html .= '<br><hr><hr><hr><br>';
		$html .= '<br><hr><hr><hr><br>';
			$html .=
			'<table style="border:1px solid black;">
				<tr style="border:1px solid black;">
				<td style="border:1px solid black;background-color:black;color:white;"><b>No</b></td>
				<td style="border:1px solid black;background-color:black;color:white;"><b>Nama Divisi</b></td>
				<td style="border:1px solid black;background-color:black;color:white;"><b>Nilai</b></td>
				</tr>
			';
			$i = 1;
			$where = array(
				'id_divisi' => $this->session->userdata('id_divisi'),
				'level' => 3
			);
			$query = $this->crud_m->ambilData('user',$where);
			foreach ($query->result() as $row) {


		    $html .= '<tr style="border:1px solid black;">'
								.'<td style="border:1px solid black;">'.$i++.'</td>'
								.'<td style="border:1px solid black;">'.$row->nama.'</td>'
								.'<td style="border:1px solid black;">'.$row->nilai.'</td>'
								.'</tr>';
			}
			$html .= '</table>';

$html .= '<br><hr><hr><hr><br>';
$html .= '<br><br><h4 style="color:black;text-align:center;">-------SIMONEV UKM-------</h4>';
$html .= '<h5 style="color:black;text-align:center;">Sistem Informasi Monitoring dan Evaluasi UKM</h5>';

		$ln = true;
		$fill = false;
		$reseth = false;
		$cell = false;
		$align = '';
		$pdf->writeHTML($html, $ln, $fill, $reseth, $cell,$align);

		//$pdf->Output();
		$name = '/Laporan Keaktifan Divisi '.$this->session->userdata('divisi').'.pdf';
		$dest = 'I'; //'I','F','D'
		$pdf->Output($name,$dest);


	}

	public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'appexcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Dicky-Yosua')
                 ->setLastModifiedBy('Dicky-Yosua')
                 ->setTitle("Laporan Keaktifan semua Divisi")
                 ->setSubject("Divisi")
                 ->setDescription("Laporan Keaktifan semua Divisi")
                 ->setKeywords("Laporan Keaktifan");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Keaktifan Divisi ".$this->session->userdata('divisi')); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NILAI"); // Set kolom C3 dengan tulisan "NAMA"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

		$where = array(
			'level' => 3,
			'id_divisi' => $this->session->userdata('id_divisi')
		);

    $siswa = $this->crud_m->ambilData('user',$where);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa->result() as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nilai);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Laporan Keaktifan Divisi.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

	//=====================================
	//CRUD KEGIATAN
	//=====================================

	public function kegiatan()
	{
		$data['kegiatan']=$this->crud_m->ambilData($this->tabelKegiatan);
		$this->load->view('manajer/manajer_kegiatan_v',$data);
	}

	public function aksiDeleteKegiatanmanajer($id)
	{
		$where = array(
						'id' => $id
						);
				$this->crud_m->deleteData($this->tabelKegiatan,$where);
				redirect('manajer/kegiatan');
	}

	public function aksiAddKegiatanmanajer()
	{
	$namakegiatan = $this->input->post('namakegiatan');
	$tanggalkegiatan = $this->input->post('tanggalkegiatan');

	$data = array(
		"namakegiatan" => $namakegiatan,
		"tanggalkegiatan" => $tanggalkegiatan
		);

	$this->crud_m->insertData($this->tabelKegiatan,$data);
	redirect('manajer/kegiatan');
	}

	public function aksiUpdateKegiatanmanajer($id)
    {
			$where = array(
					'id' => $id
					);

			$data['kegiatan']=$this->crud_m->ambilData($this->tabelKegiatan,$where);

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
			$this->load->view('manajer/manajer_anggota_v',$data);
		}

		public function aksiDeleteAnggotamanajer($id)
		{
		  $where = array(
		          'id' => $id
		          );
		      $this->crud_m->deleteData($this->tabelUser,$where);
		      redirect('manajer/anggota');
		}

		public function aksiAddAnggotamanajer()
		{
		$usernameV = $this->input->post('username');
		$passwordV = $this->input->post('password');
		$notelpV = $this->input->post('notelp');
		$namaV = $this->input->post('nama');
		$iddiv = $this->input->post('divisi');
		$idlevel = $this->input->post('jabatan');

		$data = array(
		  "username" => $usernameV,
		  "password" => $passwordV,
		  "nama" => $namaV,
		  "notelp" => $notelpV,
		  "id_divisi" => $iddiv,
		  "level" => $idlevel
		  );

		$this->crud_m->insertData($this->tabelUser,$data);
		redirect('manajer/anggota');
		}

		public function aksiUpdateAnggotamanajer($id)
		  {
		    $where = array(
		        'id' => $id
		        );

		    $data['user']=$this->crud_m->ambilData($this->tabelUser,$where);

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
				$this->load->view('manajer/manajer_pelatihan_v',$data);
			}

			public function aksiDeletePelatihanmanajer($id)
			{
				$where = array(
								'id' => $id
								);
						$this->crud_m->deleteData($this->tabelPelatihan,$where);
						redirect('manajer/pelatihan');
			}

			public function aksiAddPelatihanmanajer()
			{
			$namakegiatan = $this->input->post('namapelatihan');
			$tanggalkegiatan = $this->input->post('tanggalpelatihan');
			$iddiv = $this->session->userdata('id_divisi');

			$data = array(
				"namapelatihan" => $namakegiatan,
				"tanggalpelatihan" => $tanggalkegiatan,
				"id_divisi" => $iddiv
				);

			$this->crud_m->insertData($this->tabelPelatihan,$data);
			redirect('manajer/pelatihan');
			}

			public function aksiUpdatePelatihanmanajer($id)
		    {
					$where = array(
					'id' => $id
					);
					$query = $this->crud_m->ambilData($this->tabelPelatihan,$where);

					$row = $query->row();

					$data = array(
					"id" => $row->id,
					"namapelatihan" => $row->namapelatihan,
					"tanggalpelatihan" => $row->tanggalpelatihan
					);

					$this->load->view('Manajer/manajer_pelatihanedit_v', $data);
		    }

				public function aksiAfterEditPelatihanManajer(){
					$id = $this->input->post('id');
					$namapelatihan = $this->input->post('namapelatihan');
					$tanggalpelatihan = $this->input->post('tanggalpelatihan');

					$data = array(
							"namapelatihan" => $namapelatihan,
							"tanggalpelatihan" => $tanggalpelatihan
							);
					$where = array(
							'id' => $id
							);

					$this->crud_m->updateData($this->tabelPelatihan,$data,$where);
					redirect('Manajer/pelatihan');
				}

				//=====================================
				//EDIT PROFILE
				//=====================================
				public function aksiUpdateProfileManajer($id)
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

						$this->load->view('Manajer/manajer_editprofile_v', $data);
				  }

					public function aksiAfterEditProfileManajer(){
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
		        redirect('Manajer/index');
					}

					//=====================================
					//CRUD Nilai
					//=====================================
					public function nilai()
					{
						$idlevel = 3;
						$where = array(
						'level' => $idlevel,
							'id_divisi' => $this->session->userdata("id_divisi")
						);
						$data['nilai']=$this->crud_m->ambilData($this->tabelUser,$where);

						$this->load->view('manajer/manajer_nilai_v',$data);
					}

					public function aksiUpdateNilaiManajer($id,$iddiv,$nilaidivisi)
					  {

							$where2 = array(
							'id_div' => $iddiv
							);


							$data2 = array(
							"nilaidivisi" => $nilaidivisi
							);

							$this->crud_m->updateData($this->tabelDivisi,$data2,$where2);

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

							$this->load->view('Manajer/manajer_berinilai_v', $data);
					  }

						public function aksiAfterEditNilaiManajer(){
							$id = $this->input->post('id');
							$nilaianggota = $this->input->post('nilaianggota');
							$nilaiaktif = $this->input->post('nilaiaktif');

							$nilai=(($nilaiaktif*0.7)+($nilaianggota*0.3));

			        $data = array(
									"nilaiaktif" => $nilaiaktif,
									"nilai" => $nilai
			            );
			        $where = array(
			            "id" => $id
			            );


			        $this->crud_m->updateData($this->tabelUser,$data,$where);
			        redirect('Manajer/nilai');
						}

						public function aksiUpdateNilaiDivisi($id,$nilaidivisi)
						  {
								$where = array(
				    		'id_div' => $id
				    		);
				    		$query = $this->crud_m->ambilData($this->tabelDivisi,$where);

				    		$row = $query->row();

								$data = array(
								"nilaidivisi" => $nilaidivisi
				    		);

								$this->crud_m->updateData($this->tabelDivisi,$data,$where);
								redirect('Manajer/nilai');
						  }



}
