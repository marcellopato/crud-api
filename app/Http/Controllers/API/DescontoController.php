<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DescontoResource;
use App\Models\Desconto;
use Illuminate\Http\Request;
use Validator;

class DescontoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Desconto::latest()->get();
        return response()->json([DescontoResource::collection($data), 'Descontos fetched.']);
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

        $desconto = Desconto::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json(['Desconto created successfully.', new DescontoResource($desconto)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desconto = Desconto::find($id);
        if (is_null($desconto)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new DescontoResource($desconto)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desconto $desconto)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $desconto->name = $request->name;
        $desconto->desc = $request->desc;
        $desconto->save();

        return response()->json(['Desconto updated successfully.', new DescontoResource($desconto)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desconto $desconto)
    {
        $desconto->delete();

        return response()->json('Desconto deleted successfully');
    }
}
