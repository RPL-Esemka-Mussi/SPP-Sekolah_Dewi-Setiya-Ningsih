<?php

namespace App\Http\Controllers;


use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
   public function index()
   {
      $spp = Spp::all();

      return view('spp.index', compact('spp'));
   }

   public function tambah()
   {
      return view('spp.tambah');
   }

   public function simpan(Request $request)
   {
      try {
        Spp::create([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal,
        ]);

         return redirect('spp')->with('success', 'Data berhasil ditambahkan✅');
      } catch (\Exception $e) {
         return redirect('spp')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function edit()
   {
      try {
         $spp = Spp::firstOrFail();

   
         return view('spp.edit', compact('spp'));
      }catch (\Exception $e){
         return redirect('spp')->with('gagal', 'User tidak ditemukan❌');
      }
   }
   public function update(Request $request)
   {
      try {
        Spp::where('id', $request->id)->update([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal,
        ]);
        
         return redirect('spp')->with('success', 'Data berhasil diupdate✅');
      }catch (\Exception $e){
         return redirect('spp')->with('error', 'Data gagal ditambahkan❌');
      }
   }
   public function hapus($id)
   {
      try{
        $spp = Spp::firstOrFail();
        Spp::destroy($id);

        return redirect('spp')->with('success', 'Data berhasil dihapus✅');
      }catch (\Exception $e){
         return redirect('spp')->with('error', 'Data gagal dihapus❌');
   }
}

}



