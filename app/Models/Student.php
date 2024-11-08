<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $guarded = [];

    public function party(){
        return $this->belongsTo(Party::class,'party_id','party_id');
    }
}
