<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Config extends CI_Controller
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
		$url = $this->input->get('url');
		if(isLink($url))
		{
			$form = new zea();
			$form->setTable('config');
			$form->init('param');
			$form->setParamName($url);
			$form->api_server();
			$form->addInput('province_id','dropdown');
			// $form->setAttribute('province_id',['class'=>'form-control']);
			$form->setLabel('province_id','Provinsi');
			$form->setOptions('province_id',['none']);

			$form->addInput('regency_id','dropdown');
			// $form->setAttribute('regency_id',['class'=>'form-control']);
			$form->setLabel('regency_id','Kabupaten');
			$form->setOptions('regency_id',['none']);

			$form->addInput('image', 'upload');
			$form->setAccept('image', 'image/jpeg,image/png');

			$form->setDirImage('kabupaten_image_'.str_replace('/','_',$url));

			$form->setFormName($url);

			$data = $form->action();

			output_json($data,1);
		}

	}	
}