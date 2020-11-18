<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContent;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Content::class); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $content = new Content();
        return view('admin.content.index', ['contents'=>$content->userContent($request->search, 5)]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = new Section();
        return view('admin.content.create', ['sections'=>$section->alphabetOrder()] );
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param StoreContent $request 
     * @return\Illuminate\Http\Response
     */
    public function store(StoreContent $request)
    {
        $content = new Content();
        $content->createContent($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('admin.content.edit',['content'=>$content, 'sections'=>Section::all()]);
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  StoreContent  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContent $request, Content $content)
    {
        $content->update($request->all());
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return back();
    }
}
