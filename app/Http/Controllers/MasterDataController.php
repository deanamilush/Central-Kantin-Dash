<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterData::all();
        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
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
        MasterData::create($input);
        return redirect()->route('data.index')->with('status', 'Add successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function show(MasterData $data)
    {
        return view('data.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterData $data)
    {
        return view('data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterData $data)
    {
        $data->update($request->all());
        return redirect()->route('data.index')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterData $data)
    {
        MasterData::destroy($data->id);
        return redirect()->route('data.index')->with('status', 'Delete successful');
    }
}
