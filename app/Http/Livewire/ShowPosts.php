<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithFileUploads, WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $photo;

//0Hjk0aRVBOzZQAdc7EsRXhNlEmh2NqoBXVQFkqJI.jpg

//Function to download files
//    public function export(){
//        return Storage::disk('public_uploads')->download('storage/images/livewire_files/Captura de Pantalla 2021-12-02 a la(s) 13.59.12.png');
//    }

//Function to store files
//    public function savePhoto(){
//        $this->validate([
//            'photo' => 'image'
//        ]);
//
//
//        $this->photo->storeAs('storage/images/livewire_files', $this->photo->getClientOriginalName(), 'public_uploads');
//        $this->emit('alert', 'Imágen guardad con éxito');
//    }

//Pagination example

    protected $listeners = ['render' => 'render'];

    public function render()
    {
//        Query adapted to sort by title or content and
       $posts = Post::orderBy($this->sort, $this->direction)
                    ->where('title', 'like' , '%' . $this->search . '%')
                    ->orWhere('content', 'like' , '%' . $this->search . '%')
                    ->paginate(10);

        return view('livewire.show-posts', compact('posts'))
                ->layout('layouts.base');
    }

//    Function to update de search variable, this to show results in page 1 or reset the paginate
    public function updatingSearch()
    {
        $this->resetPage();
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
