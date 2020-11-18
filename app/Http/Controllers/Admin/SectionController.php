<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Http\Requests\StoreSection;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

   
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Section::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $section = new Section(); 
       return view('admin.section.index',['sections'=>$section->alphabetOrder(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSection   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSection $request)
    {
        Section::createSection($request);  
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.section.edit',['section'=>$section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreSection  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSection $request, Section $section)
    {
        $section->update($request->all());
        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
         $section->delete();
         return back();
    }
}
