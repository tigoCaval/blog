<?php

namespace App\Http\Controllers\Accessible;

use App\Domain\Formatting\DateTimeBr;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Articles visible to the public
 * Artigos visíveis ao público
 */
class ArticleController extends Controller
{
    protected $model;
    protected $date;

  
    /**
     * @param Content $content
     * @param DateTimeBr $date
     */
    public function __construct(Content $content, DateTimeBr $date)
    {
         $this->model = $content;
         $this->date = $date;
    } 

    /**
     * Display a listing of the resource.
     * @param Request $request
     * 
     * @return [type]
     */
    public function index(Request $request)
    {
         $articles =  $this->model->searchWhere($request->search, 12); 
         return view('welcome',['articles'=>$articles]);
    } 

    
    /**
     * Display the specified resource.
     * @param int $id
     * 
     * @return [type]
     */
    public function show($id)
    {
         $content = Content::find($id); 
         return view('accessible.article.show',['content'=>$content,'date'=>$this->date->convert($content->created_at)]);  
    } 


}
