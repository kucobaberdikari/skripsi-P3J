<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perbaikan;
use App\Http\Requests\PerbaikanRequest;
use Illuminate\Support\Carbon;

class Perbaikancontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $title = 'Perbaikan Masuk';
        $data = Perbaikan::where('status', 'PENDING')->orderBy('created_at', 'desc')->get();
        return view('pages.perbaikan.index')->with (['data'=>$data,'title'=>$title]);
        
    }  

    public function create()
    {   $title = 'Tambah Pengaduan Perbaikan';   
        return view('pages.perbaikan.create')->with (['title'=>$title]);
    }

    public function store(Request $request)
    {
        $date = Carbon::now();
        $daysToAdd = 4;
        $dates= $date->addDays($daysToAdd);
        Perbaikan::create([
            'id_pelanggan'=>$request->id_pelanggan,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'kodepos'=>$request->kodepos,
            'telepon'=>$request->telepon,
            'deskripsi'=>$request->deskripsi,
            'tenggat'=>$dates
        ]);
        return redirect ()->route('perbaikan.index');
    }

    public function show($id)
    {
        $item = Perbaikan::find($id);
    	return response()->json($item);
    }

    public function edit($id)
    {
        $items = Perbaikan::findOrFail($id);
        return view('pages.perbaikan.edit')->with([
            'items' => $items
        ]);
    }

    public function updateperbaikan(Request $request)
    {
        $item = Perbaikan::find($request->id);
        $item->nama = $request->nama;
        $item->id_pelanggan = $request->id_pelanggan;
        $item->alamat = $request->alamat;
        $item->kodepos = $request->kodepos;
        $item->telepon = $request->telepon;
        $item->email = $request->email;
        $item->description = $request->description;
        $item->save();
        return response()->json($item);
    }
public function destroy($id)
    {
        $item = Perbaikan::find($id)->delete();
        return response()->json($item);
    }

    public function restore($id)
    {
        $items = Perbaikan::onlyTrashed()->where('id',$id)->restore();
    	return redirect ('perbaikan/trash');
    }

    public function delete($id)
    {
        $item = Perbaikan::onlyTrashed()->find($id);
        $item->forceDelete();
    	return redirect ('perbaikan/trash');
    }

    public function trash()
    {   $title = 'Perbaikan Terhapus';
        $items = Perbaikan::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    	return view('pages.perbaikan.trash', [ 'items' => $items, 'title'=>$title]);
            
    }

    public function transaksi()
    {   $title = 'Perbaikan Terproses';
        $items = Perbaikan::where('status', 'PROCESSED')->orderBy('updated_at', 'desc')->get();
        return view('pages.perbaikan.transaksi')->with (['items'=>$items, 'title'=>$title]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
           [ 'status' => 'required|in:PENDING,PROCESSED'],
           ['operator'=> 'Auth::user()->name']
        ]);

        $item = Perbaikan::findOrFail($id);
        $item->status = $request->status;
        $item->operator = $request->operator;
        $item->save();
        return redirect()->route('perbaikan.index');
    }
    
}
