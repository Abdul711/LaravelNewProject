<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
class TaxController extends Controller
{
   public function index(){
       return view("admin/tax");
   }
}
