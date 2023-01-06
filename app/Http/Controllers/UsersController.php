<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class UsersController extends Controller
{


    public function index()
    {
        $users = User::paginate(25);

        return view('users.index', compact('users'));
    }

    public function create()
    {


        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $validator =  Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:25'],
                'role' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:55', 'unique:users,email'],
                'users.password' => ['confirmed', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validator->passes()) {
                $data = [
                    'uuid' => Str::uuid()->getHex(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                    'status' => $request->status,
                ];

                $user = User::create($data);

                $user->assignRole(Str::lower($request->role));

                UserDetail::create([
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'uuid' => Str::uuid()->getHex(),
                ]);


                return redirect()->route('users.index')
                    ->with(['success' => 'User berhasil ditambah.']);
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
        $user = User::where('uuid', $uuid)->first();

        return view('users.show', compact('user'));
    }


    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        return view('users.edit', compact('user'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $user =  User::where('uuid', $uuid)->first();
            $request->merge([ //for except email unique
                'id' => $user->id,
            ]);

            $validator = $this->userValidator($request->all());
            if ($validator->passes()) {

                $user =  User::where('uuid', $uuid)->first();

                if ($request->password != null) {
                    $request->merge([
                        'password' => bcrypt($request->password),
                    ]);
                } else {
                    $request->merge([
                        'password' => $user->password,
                    ]);
                }

                $user->update($request->all());

                return redirect()->route('users.index')
                    ->withSuccess('User berhasil diubah.');
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
            $user = User::where('uuid', $uuid)->first();
            $user->delete();

            return Response::json([
                'Success' => 'User was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getUserJson(Request $request)
    {
        $user = User::latest()->get();

        return DataTables::of($user)
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
    protected function userValidator($request)
    {
        $validator =  Validator::make($request, [
            'name' => ['required', 'string', 'max:25'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:55', 'unique:users,email,' . $request['id']],
            'users.password' => ['confirmed', 'string', 'min:8', 'confirmed'],
        ]);

        return $validator;
    }
}
