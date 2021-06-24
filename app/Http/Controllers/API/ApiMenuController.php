<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllMenu()
    {
        $menu = MasterMenu::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Menu',
            'data' => $menu
        ], 200);
    }

    public function createMenu(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kode_katering'   => 'required|size:5',
                'hari'   => 'required',
                'menu_utama'   => 'required',
                'menu_add_on'   => 'required',
                'harga_add_on'   => 'required',
            ],
            [
                'kode_katering.required' => 'Kode Katering Tidak Boleh Kosong',
                'kode_katering.size' => 'Kode Katering Harus 5 Digit',
                'hari.required' => 'Hari Tidak Boleh Kosong',
                'menu_utama.required' => 'Menu Utama Tidak Boleh Kosong',
                'menu_add_on.required' => 'Menu Add On Tidak Boleh Kosong',
                'harga_add_on.required' => 'Harga Add On Tidak Boleh Kosong',
            ]
        );

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 422);
        } else {
            $menu = new MasterMenu();
            $menu->kode_katering = $request->kode_katering;
            $menu->hari = $request->hari;
            $menu->menu_utama = $request->menu_utama;
            $menu->menu_add_on = $request->menu_add_on;
            $menu->harga_add_on = $request->harga_add_on;
            $menu->save();

            return response()
                ->json([
                    'success' => true,
                    'data' => $menu
                ]);
        }
    }

    public function detailMenu($id)
    {
        $showMenu = MasterMenu::whereId($id)->first();

        if ($showMenu) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Vendor',
                'data'    => $showMenu
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Vendor Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    public function updateMenu(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'kode_katering'   => 'required|size:5',
                'hari'   => 'required',
                'menu_utama'   => 'required',
                'menu_add_on'   => 'required',
                'harga_add_on'   => 'required',
            ],
            [
                'kode_katering.required' => 'Kode Katering Tidak Boleh Kosong',
                'kode_katering.size' => 'Kode Katering Harus 5 Digit',
                'hari.required' => 'Hari Tidak Boleh Kosong',
                'menu_utama.required' => 'Menu Utama Tidak Boleh Kosong',
                'menu_add_on.required' => 'Menu Add On Tidak Boleh Kosong',
                'harga_add_on.required' => 'Harga Add On Tidak Boleh Kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'    => $validator->errors()
            ], 401);
        } else {

            $menu = MasterMenu::whereId($request->input('id'))->update([
                'kode_katering'     => $request->input('kode_katering'),
                'hari'   => $request->input('hari'),
                'menu_utama'   => $request->input('menu_utama'),
                'menu_add_on'   => $request->input('menu_add_on'),
                'harga_add_on'   => $request->input('harga_add_on'),
            ]);

            if ($menu) {
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

    public function deleteMenu($id)
    {

        $menu = MasterMenu::findOrFail($id);
        $menu->delete();

        if ($menu) {
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
