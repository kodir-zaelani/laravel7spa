<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Category',
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
        ],
            [
                'title.required' => 'Masukkan Title Category !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $path = $request->file('image')->store('categories_images');
            
            $category = Category::create([
                'title'  => $request->input('title'),
                'slug'   => Str::slug($request->input('title')),
                'image'  => $path
            ]);


            if ($category) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Category Gagal Disimpan!',
                ], 400);
            }
        }
    }


    public function show($id)
    {
        $category = Category::whereId($id)->first();

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Category!',
                'data'    => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
        ],
            [
                'title.required' => 'Masukkan Title Category !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $category = Category::whereId($request->input('id'))->update([
                'title'     => $request->input('title'),
                'slug'   => Str::slug($request->input('title'))
            ]);


            if ($category) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Category Gagal Diupdate!',
                ], 500);
            }

        }

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Category Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category Gagal Dihapus!',
            ], 500);
        }

    }
}
