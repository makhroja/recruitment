<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    public function getUnitLists(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Unit::select("id", "nama")
                ->where('nama', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function getUserLists(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = User::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function getPositionLists(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Position::select("id", "nama")
                ->where('nama', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }
}
