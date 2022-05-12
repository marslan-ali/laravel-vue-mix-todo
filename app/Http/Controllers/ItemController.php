<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Item::orderBy('order', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastRow = Item::orderBy('order', 'desc')->first();
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->order = $lastRow['order'] + 1;
        $newItem->save();

        return $newItem;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Item::find($id);
        
    }

    public function updateItem(Request $request,$id)
    {
        $existingItem = Item::find($id);  
        if($existingItem){
           $existingItem->name = $request->item['name'];
           $existingItem->updated_at = Carbon::now() ;
           $existingItem->save();
           return $existingItem;
        } 
        return "Item not found";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);  

        if($existingItem){
           $existingItem->completed = $request->item['completed'] ? true : false;
           $existingItem->completed_at = Carbon::now() ;
           $existingItem->updated_at = Carbon::now() ;
           $existingItem->save();
           return $existingItem;

        } 
        return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
           $existingItem->delete();
           return "Item deleted";
    }
    return "Item not found";
    }

    public function updateOrder(Request $request, $id)
    {
        $existingItem = Item::find($id);  
        if($existingItem){
           $existingItem->order = $request->order;
           $existingItem->updated_at = Carbon::now() ;
           $existingItem->save();
           return $existingItem;
        } 
        return "Item not found";
    }
}