<?php

namespace App\Http\Controllers;

use App\Models\FurnitureType;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(){
        $items = Item::inRandomOrder()->take(4)->get();

        return view('home', [
            'items' => $items
        ]);
    }

    public function addFurniture(Request $request){
        $furniture = $request->validate([
            'name' => 'required|max:15',
            'price' => 'required|numeric|between:5000,10000000',
            'furniture_type' => 'required|in:Bedside Table,Rak,Lemari Pakaian,Meja Tamu,Kursi,Sofa',
            'color' => 'required',
            'image' => 'required|file|mimes:jpg,png,jpeg',
        ]);

        $furniture['image'] = $request->file('image')->store('furniture-images');

        Item::create($furniture);

        $request->session()->flash('item/success_input', 'Successfully input a new furniture!');

        return redirect('/');
    }

    public function updateFurniture(Item $items, Request $request){

    
        $update = $request->validate([
            'name' => 'required|max:15',
            'price' => 'required|numeric|between:5000,10000000',
            'furniture_type' => 'required',
            'color' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg',
        ]);

        if($request->hasFile('image')){
            $update['image'] = $request->file('image')->store('furniture-images');
            Storage::delete($items->image);
        }else{
            $update['image'] = $items->image;
        }
             

        Item::where('id', $items->id)
                ->update($update);
        
        return redirect('/')->with('items/success_update', 'Furniture has been updated');
    }


    public function deleteFurniture(Item $items){
        Item::where('id', $items->id)
                ->delete($items);

        return redirect('/')->with('item(success_delete', 'Furniture has been deleted');

    }


    public function displayInsert(){

        $types = FurnitureType::all();

        return view('addFurniture', [
            'types' => $types
        ]);
    }

    

    public function displayUpdate(Item $items){
        $types = FurnitureType::all();
        
        return view('updateFurniture', [
            'items' => $items,
            'types' => $types
        ]);
    }
    


    public function displayDetail(Item $items){
        return view('detail', [
            'items' => $items
        ]);
    }


    public function find(){
        return view('view', [
            'items' => Item::inRandomOrder()->search()->paginate(4)->withQueryString()
        ]);
    }
}
