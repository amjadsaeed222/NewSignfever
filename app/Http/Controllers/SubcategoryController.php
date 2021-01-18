<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=DB::select('select * from subcategories');
        return view('showsubcategories')->with(['subcategories'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=DB::select('select * from main_categories');
        return view('addsubcategory')->with(array('maincategories'=>$categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'subcategory_name' => 'bail|required|alpha',
        ]);
        Subcategory::UpdateOrCreate([
            'name'=>$request->get('subcategory_name'),
            'maincategory_id'=>$request->get('maincategory')
        ]);
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $selectedcategory=DB::table('main_categories')->where('id',$subcategory->maincategory_id)->first();
        $selectedcategoryId=$selectedcategory->id;
        $maincategories=DB::select('select * from main_categories');
        return view('editsubcategory',compact("subcategory","maincategories","selectedcategoryId"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'maincategory' => 'required',
            'subcategory' => 'required',
        ]);
        //dd($id);
        $subcategory=Subcategory::find($id);
        $subcategory->name=$request->subcategory;
        $subcategory->maincategory_id=$request->maincategory;
        $subcategory->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
