<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str ;
class Tax extends Model
{
    use HasFactory;
    public $timestamps=false;
     public function getTaxDescAttribute($value)
    {

        $contains = Str::contains('%',$value);
             $value=$value."%";
          return Str::upper($value);
    }
 
}
