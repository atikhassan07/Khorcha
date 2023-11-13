<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function rel_to_excategory(){

       return $this->belongsTo('App\Models\Expensecategory', 'expcate_id', 'id');
    }
}
