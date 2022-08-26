<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\Request;
use Validator;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produto::latest()->get();
        return response()->json([ProdutoResource::collection($data), 'Produtos fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $produto = Produto::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json(['Produto created successfully.', new ProdutoResource($produto)]);
    }

    /**ProdutosResourcethe specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if (is_null($produto)) {
            response()->json('Data not found', 404);
        }
        return response()->json([new ProdutoResource($produto)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $produto->name = $request->name;
        $produto->desc = $request->desc;
        $produto->save();

        return response()->json(['Produto updated successfully.', new ProdutoResource($produto)]);
    }

    /**ProdutosResourcehe specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return response()->json('Produto deleted successfully');
    }
}