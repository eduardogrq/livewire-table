<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false;

    public $title, $content;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save(){
        DB::table('posts')->insert([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset([
            'open',
            'title',
            'content'
        ]);

        $this->emit('alert', 'El post se creó satisfactoriamente');

        $this->emit('render');
    }
}
