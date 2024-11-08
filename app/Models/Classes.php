<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    
    protected $guarded = [];

    public function party(){
        // return $this->belongsTo(Party::class,'party_id','party_id');
        return $this->belongsTo(Party::class,'party_id','party_id');
    }
}
