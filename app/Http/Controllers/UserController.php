<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();

      return view('user.index', compact('users'));
   }

   public function tambah()
   {
      return view('user.tambah');
   }

   public function simpan(Request $request)
   {
      try {
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
         ]);

         return redirect('user')->with('success', 'Data berhasil ditambahkan✅');
      } catch (\Exception $e) {
         return redirect('user')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function edit()
   {
      try {
         $user = User::firstOrFail();
   
         return view('user.edit' , compact('user'));
      }catch (\Exception $e){
         return redirect('user')->with('gagal', 'User tidak ditemukan❌');
      }
   }
   public function update(Request $request)
   {
      try {
         if($request->password != null){
         User::where ('id', $request->id)->update ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
         ]);
         }else{
            User::where ('id', $request->id)->update ([
               'name' => $request->name,
               'email' => $request->email,
               'level' => $request->level,
            ]);
         }
         return redirect('user')->with('success', 'Data berhasil diupdate✅');
      }catch (\Exception $e){
         return redirect('user')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function hapus($id)
   {
      try{
         $user = User::firstOrFail();
        User::destroy($id);

        return redirect('user')->with('success', 'Data berhasil dihapus✅');
      }catch (\Exception $e){
         return redirect('user')->with('error', 'Data gagal dihapus❌');
   }
}

}

