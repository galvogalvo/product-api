<?php

require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('products_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/api
	 *	- or -
	 * 		http://example.com/index.php/api/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/api/<method_name>
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

		$this->products_model->product->id = $this->get('id');
		$product = $this->products_model->get_product();

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