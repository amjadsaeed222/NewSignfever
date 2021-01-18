<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;


class CategoryController extends Controller
{
    //
    public function addCategory(Request $request){
        if($request->isMethod('post'))
        {
            $request->validate([
                'category_name'=> 'required | unique:Categories,name',
                'parent_id'=> 'required',
                'description'=> 'required'
            ]);
            $data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }

    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		//$category->url = $data['url'];
            $category->status = $status;
            $category->slug=SlugService::createslug(Category::class,'slug',$data['category_name']);
            $category->save();
    		return redirect()->back()->with('flash_message_success', 'Category has been added successfully');
    	}

        $levels = Category::where(['parent_id'=>0])->get();
        
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request,$slug=null){

        if($request->isMethod('post'))
        {
            $request->validate([
                'category_name'=> 'required | unique:Categories,name',
                'parent_id'=> 'required',
                'description'=> 'required'
            ]);
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            $category=Category::where(['slug'=>$slug])->first();
            $category->slug=null;
            $category->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description']]);
            //return view('admin.categories.view_categories')->with('flash_message_success', 'Category has been updated successfully');
            return redirect()->route('view-categories');
        }

        $categoryDetails = Category::where(['slug'=>$slug])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_categories')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory($id = null)
    {
        Category::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
    }

    public function viewCategories()
    { 

        $categories = category::get();
        //return $categories;
         
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
    
}
