<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use LDAP\Result;
use Exception;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'index'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validator = $request->validate([
                'name' => 'required|string|max:55',
                'jumlah' => 'required|integer|min:1',
                'deskripsi' => 'required|string|max:255'
            ]); 

            $result =  $this->productService->createProduct($validator);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => $result
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $result = $this->productService->getProduct($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Data ditemukan',
                'data' => $result
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validator = $request->validate([
                'name' => 'required|sometimes|string|max:55',
                'jumlah' => 'required|sometimes|integer|min:1',
                'deskripsi' => 'required|sometimes|string|max:255'
            ]);

            $result = $this->productService->updateProduct($id, $validator);

            return response()->json([
                'status' => 'succes',
                'message' => 'Data telah di update',
                'data' => $result
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->productService->deleteProduct($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil di hapus',
                'data' => null
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
