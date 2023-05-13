<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class PostRelate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $post_list = Post::where([['httt_post.status', '=', 1], ['httt_post.type', '=', 'post'], ['httt_post.id', '!=', $post->id]])
        ->orderBy('updated_at', 'desc')
        ->take(3)->get();
        return view('components.post-relate' , compact('post_list'));
    }
}
