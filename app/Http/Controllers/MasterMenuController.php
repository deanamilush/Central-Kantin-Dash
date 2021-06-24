<?php

namespace App\Http\Controllers;

use App\Models\MasterMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MasterMenu::all();
        return view('menu.index', compact('menu'));
        //return view('list', ['menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = DB::table('master_item')->get();
        // $item = $item->unique();
        // $data = DB::table('master_data')->get();
        return view('menu.create', compact('item'));
        // return view('menu.create', compact('item', 'data'));
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
        $input['hari'] = $request->input('hari');
        $input['menu_utama'] = $request->input('menu_utama');
        $input['menu_add_on'] = $request->input('menu_add_on');
        MasterMenu::create($input);

        
        // MasterMenu::create([
        //     'kode_katering'=> $request->kode_katering,
        //     'hari'=> $input,
        //     'menu_utama'=> $request->menu_utama,
        //     'menu_add_on'=> $request->menu_add_on,
        //     'harga_add_on'=> $request->harga_add_on,
        // ]);
        

        return redirect()->route('menu.index')->with('status', 'Add successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterMenu  $masterMenu
     * @return \Illuminate\Http\Response
     */
    public function show(MasterMenu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterMenu  $masterMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterMenu $menu)
    {
        $item = DB::table('master_item')->get();
        return view('menu.edit', compact('menu', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterMenu  $masterMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterMenu $menu)
    {
        // MasterMenu::where('id',$menu->id)
        //     ->update([
        //     'kode_katering'=> $request->kode_katering,
        //     'hari'=> $request->hari,
        //     'menu_utama'=> $request->menu_utama,
        //     'menu_add_on'=> $request->menu_add_on,
        //     'harga_add_on'=> $request->harga_add_on,
        // ]);

        $menu->update($request->all());
        return redirect()->route('menu.index')->with('status', 'Update successful');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterMenu  $masterMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterMenu $menu)
    {
        MasterMenu::destroy($menu->id);
        return redirect()->route('menu.index')->with('status', 'Delete successful');
    }
}
