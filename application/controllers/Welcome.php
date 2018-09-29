<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->model('welcome_model');

	}

	public function index() {

		$data['developer'] = $this->db->get('developers');
		$data['pl'] = $this->db->get('programming_languages');
		$data['languages'] = $this->db->get('languages');

		$data['body'] = 'home_body';
		$this->load->view('welcome_message', $data);
	}

	function add_developer() {

		$crud = new grocery_CRUD();

		$crud->set_subject('Developer');
		$crud->set_theme('bootstrap');
		$crud->set_table('developers');

		$crud->set_crud_url_path(site_url('welcome/add_developer'));

		$crud->set_relation_n_n('Language', 'data', 'languages', 'developer', 'language', 'code');
		$crud->set_relation_n_n('ProgramingLanguage', 'data_pl', 'programming_languages', 'developer', 'programming_language', 'name');

		$output = $crud->render();

		$data['body'] = 'crud';

		$output = array_merge($data, (array) $output);

		$this->load->view('welcome_message', $output);
	}

	function add_pl() {

		$crud = new grocery_CRUD();

		$crud->set_subject('Programming Languages');
		$crud->set_theme('bootstrap');
		$crud->set_table('programming_languages');

		$crud->set_crud_url_path(site_url('welcome/add_pl'));

		$output = $crud->render();

		$data['body'] = 'crud';

		$output = array_merge($data, (array) $output);

		$this->load->view('welcome_message', $output);
	}

	function add_language() {

		$crud = new grocery_CRUD();

		$crud->set_subject('Languages');
		$crud->set_theme('bootstrap');
		$crud->set_table('languages');

		$crud->set_crud_url_path(site_url('welcome/add_language'));

		$output = $crud->render();

		$data['body'] = 'crud';

		$output = array_merge($data, (array) $output);

		$this->load->view('welcome_message', $output);
	}

	function search_result() {
		$prog_lang = $this->input->post('prog_lang');
		$lang = $this->input->post('lang');

		$result = $this->welcome_model->search_result($prog_lang, $lang);

		if ($result != '') {?>
	<table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Email</th>
	        <th>Programming Languages</th>
	        <th>Language</th>
	      </tr>
	    </thead>
	    <tbody>
<?php foreach ($result as $rows) {?>
	      <tr>
	        <td><?=$rows->name;?></td>
	        <td></td>
	        <td></td>
	      </tr>
<?php }?>
	    </tbody>
	 </table>

	<?php	} else {
			echo "No Data Found";
		}

	}

}
