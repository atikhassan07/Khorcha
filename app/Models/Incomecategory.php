<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incomecategory extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public function CreatorInfo(){

       return $this->belongsTo('App\Models\User', 'incate_creator', 'id');
    }
}
