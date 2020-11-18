<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
 
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Content $content)
    {
        $this->middleware('auth');
        $this->model = $content;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['count'=>$this->model->userArticleCount()]);
    }
}
