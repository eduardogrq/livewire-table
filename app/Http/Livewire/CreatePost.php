<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreatePost extends Component
{
    // Variable que nos ayuda a abrir y cerrar nuestro modal
    public $open = false;

    // Declaramos variables para nuestro formulario de creación
    public $title, $content;

    // Función encargada de renderizar y actualizar cada que hay un cambio
    public function render()
    {
        return view('livewire.create-post');
    }

    // Nos permite guardar un registro dentro de nuestro modal
    public function save(){
        DB::table('posts')->insert([
            'title' => $this->title,
            'content' => $this->content
        ]);

        // Método que nos permite resetear los valores una vez que termina de funcionar todo en save
        $this->reset([
            'open',
            'title',
            'content'
        ]);

        // Emitimos un alert que lo podemos ver en nuestro layout del que extendemos
        $this->emit('alert', 'El post se creó satisfactoriamente');

        // Nos permite comunicarnos con otros componentes y poder renderizar una vez que haga un cambio en este componente
        // Con el método emiteTo nos permite que solo se ejecute este método dentro de show-posts y evitar que renderice más funciones
        $this->emitTo('show-posts','render');
    }
}
