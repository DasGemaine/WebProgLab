<?php

namespace App\Http\Controllers;


use App\Models\Item;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function create($id)
    {
        $item = Item::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;

        } else {

            $cart[$id] = [
                "itemID" => $item->id,
                "name" => $item->name,
                "qty" => 1,
                "price" => $item->price,
                "image" => $item->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success_add-to-cart', 'Furniture added to cart successfully!');
    }

    public function remove_item($id){
        $item = Item::findOrFail($id);

        $cart = session()->get('cart', []);


        if(isset($cart[$id])) {
            $cart[$id]['qty']--;

        }

        if($cart[$id]['qty'] <= 0){
            unset($cart[$id]);
        }

        if(empty($cart)){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        }


        return redirect()->back();
    }
}
