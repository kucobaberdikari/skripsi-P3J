<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perawatan;
use App\Models\Perbaikan;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   $title = 'Dashboard';
        $items = Perawatan::where('status', 'PENDING')->orderBy('created_at', 'desc')->count();
        $itemsx = perawatan:: get();
        $item = Perawatan::where('status', 'PROCESSED')->orderBy('created_at', 'desc')->count();
        $perbaikan = Perbaikan::where('status', 'PENDING')->orderBy('created_at', 'desc')->count();
        $itemss = perbaikan:: get();
        $perbaikanproses = Perbaikan::where('status', 'PROCESSED')->orderBy('created_at', 'desc')->count();

       return view('pages.dashboard')->with([
            'title'=>$title,
            'items'=>$items,
            'itemsx'=>$itemsx,
            'itemss'=>$itemss,
            'item'=>$item,
            'perbaikan'=>$perbaikan,
            'perbaikanproses'=>$perbaikanproses,
        ]);
    }
}
