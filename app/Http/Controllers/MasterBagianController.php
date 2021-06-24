<?php

namespace App\Http\Controllers;

use App\Models\MasterBagian;
use Illuminate\Http\Request;

class MasterBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = MasterBagian::all();
        return view('bagian.index', compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bagian.create');
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
        MasterBagian::create($input);
        return redirect()->route('bagian.index')->with('status', 'Add successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function show(MasterBagian $bagian)
    {
        return view('bagian.edit', compact('bagian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterBagian $bagian)
    {
        return view('bagian.edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterBagian $bagian)
    {
        // MasterBagian::where('id',$bagian->id)
        //     ->update([
        //     'kode_bagian'=> $request->kode_bagian,
        //     'bagian'=> $request->bagian,
        //     'lantai'=> $request->lantai,
        // ]);
        $bagian->update($request->all());
        return redirect()->route('bagian.index')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterBagian $bagian)
    {
        MasterBagian::destroy($bagian->id);
        return redirect()->route('bagian.index')->with('status', 'Delete successful');
    }
}
