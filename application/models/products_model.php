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
				'name' => 'Dummy product 123',
				'url' => 'http://www.google.com/'
			),
			'456' => array(
				'id' => '456',
				'name' => 'Dummy product 456',
				'url' => 'http://www.google.com/'
			),
			'789' => array(
				'id' => '789',
				'name' => 'Dummy product 789',
				'url' => 'http://www.google.com/'
			),
			'4000400141477' => array(
				'id' => '4000400141477',
				'name' => 'KNORR GEMÜSE BOUILLON',
				'url' => 'http://www.knorr.de/produkt/detail/295116'
			),
			'8712566055326' => array(
				'id' => '8712566055326',
				'name' => 'Rama Classic',
				'url' => 'http://www.rama.eu/polska/Stronag%C5%82%C3%B3wna/Produkty/Rama-Classic/tabid/198/Default.aspx'
			),
			'8712566349371' => array(
				'id' => '8712566349371',
				'name' => 'Becel Dieet',
				'url' => 'http://www.becel.nl/Becel/Becel-producten/Becel-Dieet.aspx'
			),
			'8718114892375' => array(
				'id' => '8718114892375',
				'name' => 'Calvé Mayonaise',
				'url' => 'https://www.calve.nl/producten/mayonaise/'
			),
			'8722700479475' => array(
				'id' => '8722700479475',
				'name' => 'Hellmann\'s Real Mayonnaise',
				'url' => 'http://www.hellmanns.com/product/detail/97847/real-mayonnaise'
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