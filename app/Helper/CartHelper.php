<?php

namespace App\Helper;

use App\Models\ProductStore;
use App\Models\OrderDetail;


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
            // 'store' => $product->productstore,
            'quantity' => $quantity,
            'price' => $product['price_buy'],
        ];
        if (isset($this->items[$product->id])) {
            //số lượng sản phẩm đã bán và tổng nhập kho
            $qty_buy = 0;
            $qty_buy = OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
                ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
                ->where('product_id', '=', $product->id)
                ->sum('httt_orderdetail.qty');
            $qty_store = 0;
            $qty_store = ProductStore::where('product_id', '=', $product->id)
                ->sum('qty');
            //cho trường hợp thêm sản phẩm từ item nhỏ của sản phẩm
            if (($this->items[$product->id]['quantity'] + $quantity) > ($qty_store - $qty_buy)) {
                return redirect()->back()->with('errorMessage', 'Số lượng sản phẩm vượt quá số lượng hàng tồn kho!');
            }
            else {
                $this->items[$product->id]['quantity'] += $quantity;
            }
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
    //     $t = (int)$this->item[$id]['price'] * (int)$item[$id]['quantity'];
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
