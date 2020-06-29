<?php


namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Petugas;
use App\Dokumen;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dashboard()
    {
        //
        $title='Pembayaran';
        $Pembayaran=Pembayaran::paginate(5);
        //dd($Dokumen);
        return view('konten.homePembayaran',compact('title','Pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Pembayaran baru';
        //$Pelanggan=Pelanggan::all();
        return view('konten.pembayaran',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'date' => 'Kolom :attribute harus berupa tanggal!',
            'numeric' => 'Kolom :attribute harus berupa angka!'
        ];

        $validasi =$request->validate([
            'id_dokumen' =>'required',
            'id_petugas' =>'required',
            'status_pembayaran' =>'required',
            'jenis_pembayaran' =>'required'
        ],$messages);
        Pembayaran::create($validasi);
        return redirect('/pembayaran')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pembayaran)
    {
        $title='Update Pembayaran';
        $Pembayaran=Pembayaran::find($id_pembayaran);
        return view('konten.pembayaran',compact('title','Pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran)
    {
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'date' => 'Kolom :attribute harus berupa tanggal!',
            'numeric' => 'Kolom :attribute harus berupa angka!'
        ];

        $validasi =$request->validate([
            'id_dokumen' =>'required',
            'id_petugas' =>'required',
            'status_pembayaran' =>'required',
            'jenis_pembayaran' =>'required'
        ],$messages);
        Pembayaran::whereid_pembayaran($id_pembayaran)->update($validasi);
        return redirect('/pembayaran')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran)
    {
        Pembayaran::whereid_pembayaran($id_pembayaran)->delete();
    return redirect('/pembayaran')->with('success', 'Data berhasil dihapus!');
    }
    
}
