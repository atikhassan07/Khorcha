<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function rel_to_incategory(){

       return $this->belongsTo('App\Models\Incomecategory', 'incate_id', 'id');
    }

    public function rel_to_creator(){

       return $this->belongsTo('App\Models\User', 'income_creator', 'id');
    }
}
