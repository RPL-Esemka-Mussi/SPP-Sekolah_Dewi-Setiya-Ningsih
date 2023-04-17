<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
   public function index()
   {
      $kelas = Kelas::all();

      return view('kelas.index', compact('kelas'));
   }

   public function tambah()
   {
      return view('kelas.tambah');
   }

   public function simpan(Request $request)
   {
      try {
        Kelas::create([
            'kelas'=>$request->kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian,
        ]);

         return redirect('kelas')->with('success', 'Data berhasil ditambahkan✅');
      } catch (\Exception $e) {
         return redirect('kelas')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function edit()
   {
      try {
         $kelas = Kelas::firstOrFail();

   
         return view('kelas.edit', compact('kelas'));
      }catch (\Exception $e){
         return redirect('kelas')->with('gagal', 'User tidak ditemukan❌');
      }
   }
   public function update(Request $request)
   {
      try {
        kelas::where('id', $request->id)->update([
            'kelas'=>$request->kelas,
            'kompetensi_keahlian'=>$request->kompetensi_keahlian,
        ]);
        
         return redirect('kelas')->with('success', 'Data berhasil diupdate✅');
      }catch (\Exception $e){
         return redirect('kelas')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function hapus($id)
   {
      try{
         
        $kelas = Kelas::firstOrFail();
        Kelas::destroy($id);

        return redirect('kelas')->with('success', 'Data berhasil dihapus✅');
      }catch (\Exception $e){
         return redirect('kelas')->with('error', 'Data gagal dihapus❌');
   }
}

}


