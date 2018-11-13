<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cart 
{
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
    	$this->items = $oldCart->items;
    	$this->totalPrice = $oldCart->totalPrice;
    	$this->totalQty = $oldCart->totalQty;
    }
    }

    public function add($item, $id){
		$giohang = ['qty'=>0, 'unit_price' => $item->unit_price,
		'promotion_price' => $item->promotion_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty']++;
		$giohang['unit_price'] = $item->unit_price * $giohang['qty'];
		$giohang['promotion_price'] = $item->promotion_price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		if($item->promotion_price == 0){
			$this->totalPrice += $item->unit_price;
		}else{
			$this->totalPrice += $item->promotion_price;
		}
		
	}

	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		if($this->items[$id]['promotion_price'] == 0){
			$this->totalPrice -= $this->items[$id]['unit_price'];
		}else{
			$this->totalPrice -= $this->items[$id]['promotion_price'];
		}
		
		unset($this->items[$id]);
	}
}
