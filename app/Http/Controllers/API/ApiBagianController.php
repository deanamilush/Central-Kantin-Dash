<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterBagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBagianData()
    {
        $bag = MasterBagian::latest()->get();
        return response([
            'success' => true,
            'message' => 'List All Bagian',
            'data' => $bag
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBagian(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
                'kode_bagian' => 'required|size:5',
                'bagian' => 'required',
                'lantai' => 'required',
            ],
            [
                'kode_bagian.size' => 'Kode Bagian Harus 5 Buah',
                'bagian.required' => 'Harap Masukan Nama Bagian',
                'lantai.required' => 'Harap Masukan Lantai Bagian',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],422);
        }
        else {
            MasterBagian::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Store Data Successful!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function showBagian($id)
    {
        $bag = MasterBagian::whereId($id)->first();
        
        if ($bag) {
            return response()->json([
                'success' => true, 
                'message' => 'Retrieved Successfully!',
                'data' => $bag,
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
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function updateBagian(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, 
            [
                'kode_bagian' => 'required|size:5',
                'bagian' => 'required',
                'lantai' => 'required',
            ],
            [
                'kode_bagian.size' => 'Kode Bagian Harus 5 Buah',
                'bagian.required' => 'Harap Masukan Nama Bagian',
                'lantai.required' => 'Harap Masukan Lantai Bagian',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],401);
        }
        else {
            // $bag = MasterBagian::whereId($request->input('id'))->update($data);

            $bag = MasterBagian::whereId($request->input('id'))->update([
                'kode_bagian' => $request->input('kode_bagian'),
                'bagian'   => $request->input('bagian'),
                'lantai'   => $request->input('lantai')
            ]);

            if ($bag) {
                return response()->json([
                    'success' => true, 
                    'message' => 'Updated Successfully!',
                ], 200);
            }
            else {
                return response()->json([
                    'success' => false, 
                    'message' => 'Update Failed!',
                ], 401);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterBagian  $masterBagian
     * @return \Illuminate\Http\Response
     */
    public function deleteBagian($id)
    {
        $bag = MasterBagian::findOrFail($id);
        $bag->delete();

        if ($bag) {
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
