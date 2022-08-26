<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CampanhaResource;
use App\Models\Campanha;
use Illuminate\Http\Request;
use Validator;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Campanha::latest()->get();
        return response()->json([CampanhaResource::collection($data), 'Campanhas fetched.']);
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
            'desc' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $campanha = Campanha::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json(['Campanha created successfully.', new CampanhaResource($campanha)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campanha = Campanha::find($id);
        if (is_null($campanha)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new CampanhaResource($campanha)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campanha $campanha)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $campanha->name = $request->name;
        $campanha->desc = $request->desc;
        $campanha->save();

        return response()->json(['Campanha updated successfully.', new CampanhaResource($campanha)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campanha $campanha)
    {
        $campanha->delete();

        return response()->json('Campanha deleted successfully');
    }
}
