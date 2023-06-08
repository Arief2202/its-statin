<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\BidangKeahlian;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function isiSaldo(Request $request){
        if(Auth::user()->role != 2) return redirect('/');
        $user = User::where('email', $request->email)->first();
        $user->saldo = $user->saldo + $request->saldo;
        $user->save();
        return redirect('/isi-saldo');
    }
    public function isiSaldoView(){
        if(Auth::user()->role != 2) return redirect('/');
        return view('isi-saldo');
    }
    public function viewProfile(){
        return view('profile');
    }
    public function viewProfileEdit(){
        return view('profileEdit',[
            'keahlians' => BidangKeahlian::all(),
        ]);
    }
    public function viewPasswordEdit(){
        return view('ubahPassword');
    }
    public function passwordEdit(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        if (!Hash::check($request->old_password, $user->password)) return redirect()->back()->with('error', 'Password Lama salah');
        if($request->new_password != $request->cnew_password) return redirect()->back()->with('error', 'Password Baru dan Confirm Password Tidak Sama');         
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect('/profile');
    }
    public function profileEdit(Request $request){
        $requestValidated = (object) $request->validate([
            'foto' => 'image|file',
        ]);
        $user = User::where('id', $request->id)->first();
        if(isset($request->name)) $user->name = $request->name;
        if(isset($request->email)) $user->email = $request->email;
        if(isset($request->telp)) $user->telp = $request->telp;
        if(isset($request->instansi)) $user->instansi = $request->instansi;
        if(isset($request->kategori)) $user->kategori = $request->kategori;
        if(isset($request->bidangKeahlian_id)) $user->bidangKeahlian_id = $request->bidangKeahlian_id;
        if(isset($request->harga)) $user->harga = $request->harga;
        if(isset($request->deskripsi)) $user->deskripsi = $request->deskripsi;

        if($request->file('foto')){
            $file = $request->file('foto');

            $name = $user->id;
            $extension = $file->getClientOriginalExtension();
            $newName = $name.'.'.$extension;
            $input = '/uploads/foto/'.$newName;
            $request->foto->move(public_path('uploads/foto/'), $newName);

            $user->foto = $input;
        }
        $user->save();
        return redirect('/profile');
    }

    public function konsultasi($id){
        $keahlian = (object)[
            'nama' => null,
        ];
        if($id == "mahasiswa"){
            $users = User::where('role', '0')->where('id', '!=', Auth::user()->id)->get();
            $keahlian->nama = "Konsultasi Mahasiswa";
        }
        if($id == "dosen"){
            $users = User::where('role', '1')->where('id', '!=', Auth::user()->id)->get();
            $keahlian->nama = "Konsultasi Dosen";
        }
        return view('analisis-data-search',[
            'users' => $users,
            'keahlian' => $keahlian,
            'back' => '/dashboard/konsultasi-statistika'
        ]);
    }
    public function dashboard(){
        if(Auth::user()->kategori != 0) return redirect('/list-customer');
        return view('dashboard', [
            'statistikas' => User::where('kategori', '1')->where('id', '!=', Auth::user()->id)->orderBy('harga', 'ASC')->take(3)->get(),
            'analisisDatas' => User::where('kategori', '2')->where('id', '!=', Auth::user()->id)->orderBy('harga', 'ASC')->take(3)->get(),
        ]);
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function viewDetail($id)
    {
        return view('detail', [
            'user' => User::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
