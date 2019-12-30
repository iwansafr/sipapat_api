<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->allowed();
	}

	public function allowed()
	{
		return true;
	}
}