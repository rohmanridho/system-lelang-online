<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\NullableType;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('level', 'staff')->orWhere('level', 'public')->orderByDesc('level')->paginate(7);
        return view('pages.admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'telp' => ['nullable', 'numeric']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'staff',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Berhasil menambah staff');
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
        $user = User::find($id);
        return view('pages.admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telp' => ['nullable', 'numeric'],
            'password' => ['nullable', 'confirmed', 'min:8', Rules\Password::default()],
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $password = $request->password ? Hash::make($request->password) : $user->password;
        $user->password = $password;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Berhasil mengupdate data user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Berasil menghapus data user');
    }
}
