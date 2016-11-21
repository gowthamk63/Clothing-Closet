<?php
class item{
	public $condition = 'G';
	public $category='A';
	public $price=0;
	public $color='';
	public $brand='';
	public $reduction=0;
	public $value=0;
	
	function __construct($condition, $category, $price, $color, $brand) {
		$this->condition = $condition;
		$this->category = $category;
		$this->price = $price;
		$this->color = $color;
		$this->brand = $brand;
	}
}
?>