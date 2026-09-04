<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    protected $katService;

    public function __construct(CategoryService $katService)
    {
        $this->katService = $katService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $kat = $this->katService->getKat();

            return response()->json([
                'status' => 'message',
                'message' => 'Ini Adalah daftar Kategori',
                'data' => $kat
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'kategori' => 'required|string|max:55'
        ]);
        try{
            $kat = $this->katService->createKat($validator);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambah Kategori',
                'data' => $kat
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
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'kategori' => 'required|sometimes|string'
        ]);

        try{
            $kat = $this->katService->updateKat($id, $validator);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil update',
                'data' => $kat
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
            $this->katService->deleteKat($id);

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
