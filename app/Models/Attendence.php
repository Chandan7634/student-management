<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';
    
    protected $guarded = [];

    protected $casts = [
        'daily_attendance' => 'json'
    ];

     public function party(){
        return $this->hasOne(Party::class,'party_id','party_id');
    }
    
     public function class(){
        return $this->hasOne(Classes::class,'class_id','class_id');
    }

    // public function party_(){
    //     return $this->hasMany(Party::class,'party_id','party_id');
    // }
}
