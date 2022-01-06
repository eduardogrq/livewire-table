<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];

    public function render()
    {
       $posts = Post::where('title', 'like' , '%' . $this->search . '%')
                    ->orWhere('content', 'like' , '%' . $this->search . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->get();

        return view('livewire.show-posts', compact('posts'))
                ->layout('layouts.base');
    }

    public function order($sort){

//        Conditional that is executed when click in the same column to sort
        if($this->sort = $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            } else{
                $this->direction = 'desc';
            }
        } else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

}
