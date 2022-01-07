<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowPosts extends Component
{
    use WithFileUploads;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $photo;

//0Hjk0aRVBOzZQAdc7EsRXhNlEmh2NqoBXVQFkqJI.jpg

    public function export(){
        return Storage::disk('public')->download('0Hjk0aRVBOzZQAdc7EsRXhNlEmh2NqoBXVQFkqJI.jpg');
    }

    public function savePhoto(){
        $this->validate([
            'photo' => 'image'
        ]);


        $this->photo->storeAs('storage/images/livewire_files', $this->photo->getClientOriginalName(), 'public_uploads');
    }

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
