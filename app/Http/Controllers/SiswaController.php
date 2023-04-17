<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
   public function index()
   {
      $siswa = Siswa::with('user', 'kelas')->get();

      return view('siswa.index', compact('siswa'));
   }

   public function tambah()
   {
      $kelas = Kelas::all();
      return view('siswa.tambah', compact('kelas'));
   }

   public function simpan(Request $request)
   {
      try {

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'siswa'
       ]);

        Siswa::create([
            'user_id' => $user->id,
            'nis'=>$request->nis,
            'kelas_id'=>$request->kelas_id,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,

        ]);

         return redirect('siswa')->with('success', 'Data berhasil ditambahkan✅');
      } catch (\Exception $e) {
         $message = $e->getMessage();
         return redirect('siswa')->with('error', 'Data gagal ditambahkan❌' . "($message)");
      }
   }
   public function edit()
   {
      try {
         $siswa = Siswa::firstOrFail();
         $kelas = Kelas::all();

   
         return view('siswa.edit', compact('siswa', 'kelas'));
      }catch (\Exception $e){
         return redirect('siswa')->with('gagal', 'User tidak ditemukan❌');
      }
   }
   public function update(Request $request)
   {


      try {
        $siswa = Siswa::findOrFail($request->id);

        if($request->password != null){
         User::where ('id', $siswa->user_id)->update ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
         ]);

         }else{
            User::where ('id', $siswa->user_id)->update ([
               'name' => $request->name,
               'email' => $request->email,
            ]);
         }

         Siswa::where('id', $siswa->id)->update([
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,

         ]);
        
         return redirect('siswa')->with('success', 'Data berhasil diupdate✅');
      }catch (\Exception $e){
         $message = $e->getMessage();
         return redirect('siswa')->with('error', 'Data gagal ditambahkan❌' . "($message)");
      }
   }
   public function hapus($id)
   {
      try{
        $siswa = Siswa::firstOrFail();
        Siswa::destroy($id);

        return redirect('siswa')->with('success', 'Data berhasil dihapus✅');
      }catch (\Exception $e){
         return redirect('siswa')->with('error', 'Data gagal dihapus❌');
   }
}

}




