<?php

namespace App\Http\Controllers;

use App\Imports\ImportPerawatan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\transaksi_perawatan;
use App\Models\Perawatan;
use App\Http\Requests\PerawatanRequest;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiPerawatanController extends Controller
{
    public function index()
    {   $title = 'Transaksi Laporan Terlaksana';       
        $item = transaksi_perawatan::where('status','terkonfirmasi')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.import_perawatan')->with(['item'=>$item,'title'=>$title]);
    }
    public function selesai()
    {   $title = 'Transaksi Perawatan Selesai';  
        $item = transaksi_perawatan::where('status','selesai')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.transaksi_perawatan_selesai')->with(['item'=>$item,'title'=>$title]);
    }
    public function gagal()
    {   $title = 'Transaksi Perawatan Gagal';
        $item = transaksi_perawatan::where('status','gagal')->orderBy('created_at', 'desc')->get();
        return view('pages.transaksi.transaksi_perawatan_gagal')->with(['item'=>$item,'title'=>$title]);
    }
    public function registerperawatan()
    {$title = 'Buat Pengaduan';
        return view('pages.member.registerperawatan')->with(['title'=>$title]);
    }

    public function create()
    {   
        $data = $request->all();
        $items = Perawatan::findOrFail($id);
        $items->update($data);

        return redirect()->route('perawatan.index');
    }

    
    public function store(Request $request)
    {
        $dibuat = Carbon::now();
        $date = Carbon::now();
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
        $item = ([
            'id_pelanggan'=>$request->id_pelanggan,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'kodepos'=>$request->kodepos,
            'telepon'=>$request->telepon,
            'perawatan'=>$request->perawatan,
            'dibuat'=>$dibuat,
            'tenggat'=>$dates
        ]);
        return view ('pages.transaksi.receipts_perawatan')->with(['item'=>$item]);
    }

   
    public function show($id)
    {
        $item = transaksi_perawatan::find($id);
    	return response()->json($item);
        
    }

    public function receipts($id)
    { 
        $item = transaksi_perawatan::find($id);
    	return view('pages.transaksi.receipts_perawatan')->with(['item'=>$item]);
    }
    public function invoice($id)
    { 
        $items = transaksi_perawatan::find($id);
    	return view('pages.transaksi.invoice_perawatan')->with(['items'=>$items]);
    }

    
    public function cari_laporan_gagal($kodepos1,$kodepos2,$tgl1,$tgl2)
    {   $title = 'Transaksi Perawatan Gagal';
        $item=transaksi_perawatan::where([
            ['status', 'gagal'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tgl1,$tgl2])
        ->orderBy('id_transaksi', 'asc')->get();
        return view('pages.transaksi.transaksi_perawatan_gagal')->with(['item'=>$item,'title'=>$title]);
    }
    public function cari_laporan_selesai($kodepos1,$kodepos2,$tgl1,$tgl2)
    {   $title = 'Transaksi Perawatan Selesai';
        $item=transaksi_perawatan::where([
            ['status', 'selesai'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tgl1,$tgl2])
        ->orderBy('id_transaksi', 'asc')->get();
        return view('pages.transaksi.transaksi_perawatan_selesai')->with(['item'=>$item,'title'=>$title]);
    }

    public function destroy($id)
    {
        $items = Perawatan::find($id)->where()->delete();
        return redirect ('transaksiperawatan');
    }

    public function cetaklaporan()
    {   $title = 'Cetak Laporan Perawatan';
        return view('pages.perawatan.cetaklaporan')->with(['title'=>$title]);
    }

    public function cetaklaporanpertanggal($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {   $title = 'Laporan Perawatan Terproses';
        $cetaklaporan=Perawatan::where([
            ['status', 'PROCESSED'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('created_at',[$tglawal,$tglakhir])
        ->orderBy('kodepos', 'asc')->get();
        return view('pages.perawatan.cetaklaporanpertgl')->with([ 
            'cetaklaporan'=>$cetaklaporan,
            'kodepos1'=>$kodepos1,
            'kodepos2'=>$kodepos2,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir,
            'title'=>$title
        ]);
    }

    public function importdata(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('transaksi_perawatan', $namaFile);

        Excel::import(new ImportPerawatan, public_path ('transaksi_perawatan/'.$namaFile));
        return redirect('transaksi/perawatan');
    }

    public function eksporlaporanpertanggal($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {   
        $eksporlaporan= Perawatan::where([
            ['status', 'PROCESSED'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tglawal,$tglakhir])
        ->orderBy('kodepos', 'asc')->get();
        return view('pages.perawatan.eksporlaporan')->with([ 
            'eksporlaporan'=>$eksporlaporan,
            'kodepos1'=>$kodepos1,
            'kodepos2'=>$kodepos2,
            'tglawal'=>$tglawal,
            'tglakhir'=>$tglakhir
        ]);
    }

    public function Statusakhir(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:SELESAI,GAGAL'
        ]);
        $item = transaksi_perawatan::findOrFail($id);
        $item->status = $request->status;
        $item->save();
        return redirect('transaksi/perawatan');
    }  

    public function laporan_tahunan()
    {
        $title = 'Cetak Laporan Tahunan Transaksi Perawatan';
        return view('pages.transaksi.cetaklaporanperawatan')->with(['title'=>$title]);

    }

    public function print_laporan_tahunan($tglawal,$tglakhir,$kodepos1,$kodepos2)
    {    $title = 'Laporan Tahunan Layanan Perawatan';
        $report =[];
        $cards = transaksi_perawatan::select([
            'perawatan',
            \DB::raw("DATE_FORMAT(updated_at, '%Y-%m') as month"),
            \DB::raw('COUNT(id) as invoices'),
            \DB::raw('SUM(biaya) as amount')
        ])
        ->where([['status','selesai'],['kodepos','>=',[$kodepos1]],['kodepos','<=',[$kodepos2]],])
        ->whereBetween('updated_at',[$tglawal,$tglakhir])
        ->groupBy('perawatan')
        ->groupBy('month')
        ->get();
    
        $cards->each(function($item) use (&$report) {
            $report[$item->month][$item->perawatan] = [
                'count' => $item->invoices,
                'amount' => $item->amount
            ];
        });
    
        $job_comp_codes = $cards->pluck('perawatan')->sortBy('perawatan')->unique();
        $cetaklaporan=transaksi_perawatan::where([
            ['status', 'selesai'],
            ['kodepos','>=',[$kodepos1]],
            ['kodepos','<=',[$kodepos2]],
            ])->whereBetween('updated_at',[$tglawal,$tglakhir])
        ->orderBy('kodepos', 'asc')->get();
        return view('pages.transaksi.cetakperawatan', compact('report', 'job_comp_codes','title','cetaklaporan'));

    }

    
}
 