<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class TeamUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = DB::table('users')
        ->select(
        'users.id as user_id',
        'users.name',
        'users.email',
        'users.role',
        'users.created_at'
        )
        ->where('is_admin', '!=', 0)
        ->whereNull('deleted_at')
        ->get();

        return view('admin.data-user', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->whereNull('deleted_at'),
            ],
            'password' => 'required',
            'password_confirmation' => 'required|required_with:password|same:password',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
            'role' => $request->type,
            'created_at' => Carbon::now()
        ];

        DB::table('users')->insert($userData);

        session()->flash('alert', ['type' => 'success', 'message' => 'Your Data is Submitted']);

        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')
        ->select(
            'users.id as user_id',
            'users.name',
            'users.email',
            'users.role',
            'users.created_at'
        )
        ->where('is_admin', '!=', 0)
        ->where('users.id', $id)
        ->first();

    return view('admin.edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|required_with:password|same:password',
        ], [
            'password.required_with' => 'Password harus diisi jika Repeat Password diisi.',
            'password_confirmation.required_with' => 'Repeat Password harus diisi jika Password diisi.',
            'password_confirmation.same' => 'Password dan Repeat Password harus sama.',
            'password.same' => 'Password dan Repeat Password harus sama.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->type,
            'updated_at' => Carbon::now()
        ];

        // Jika password tidak kosong, tambahkan ke data untuk diupdate
        if ($request->filled('password')) {
            $userData['password'] = Hash($request->password);
        }

       // Update data pengguna
       DB::table('users')
       ->where('id', $id)
       ->update($userData);

       session()->flash('alert', ['type' => 'success', 'message' => ' Your Data has been deleted ']);

       return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update(['deleted_at' => now()]);

        session()->flash('alert', ['type' => 'success', 'message' => ' Your Data has been deleted ']);

        return redirect()->route('team.index');
    }
}
