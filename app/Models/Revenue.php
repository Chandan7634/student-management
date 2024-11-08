<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = 'revenues';
    protected $primaryKey = 'revenue_id';
    protected $guarded = [];

    public function student(){
        return $this->hasOne(Student::class,'student_id','student_id');
    }

    public function party(){
        return $this->hasOne(Party::class,'party_id','party_id');
    }
}
