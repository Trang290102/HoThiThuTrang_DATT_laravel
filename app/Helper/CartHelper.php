<?php

namespace App\Helper;


class CartHelper
{

    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }
    public function add($product, $quantity = 1)
    {
        $item = [
            'id' => $product['id'],
            'name' => $product['name'],
            'slug' => $product['slug'],
            'image' => $product->productimg,
            'quantity' => $quantity,
            'price' => $product['price_buy'],
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $this->items[$product->id]['quantity'] = $quantity;
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
        // dd(session('cart'));
    }

    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    public function update($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }
    public function clear()
    {
        session(['cart' => '']);
    }
    private function get_total_price()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += (int)$item['price'] * (int)$item['quantity'];
        }
        return $t;
    }
    // private function get_sub_total_price()
    // {
    //     $t = 0;
    //     $t += (int)$this->items[$id]['price'] * (int)$item[$id]['quantity'];
    //     return $t;
    // }

    private function get_total_quantity()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += (int)$item['quantity'];
        }
        return $t;
    }
}
