<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->model('token_model');
	}
	public function index()
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('desa');
		
		$form->setNumbering(TRUE);
		$form->addInput('id','plaintext');
		$form->addInput('kode','plaintext');
		$form->addInput('nama','plaintext');
		$form->addInput('kecamatan','plaintext');
		$form->addInput('kabupaten','plaintext');
		$form->addInput('kode_pos','plaintext');
		$form->addInput('telepon','plaintext');
		$form->addInput('email','plaintext');
		$form->addInput('website','plaintext');
		$form->addInput('alamat','plaintext');
		$data = $form->getData()['data'];
		output_json($data);
	}
	public function edit($id = 0)
	{
		$form = new zea();
		$form->init('edit');
		$form->api_server();
		$form->setId($id);
		$form->setTable('desa');
		$form->addInput('province_id','dropdown');
		$form->setLabel('province_id','provinsi');
		$form->setOptions('province_id',['none']);
		$form->addInput('regency_id','dropdown');
		$form->setLabel('regency_id','Kabupaten');
		$form->setOptions('regency_id',['none']);
		$form->addInput('district_id','dropdown');
		$form->setLabel('district_id','Kecamatan');
		$form->setOptions('district_id',['none']);
		$form->addInput('village_id','dropdown');
		$form->setLabel('village_id','Kecamatan');
		$form->setOptions('village_id',['none']);
		$form->addInput('nama','text');
		$form->addInput('kecamatan','text');
		$form->addInput('kabupaten','text');
		$form->addInput('provinsi','text');
		$form->addInput('kode','text');
		$form->addInput('kode_pos','text');
		$form->addInput('telepon','text');
		$form->addInput('email','text');
		$form->addInput('website','text');
		$form->addInput('alamat','textarea');
		$form->addInput('ttd_img','file');
		$form->setFormName('desa_edit');
		$data = $form->action();
		output_json($data);
	}
}