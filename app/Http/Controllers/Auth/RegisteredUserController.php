<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $userId = DB::table('users')->insertGetId([
                'name'       => $request->input('name'),
                'email'      => $request->input('email'),
                'password'   => bcrypt($request->input('password')),
                'role'       => 'personnel',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('data_personnels')->insert([
                'user_id'       => $userId,
                'nama_lengkap'  => $request->input('name'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::commit();
            // Auth::loginUsingId($userId); // Login dulu
            session()->flash('success', 'Pendaftaran berhasil, silahkan Login terlebih dahulu!'); // Flash pesan setelah login
            return redirect()->route('login');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
