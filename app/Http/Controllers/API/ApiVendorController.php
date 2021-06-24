<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ArrayResource;

class ApiVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVendorData()
    {
        $ven = MasterVendor::latest()->get();
        return response([
            'success' => true,
            'message' => 'List All Vendor',
            'data' => $ven
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVendor(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
                'nama' => 'required|max:255',
                'kode' => 'required|size:5',
                'harga_katering_dasar' => 'required',
                'add_on' => 'required',
                'harga_add_on' => 'required',
            ],
            [
                'nama.required' => 'Harap Masukan Nama Vendor (Maks 255)',
                'kode.size' => 'Kode Vendor Harus 5 Buah',
                'harga_katering_dasar.required' => 'Harap Masukan Harga Dasar Katering',
                'add_on.required' => 'Harap Masukan Menu Tambahan',
                'harga_add_on.required' => 'Harap Masukan Harga Menu Tambahan'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],422);
        }
        else {
            MasterVendor::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Store Data Successful!',
                'data' => $data
            ]);
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function showVendor($id)
    {
        $ven = MasterVendor::whereId($id)->first();
        
        if ($ven) {
            return response()->json([
                'success' => true, 
                'message' => 'Retrieved Successfully!',
                'data' => $ven,
            ], 200);
        }
        else {
            return response()->json([
                'success' => false, 
                'message' => 'Retrieved Failed!',
                'data' => '',
            ], 401);
        }
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function updateVendor(Request $request, MasterVendor $vendor)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|max:255',
                'kode' => 'required|size:5',
                'harga_katering_dasar' => 'required',
                'add_on' => 'required',
                'harga_add_on' => 'required',
            ],
            [
                'nama.required' => 'Harap Masukan Nama Vendor (Maks 255)',
                'kode.size' => 'Kode Vendor Harus 5 Buah',
                'harga_katering_dasar.required' => 'Harap Masukan Harga Dasar Katering',
                'add_on.required' => 'Harap Masukan Menu Tambahan',
                'harga_add_on.required' => 'Harap Masukan Harga Menu Tambahan',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'    => $validator->errors()
            ], 401);
        } else {

            $vendor = MasterVendor::whereId($request->input('id'))->update([
                'nama'     => $request->input('nama'),
                'kode'   => $request->input('kode'),
                'harga_katering_dasar'   => $request->input('harga_katering_dasar'),
                'add_on'   => $request->input('add_on'),
                'harga_add_on'   => $request->input('harga_add_on'),
            ]);

            if ($vendor) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu Gagal Diupdate!',
                ], 401);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function deleteVendor($id)
    {
        $ven = MasterVendor::findOrFail($id);
        $ven->delete();

        if ($ven) {
            return response()->json([
                'success' => true,
                'message' => 'Menu Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Menu Gagal Dihapus!',
            ], 400);
        }
    }
}
