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

class UserDetailsController extends Controller
{


    public function index()
    {
        $userDetails = UserDetail::with('user')->paginate(25);

        return view('user_details.index', compact('userDetails'));
    }

    public function create()
    {
        $users = User::pluck('name', 'uuid')->all();

        return view('user_details.create', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
            ]);
            $validator = $this->userDetailValidator($request->all());

            if ($validator->passes()) {

                UserDetail::create($request->all());

                return redirect('userDetails.index')
                    ->with(['success' => 'UserDetail berhasil dibuat.']);
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
        $userDetail = UserDetail::with('user')->where('uuid', $uuid)->first();
        return view('user_details.show', compact('userDetail'));
    }


    public function edit($uuid)
    {
        $userDetail = UserDetail::where('uuid', $uuid)->first();
        $users = User::pluck('name', 'id')->all();

        return view('user_details.edit', compact('userDetail', 'users'));
    }


    public function update($uuid, Request $request)
    {
        // try {
        $validator = $this->userDetailValidator($request->all());

        if ($validator->passes()) {

            $userDetail = UserDetail::where('uuid', $uuid)->first();

            /**Start Image Function */
            if ($request['image'] != null) {
                $imageName = \Str::uuid()->getHex() . '.' . $request->image->extension();

                $request['image']->move(public_path('/assets/uploads/foto/'), $imageName);

                $request->merge([
                    'foto' => $imageName,
                ]);

                if ($userDetail->foto != null) {
                    $imageFile = public_path('/assets/uploads/foto/') . $userDetail->foto;


                    if (\File::exists($imageFile)) {

                        \File::delete($imageFile); // If $file is path to old image

                    } else {
                        return Response::json('File not exist.');
                    }
                }
            }
            /**End Image Function */


            $userDetail->update($request->all());

            if (getRole() == 'administrator') {
                return redirect()->route('userDetails.index')
                    ->with(['success' => 'User Detail berhasil simpan.']);
            }
            return back()
                ->with(['success' => 'User Detail berhasil simpan.']);
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
            $userDetail = UserDetail::where('uuid', $uuid)->first();
            $userDetail->delete();

            return Response::json([
                'Success' => 'User Detail was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getUserDetailJson(Request $request)
    {
        $userDetail = UserDetail::latest()->get();

        return DataTables::of($userDetail)
            ->addIndexColumn()
            ->addColumn('nama', function ($row) {
                return $row->user->name;
            })
            ->addColumn('email', function ($row) {
                return $row->user->email;
            })
            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action', 'nama', 'email'])
            ->make(true);
    }



    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function userDetailValidator($request)
    {
        $validator =  Validator::make($request, [
            'nama_lengkap' => 'string|min:1|required',
            'jk' => 'string|min:1|required',
            'tgl_lahir' => 'date_format:Y-m-d|required',
            'tempat_lahir' => 'string|required',
            'agama' => 'string|required',
            'alamat_ktp' => 'string|required',
            'alamat_sekarang' => 'string|required',
            'no_hp' => 'string|required',
            'pendidikan' => 'string|required',
            'instansi' => 'string|required',
            'jurusan' => 'string|required',
            'tahun_lulus' => 'integer|required',
            'image' => 'mimes:jpeg,jpg,png|max:512',
            'is_aktif' => 'boolean',
        ]);

        return $validator;


        $data['is_aktif'] = $request->has('is_aktif');
    }
}
