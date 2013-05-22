<?php

class Products_model extends CI_Model
{

	public $table;
	public $product;
	public $products;

	public function __construct()
	{
		parent::__construct();
		$this->table = 'products';
	}

	public function get_product()
	{
		if( !isset( $this->product->id ) ) return false;

		$dummy_products = array(
			'123' => array(
				'id' => '123',
				'name' => 'Dummy product 123'
			),
			'456' => array(
				'id' => '456',
				'name' => 'Dummy product 456'
			),
			'789' => array(
				'id' => '789',
				'name' => 'Dummy product 789'
			)
		);
		if( array_key_exists( $this->product->id, $dummy_products ) ) {
			return $this->product = $dummy_products[$this->product->id];
		} else {
			return false;
		}
/*
		$this->db->select('*');
		$this->db->from($this->table,'p');
		$this->db->where('id',$this->product->id);
		$query = $this->db->get();
		return $this->product = $query->row();
*/
	}

	public function get_all_products()
	{
		$this->db->select('*');
		$this->db->from($this->table,'p');
		$query = $this->db->get();
		return $this->products = $query->result();
	}

}