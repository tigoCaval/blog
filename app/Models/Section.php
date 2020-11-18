<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Section extends Model
{
    protected $fillable = ['description'];
     
 
    /**
     * Store a newly created resource in storage.
     * Armazenar 
     * @param Request $request
     * 
     * @return [type]
     */
    public static function createSection(Request $request)
    {
        if(Section::create($request->all()) )
        {
           return $request->session()->flash('success', 'Salvo com sucesso!');
        }
        return [];
    }
 
    /**
     * list the contents of the section in alphabetical order
     * listar o conteúdo (da seção) em ordem alfabética
     * @param null $page
     * 
     * @return [type]
     */
    public function alphabetOrder($page = null)
    {
       if($page)
          return  Section::orderBy('description','asc')->paginate($page); 
       return Section::orderBy('description','asc')->get();  
    }


}
