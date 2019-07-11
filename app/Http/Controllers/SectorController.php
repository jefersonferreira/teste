<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;

class SectorController extends Controller
{
    public function index()
    {
        return Sector::all();
    }

    public function show(Sector $sector)
    {
        return $sector;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sectors'
        ]);
        $sector = Sector::create($request->all());

        return response()->json($sector, 201);
    }

    public function update(Request $request, Sector $sector)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sectors'
        ]);
        $sector->update($request->all());

        return response()->json($sector, 200);
    }

    public function delete(Sector $sector)
    {
        $sector->delete();

        return response()->json(null, 204);
    }
}
