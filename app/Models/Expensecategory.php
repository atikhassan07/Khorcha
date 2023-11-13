<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expensecategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function CreatorInfo(){

       return $this->belongsTo('App\Models\User', 'expcate_creator', 'id');
    }
}
