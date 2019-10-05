<?php

namespace App\Http\Controllers;
use App\Item;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('list', compact('items'));
    }

    public function create(Request $request){
        $item = new Item;
        $item->item = $request->text;
        $item->save();
        return "Done";
    }

    public function update(Request $request){
        $item = Item::find($request->id);
        $item->item = $request->value;
        $item->save();
        return "item updated";
    }


    public function delete(Request $request){
        $item = Item::where('id', $request->id);
        $item->delete();
        return "item deleted";
    }
    public function deleteit(Request $request){
        $item_id_array = $request->input('id');
        $item = Item::whereIn('id', $item_id_array);
        if($item->delete())
        {return "item deleted";}
    }

   
}
