<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenu extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $list_menu = Menu::where([['position', '=', 'mainmenu'], ['status', '=', 1]])->get();
        return view('components.main-menu', compact('list_menu'));
    }
}
