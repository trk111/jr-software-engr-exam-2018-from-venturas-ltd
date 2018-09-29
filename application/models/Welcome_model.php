<?php

Class Welcome_model extends CI_Model {

	function __construct() {
		parent::__construct();

	}

	function search_result($prog_lang, $lang) {

		$this->db->select('developers.email, programming_languages.name, languages.code');
		//$this->db->from('data');
		$this->db->from('data_pl');
		$this->db->from('developers');
		$this->db->from('programming_languages');
		$this->db->from('languages');
		if ($prog_lang != '') {
			$this->db->where('data_pl.programming_language', $prog_lang);
		}
		/*if ($lang != '') {
			$this->db->where('data.language', $lang);
		}*/

		$this->db->where('data_pl.developer = developers.id');
		$this->db->where('data_pl.programming_language = programming_languages.id');
		//$this->db->where('data.language = languages.id');
		$this->db->group_by('developers.id');
		$this->db->order_by('developers.id', 'ASC');

		$data = $this->db->get();

		if ($data->num_rows() > 0) {

			return $data->result();

		} else {
			return '';
		}

	}

}