<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'httt_contact';
    // public function CategorySub()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }
}
