<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawatan;
use App\Http\Requests\PerawatanRequest;
use Yajra\Datatables\DataTables;
use Carbon\Carbon;


class Perawatancontroller extends Controller
{
    public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {
    $title = 'Perawatan Masuk';
       $items = Perawatan::where('status', 'PENDING')->orderBy('created_at', 'asc')->get();
           return view('pages.perawatan.index')->with (['items'=>$items,'title'=>$title]);
   }

   public function make()
   {
    $title = 'Tambah Laporan Perawatan';
    return view('pages.perawatan.create')->with(['title'=>$title]);
   }

   public function create(Request $request)
    {$date = Carbon::now();
        $daysToAdd = 4;
        $dates= $date->addDays($daysToAdd);
        Perawatan::create([
            'id_pelanggan'=>$request->id_pelanggan,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'kodepos'=>$request->kodepos,
            'telepon'=>$request->telepon,
            'perawatan'=>$request->perawatan,
            'tenggat'=>$dates
        ]);
        return redirect ()->route('perawatan.index');
    }


    public function store(Request $Request)
    {   $date = Carbon::now();
        $daysToAdd = 2;
       

          $item = Perawatan::find($Request->id);
            $item->id_pelanggan = $Request->id_pelanggan;
            $item->nama = $Request->nama;
            $item->alamat = $Request->alamat;
            $item->kodepos = $Request->kodepos;
            $item->telepon = $Request->telepon;
            $item->email = $Request->email;
            $item->perawatan = $Request->perawatan;
            $item->tenggat = $date->addDays($daysToAdd);
            $item->save();
            return response()->json($item);
    }

    public function show($id)
    {
        $item = Perawatan::find($id);
    	return response()->json($item);
        
    } 

    public function updateperawatan(Request $request)
    {
        $item = Perawatan::find($request->id);
        $item->id_pelanggan = $request->id_pelanggan;
        $item->nama = $request->nama;
        $item->alamat = $request->alamat;
        $item->kodepos = $request->kodepos;
        $item->telepon = $request->telepon;
        $item->email = $request->email;
        $item->perawatan = $request->perawatan;
        $item->save();
        return response()->json($item);
    }

    public function delete($id)
    {   
        $item = Perawatan::onlyTrashed()->find($id);
        $item->forceDelete();
    	return redirect ('perawatan/trash');
    }

    public function destroy($id)
    {
        $item = Perawatan::find($id)->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
          ]);
    }

    public function trash()
    {       $title = 'Perawatan Terhapus';
        $items = Perawatan::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    	return view('pages.perawatan.trash', [ 'items' => $items, 'title'=>$title]);
    }

    public function showtrash($id)
    {
        $item = Perawatan::withTrashed()->find($id)->get();
    	return response()->json($item);
        
    }

    public function restore(Request $request, $id)
    {
        $item = Perawatan::onlyTrashed()->find($id)->restore();
    	return redirect('perawatan/trash');
    }

    public function setStatus(Request $request, $id)
    {   
        
        $request->validate([
            ['status' => 'required|in:PENDING,PROCESSED'],
            ['operator'=> 'Auth::user()->name']
        ]);
        $item = Perawatan::findOrFail($id);
        $item->status = $request->status;
        $item->operator = $request->operator;
        $item->save();
        return redirect('perawatan');
    }  

    public function transaksi()
    {   $title = 'Perawatan Terproses';
        $items = Perawatan::where('status', 'PROCESSED')->orderBy('updated_at', 'desc')->get();
        return view('pages.perawatan.terproses')->with ([
            'items'=>$items, 'title'=>$title
        ]);
        
    }
}
