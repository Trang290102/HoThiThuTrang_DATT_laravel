<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'httt_menu';
    public function MenuSub()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
