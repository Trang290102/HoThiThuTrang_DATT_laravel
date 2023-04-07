<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;


class CategoryList extends Component
{
    
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $list_category = Category::where([['status', '=', '1'], ['parent_id', '=', 0]])->get();
        return view('components.category-list', compact('list_category'));
    }
}
