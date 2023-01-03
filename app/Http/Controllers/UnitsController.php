<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class UnitsController extends Controller
{


    public function index()
    {
        $units = Unit::with('user')->paginate(25);

        return view('units.index', compact('units'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id')->all();

        return view('units.create', compact('users'));
    }

    public function store(Request $request)
    {
        // try {
        $request = $request->merge([
            'uuid' => Str::uuid()->getHex(),
        ]);
        $validator = $this->unitValidator($request->all());

        if ($validator->passes()) {

            Unit::create($request->all());

            return redirect()->route('units.index')
                ->with(['success' => 'Unit berhasil dibuat.']);
        }
        return back()
            ->withErrors($validator)
            ->withInput();
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }
    }


    public function show($uuid)
    {
        $unit = Unit::with('user')->where('uuid', $uuid)->first();

        return view('units.show', compact('unit'));
    }


    public function edit($uuid)
    {
        $unit = Unit::where('uuid', $uuid)->first();
        $users = User::pluck('name', 'id')->all();

        return view('units.edit', compact('unit', 'users'));
    }


    public function update($uuid, Request $request)
    {
        // try {
        $validator = $this->unitValidator($request->all());

        if ($validator->passes()) {

            $unit = Unit::where('uuid', $uuid)->first();
            $unit->update($request->all());

            return redirect()->route('units.index')
                ->with(['success' => 'Unit berhasil simpan.']);
        }
        return back()
            ->withErrors($validator)
            ->withInput();
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }
    }


    public function destroy($uuid)
    {
        try {
            $unit = Unit::where('uuid', $uuid)->first();
            $unit->delete();

            return Response::json([
                'Success' => 'Unit was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getUnitJson(Request $request)
    {
        $unit = Unit::latest()->get();

        return DataTables::of($unit)
            ->addIndexColumn()

            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getPositionJson($uuid = '')
    {
        $position = Position::where('unit_id', getUnitId($uuid)->id)->get();

        return DataTables::of($position)
            ->addIndexColumn()

            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function unitValidator($request)
    {
        $validator =  Validator::make($request, [
            'user_id' => 'required',
            'nama' => 'string|min:1|required',
            'status' => 'string|min:1|required',
        ]);

        return $validator;
    }
}
