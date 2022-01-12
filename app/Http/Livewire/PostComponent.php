<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    #usar clase de paginacion
    use WithPagination;
    #propiedades para trabajar con metodo store
    public $post_id,$title, $body;
    #especificar la vista para l avariable view
    public $view ='create';

    public function render()
    {
        #colocar en la vista la consulta de post
        return view('livewire.post-component',[
            'posts' => Post::orderBy('id','desc')->paginate(8)
        ]);
    }
    #metodo para crear
    public function store()
    {
        #validacion de tatos requeridos
        $this->validate(['title' => 'required', 'body' => 'required']);
        #accion para crear
        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body
        ]);
        #al guardar ir directamente a aditar
        $this->edit($post->id);
    }

    #metodo publico para editar post
    public function edit($id)
    {
        #variable para buscar
        $post = Post::find($id);
        #guardar elementos
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;
        #modificacion de el valor de la vista para mostrar 
        $this->view = 'edit';
    }

    #metodo apra actualizar
    public function update()
    {
        #validacion de tatos requeridos
        $this->validate(['title' => 'required', 'body' => 'required']);
        #buscar post por post_id
        $post = Post::find($this->post_id);
        #actualizacion con estructura de laravel
        $post->update([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->default();
    }

    #metodo publico para eliminar post
    public function destroy($id)
    {
        Post::destroy($id);
    }

    #metodo publico para cancelar la adicion de post
    public function default()
    {
        #establecer campos bacios 
        $this->title = '';
        $this->body ='' ;

        $this->view = 'create';
    }
}
