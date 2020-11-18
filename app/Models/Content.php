<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Content extends Model
{
    protected $fillable = ['title', 'description', 'image', 'user_id', 'section_id'];


     /**
     * Store the content in the specified table
     * Armazenar o conteúdo na tabela especificada (contents)
     * @param Request $request
     * 
     * @return [type]
     */
    public  function createContent(Request $request)
    {
        $request['user_id'] = Auth::user()->id; //FK
        if(Content::create($request->all()) )
           return $request->session()->flash('success', 'Salvo com sucesso!');
    }

    /**
     * List user-published content
     * Listar conteúdo publicado pelo usuário
     * @param int $page
     * 
     * @return [type]
     */
    public function userContent($search, $page)
    {
        $articles = Content::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate($page); 
        if($search)
          $articles = Content::orWhere('title','like', '%'.$search.'%')->where('user_id',Auth::user()->id)->paginate($page);
        return $articles;  
    }
 
   
    /**
     * Search all resources or Search specific resources
     * Buscar todos os recursos ou Buscar recursos específicos
     * @param mixed $item
     * @param int $page
     * 
     * @return [type]
     */
    public function searchWhere($item, $page)
    {
        $articles = Content::orderByRaw('created_at DESC')->paginate($page); 
        if($item)
          $articles =  Content::orWhere('title','like', '%'.$item.'%')->paginate($page);
        return $articles;          
    }

    /**
     * Perform user article count
     * Realizar contagem de artigos do usuário
     * @return [type]
     */
    public function userArticleCount()
    {
         return Content::where('user_id', Auth::user()->id)->count();
    }

    /**
     * Get the user who owns the content
     * Obter usuário do conteúdo (content) 
     * @return [type]
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
