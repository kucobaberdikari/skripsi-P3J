<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Perawatan;
use App\Http\Requests\PerawatanRequest;
use App\Models\Perbaikan;
use App\Http\Requests\PerbaikanRequest;

class HomeController extends Controller
{
    public function index()
    { $title = 'Home';
       return view ('pages.member.home')->with(['title'=>$title]);
    }

    public function about()
   {  $title = 'About';
       return view('pages.member.about')->with(['title'=>$title]);
   }

   public function contact()
   {  $title = 'Contact';
       return view('pages.member.contact')->with(['title'=>$title]);
   }

   public function help()
   {  $title = 'Help';
       return view('pages.member.help')->with(['title'=>$title]);
   }
}
