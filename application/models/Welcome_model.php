<?php

Class Welcome_model extends CI_Model {

	function __construct() {
		parent::__construct();

	}
	
	function check_pl_developer_language($pl_developer_id,$lang_id)
	{
		$this->db->select('developers.id as d_id,developers.email as email');
		
		$this->db->from('data');
		$this->db->from('languages');
		$this->db->from('developers');
		
		$this->db->where('data.developer',$pl_developer_id);
		$this->db->where('data.language',$lang_id);
		
		$this->db->where('data.developer = developers.id');
		$this->db->where('data.language = languages.id');
		
		$data = $this->db->get();
		
		if ($data->num_rows() > 0) {

			return $data;

		} else {
			return '';
		}
	}

	function search_result_pl($prog_lang) 
	{
		
		$this->db->select('developers.id as d_id,developers.email as email');
		
		$this->db->from('data_pl');
		$this->db->from('programming_languages');
		$this->db->from('developers');
		
		if($prog_lang != '')
		$this->db->where('data_pl.programming_language',$prog_lang);
		
		$this->db->where('data_pl.developer = developers.id');
		$this->db->where('data_pl.programming_language = programming_languages.id');
		
		$data = $this->db->get();
		
		if ($data->num_rows() > 0) {

			return $data;

		} else {
			return '';
		}
		
		
	}
	
	function search_result_l($lang) 
	{
		
		$this->db->select('developers.id as d_id,developers.email as email');
		
		$this->db->from('data');
		$this->db->from('languages');
		$this->db->from('developers');
		
		if($lang != '')
		$this->db->where('data.language',$lang);
		
		$this->db->where('data.developer = developers.id');
		$this->db->where('data.language = languages.id');
		
		$data = $this->db->get();
		
		if ($data->num_rows() > 0) {

			return $data;

		} else {
			return '';
		}
		
		
	}

	function get_developers_pl($d_id)
	{
		$data_pl = array();
		
		$this->db->select('programming_languages.name');
		
		$this->db->from('data_pl');
		$this->db->from('programming_languages');
		
		$this->db->where('data_pl.developer',$d_id);
		$this->db->where('data_pl.programming_language = programming_languages.id');
		
		$this->db->order_by('programming_languages.id','ASC');
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{	
			return $data->result();
		}
		else
		{
			return 'No data';
		}
		
		
	}
	
	function get_developers_l($d_id)
	{
		$data_l = array();
		
		$this->db->select('languages.code');
		
		$this->db->from('data');
		$this->db->from('languages');
		
		$this->db->where('data.developer',$d_id);
		$this->db->where('data.language = languages.id');
		
		$this->db->order_by('languages.id','ASC');
		
		$data = $this->db->get();
		
		if($data->num_rows() > 0)
		{	
			return $data->result();
		}
		else
		{
			return 'No data';
		}
		
		
	}

}