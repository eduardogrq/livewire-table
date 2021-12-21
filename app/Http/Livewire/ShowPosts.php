<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $search;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
       $posts = Post::where('title', 'like' , '%' . $this->search . '%')
                    ->orWhere('content', 'like' , '%' . $this->search . '%')->orderBy('id', 'desc')->get();

        return view('livewire.show-posts', compact('posts'))
                ->layout('layouts.base');
    }
}
