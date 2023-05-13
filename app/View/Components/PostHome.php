<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;


class PostHome extends Component
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
        $post_list = Post::join('httt_topic', 'httt_topic.id', '=', 'httt_post.topic_id')
            ->select('httt_post.*', 'httt_topic.name as topic_name', 'httt_topic.slug as topic_slug')
            ->where([['httt_post.status', '=', 1], ['httt_post.type', '=', 'post']])
            ->orderBy('updated_at', 'desc')
            ->take(3)->get();
        return view('components.post-home', compact('post_list'));
    }
}
