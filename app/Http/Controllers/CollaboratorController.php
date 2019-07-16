<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collaborator;

class CollaboratorController extends Controller
{
    public function index()
    {
        return Collaborator::all()->take(100);
    }

    public function show(Collaborator $collaborator)
    {
        return $collaborator;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sector' => 'required|exists:sectors,name',
            'full_name' => 'required',
            'birth_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);
        $request['status'] = true;
        $collaborator = Collaborator::create($request->all());

        return response()->json($collaborator, 201);
    }

    public function update(Request $request, Collaborator $collaborator)
    {
        $validatedData = $request->validate([
            'sector' => 'required|exists:sectors,name',
            'full_name' => 'required',
            'birth_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);
        $request['status'] = true;
        $collaborator->update($request->all());

        return response()->json($collaborator, 200);
    }

    public function delete(Collaborator $collaborator)
    {
        $collaborator->status = false;
        $collaborator->update();

        return response()->json(null, 204);
    }
}
