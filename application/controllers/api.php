<?php

require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function product_get()
	{
		if(!$this->get('id'))
		{
			$this->response(NULL, 400);
		}

//		$product = $this->product_model->get( $this->get('id') );
		$product = array(
			'name' => 'tin o\' beans',
			'size' => 'just enough',
			'awesomeness' => 'loads'
		);

		if($product)
		{
			$this->response($product, 200); // 200 being the HTTP response code
		}

		else
		{
			$this->response(NULL, 404);
		}
	}
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */