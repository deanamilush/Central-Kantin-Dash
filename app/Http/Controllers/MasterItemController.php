<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use App\Models\MasterMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = MasterItem::all();
        return view('item.index', compact('item'));
    }

    public function dropDownShow()

    {
        $data = DB::table('master_data')->get();
        return view('item.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('master_data')->get();
        return view('item.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        MasterItem::create($input);
        return redirect()->route('item.index')->with('status', 'Add successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function show(MasterItem $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterItem $item)
    {
        $data = DB::table('master_data')->get();
        return view('item.edit', compact('data', 'item'));
        // return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterItem $item)
    {
        $item->update($request->all());
        return redirect()->route('item.index')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterItem $item)
    {
        MasterItem::destroy($item->id);
        return redirect()->route('item.index')->with('status', 'Delete successful');
    }
}
