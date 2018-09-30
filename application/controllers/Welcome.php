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

	function search_result() 
	{
		$prog_lang = $this->input->post('prog_lang');
		$lang = $this->input->post('lang');
		
		if($prog_lang != '' && $lang == '')
		{
			$result = $this->welcome_model->search_result_pl($prog_lang);
			$this->show_data($result);
		}
		
		if($prog_lang == '' && $lang != '')
		{
			$result = $this->welcome_model->search_result_l($lang);
			$this->show_data($result);
		}
		
		if($prog_lang != '' && $lang != '')
		{
			
			$result_pl = $this->welcome_model->search_result_pl($prog_lang);
			
			if($result_pl != '')
			{
				?>
					<table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Email</th>
					        <th>Programming Languages</th>
					        <th>Language</th>
					      </tr>
					    </thead>
					    <tbody>
				<?php
				foreach($result_pl->result() as $pl_developer)
				{
					$result = $this->welcome_model->check_pl_developer_language($pl_developer->d_id,$lang);
					
					$this->show_data_dual($result);	
				}
				?>
				</tbody>
				</table>
				<?php
			}
			
		}
		

	}
	
	function show_data($result)
	{
		if ($result != '') { ?>
			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Email</th>
			        <th>Programming Languages</th>
			        <th>Language</th>
			      </tr>
			    </thead>
			    <tbody>
		<?php foreach ($result->result() as $rows) {?>
			      <tr>
			        <td><?=$rows->email;?></td>
			        <td>
			        	<?php
			        		$developers_pl = $this->welcome_model->get_developers_pl($rows->d_id);
							$i=0;
							foreach($developers_pl as $row)
							{
								if($i!=0)
								{
									echo ',';
								}
								
								echo $row->name;
								
								$i++;
							}
			        	?>
			        </td>
			        <td>
			        	<?php
			        		$developers_l = $this->welcome_model->get_developers_l($rows->d_id);
							$j=0;
							foreach($developers_l as $row)
							{
								if($j!=0)
								{
									echo ',';
								}
								
								echo $row->code;
								
								$j++;	
							}
			        	?>
			        </td>
			      </tr>
		<?php }?>
			    </tbody>
			 </table>

	<?php } else {
			echo "No Data Found";
		}
	}

	function show_data_dual($result)
	{
		if ($result != '') { ?>
	
<?php foreach ($result->result() as $rows) {?>
	      <tr>
	        <td><?=$rows->email;?></td>
	        <td>
	        	<?php
	        		$developers_pl = $this->welcome_model->get_developers_pl($rows->d_id);
					$i=0;
					foreach($developers_pl as $row)
					{
						if($i!=0)
						{
							echo ',';
						}
						
						echo $row->name;
						
						$i++;
					}
	        	?>
	        </td>
	        <td>
	        	<?php
	        		$developers_l = $this->welcome_model->get_developers_l($rows->d_id);
					$j=0;
					foreach($developers_l as $row)
					{
						if($j!=0)
						{
							echo ',';
						}
						
						echo $row->code;
						
						$j++;	
					}
	        	?>
	        </td>
	      </tr>
	<?php } } else {
			
		}
	}
	
	public function api()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		
		if($method != 'GET')
		{
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} 
		else
		{
	    	$resp = $this->welcome_model->developer_all_data();
			
			json_output($response['data'],$resp);
		}
	}


}
