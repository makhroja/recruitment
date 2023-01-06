<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class PositionsController extends Controller
{


    public function index()
    {
        $positions = Position::with('unit')->paginate(25);

        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        $units = Unit::pluck('nama', 'id')->all();
        $method = '';
        return view('positions.create', compact('units', 'method'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
            ]);
            $validator = $this->positionValidator($request->all());

            if ($validator->passes()) {

                Position::create($request->all());

                #redirect to Unit Show
                if ($request->method == 'fromUnit') {
                    $uuid = Unit::findOrFail($request->unit_id)->uuid;
                    return redirect()->route('units.show', $uuid)
                        ->with(['success' => 'Position berhasil dibuat.']);
                }
                return redirect()->route('positions.index')
                    ->with(['success' => 'Position berhasil dibuat.']);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    public function show($uuid)
    {
        $position = Position::with('unit')->where('uuid', $uuid)->first();

        return view('positions.show', compact('position'));
    }


    public function edit($uuid)
    {
        $position = Position::where('uuid', $uuid)->first();
        $units = Unit::pluck('nama', 'id')->all();

        #untuk membedakan edit dari view job
        $uuid = explode("=", $uuid);
        if ($uuid[0] == 'uuid') {
            $position = Position::where('uuid', $uuid[1])->first();
            $method = 'fromJob';
        } else {
            $position = Position::where('uuid', $uuid)->first();
            $method = '';
        }

        return view('positions.edit', compact('position', 'units', 'method'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $validator = $this->positionValidator($request->all());

            if ($validator->passes()) {

                $position = Position::where('uuid', $uuid)->first();
                $position->update($request->all());
                #redirect to unit show
                if ($request->method == 'fromJob') {
                    $unitId = Unit::findOrFail($request->unit_id)->uuid;
                    return redirect()->route('units.show', $unitId)
                        ->with(['success' => 'Posisi berhasil simpan.']);
                }

                return redirect()->route('positions.index')
                    ->with(['success' => 'Posisi berhasil simpan.']);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    public function destroy($uuid)
    {
        try {
            $position = Position::where('uuid', $uuid)->first();
            $position->delete();

            return Response::json([
                'Success' => 'Position was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getPositionJson(Request $request)
    {
        $position = Position::latest()->get();

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
    protected function positionValidator($request)
    {
        $validator =  Validator::make($request, [
            'unit_id' => 'required',
            'nama' => 'string|min:1|required',
            'status' => 'string|min:1|required',
        ]);

        return $validator;
    }
}
