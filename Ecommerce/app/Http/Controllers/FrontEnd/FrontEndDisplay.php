<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
class FrontEndDisplay extends Controller
{
   public function index(){
       return view ("FrontEnd/index");
   }
}
