<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::all();
        return response()->json($people, 200);
    }

    public function show($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        return response()->json($person, 200);
    }

    public function store(Request $request)
    {
        $person = People::create($request->all());

        return response()->json($person, 201);
    }

    public function update(Request $request, $id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $person->update($request->all());

        return response()->json($person, 200);
    }

    public function destroy($id)
    {
        $person = People::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $person->delete();

        return response()->json(['message' => 'Person deleted'], 200);
    }
}