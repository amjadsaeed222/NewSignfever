<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;

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
    		$image = $data['image'];
            //Storing Image
            $extension = $image->getClientOriginalExtension();
            $fileName = rand(111,99999).'.'.$extension;
            $image_path = 'images/backend_images/product/large'.'/'.$fileName;
            Image::make($image)->save($image_path);
            
            $category->image = $fileName;
            
    		//$category->url = $data['url'];
            $category->status = $status;
            $category->slug=SlugService::createslug(Category::class,'slug',$data['category_name']);
            $category->save();
    		return redirect()->back()->with('flash_message_success', 'Category has been added successfully');
    	}

        $levels = Category::where(['parent_id'=>0])->get();
        
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request,$slug)
    {

        if($request->isMethod('post'))
        {
        
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            if(empty($data['status'])){
                $status='0';
            }else{
                $status='1';
            }
            if($request->hasFile('image'))
            {
            	$image_tmp = $request->file('image');;
                if ($image_tmp->isValid()) 
                {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    //Image::make($image_tmp)->save($large_image_path);
 				}
            }
            else if(!empty($data['current_image']))
            {
            	$fileName = $data['current_image'];
            }
            else
            {
            	$fileName = '';
            }
            $category=Category::where(['slug'=> $slug])->first();
            $category->slug=null;
            //DB::enableQuerylog();
            $category->update(['status'=>$status,'name'=>$data['category_name'],'image'=>$fileName,'parent_id'=>$data['parent_id'],'description'=> $data['description']]);
           // dd(DB::getQuerylog());
            //return view('admin.categories.view_categories')->with('flash_message_success', 'Category has been updated successfully');
            
            
            return redirect()->route('view-categories');
        }

        $categoryDetails = Category::where(['slug'=>$slug])->first();
        $levels = Category::where(['parent_id'=> 0])->get();
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
