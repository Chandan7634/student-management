<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMappingModel extends Model
{
    use HasFactory;
    
    protected $table = 'student_mappings';
    
    protected $guarded = [];
      public function student_one(){
        return $this->hasOne(Student::class,'student_id','student_id');
      }
}
