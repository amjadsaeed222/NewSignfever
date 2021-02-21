<?php

namespace App\Http\Controllers;
use App\Models\Index;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Models\ProductsImage;
use App\Models\ProductMaterial;


use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    
    public function home()
    {
        $products=Product::all();
        foreach ($products as $key=>$val)
        {
            $index=Index::where(['id'=>$val->index_Id])->first();
            $products[$key]->index=$index->slug;
        }
        

        return view('frontend.home', compact('products'));
    }
   
    public function showCategories()
    {
        // Get All Categories and Sub Categories
        $categories_menu = "";
        //$categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories = Category::where(['parent_id' => 0])->get();
        $categories = json_decode(json_encode($categories));
        //echo "<pre>"; print_r($categories); die;
        foreach($categories as $key=>$val)
        {
            $sub_categories = Category::where(['parent_id' => $val->id])->get();
            echo "<ul>". $val->name;
            foreach($sub_categories as $sub_cat)
            {
                $categories[$key]->subcatories=$sub_cat;
                //$sub_cat = json_decode(json_encode($sub_cat));
                echo "<li>";
                echo "<a href=/api/products/". $sub_cat['id'] .">" . $sub_cat['name'] . "</a>";
                echo "</li>";                
            }
            echo "</ul>";
        }
    }

    public function categoriesApi()
    {
        
        
        // return Category::all();
        // Get All Categories and Sub Categories
        // $categories_menu = "";
        // //$categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories = Category::where(['parent_id' => 0])->get();
        
        foreach($categories as $category) 
        {
            $sub_categories = Index::where(['category_id' => $category->id])->get();
            // return $sub_categories;
            $category->sub_category=$sub_categories;
        }
        return $categories;
        // // $categories = json_decode(json_encode($categories));
        // return json_decode($categories);
        //echo "<pre>"; print_r($categories); die;
        // foreach($categories as $key=>$val)
        // {
            // $sub_categories = Category::where(['parent_id' => $val->id])->get();
        //     echo "<ul>". $val->name;
            // foreach($sub_categories as $sub_cat)
            // {
                // $categories[$key]->subcatories=$sub_cat;
        //         //$sub_cat = json_decode(json_encode($sub_cat));
        //         echo "<li>";
        //         echo "<a href=/api/products/". $sub_cat['id'] .">" . $sub_cat['name'] . "</a>";
        //         echo "</li>";                
            // }
        //     echo "</ul>";
         
        }



    public function showAllProducts($category)
    {
        $products=Product::where(['category_id'=>$category])->get();
        //$products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products); die;
        //$sub_cat=Category::where('id',$category)->first();
        foreach($products as $product)
        {
            echo "<a href=/api/product/". $product['slug'] .">" . $product['product_name'] . "</a><br>";
        }
    }


    public function showCategoryProducts($slug)
    {
        $category=Index::where(['slug'=>$slug])->first();
        $products= Product::where(['index_id' => $category->id])->get();
        // $product->category_name = $category_name->name;
        foreach($products as $product) {

        $sizes=ProductSize::where(['product_id'=>$product->id])->get();
        foreach($sizes as $size)
        {   
            $images = ProductsImage::where(['productSize_id'=>$size->id])->get();
            $materials=ProductMaterial::where(['sizeId'=>$size->id])->get();
            $size->materials=$materials;
            $size->images=$images;
        }
        $product->sizes = $sizes;
    }

        return view('frontend.category', compact('category','products'));
        
        // $product=Product::where(['slug'=>$slug])->first();        
        // $product->category_name = $category_name->name;
        // $attributes=ProductsAttribute::where(['product_id' => $product->id])->get();
        // $product->designs = $attributes;
        // return view('frontend.productDetails', compact('product'));
        
    }


    public function showIndexProducts($slug)
    {
        $index=Index::where(['slug'=>$slug])->first();
        //echo "<pre>";print_r($index);die;
        $products= Product::where(['index_Id' => $index->id])->get();
        // $product->category_name = $category_name->name;
        foreach($products as $product) 
        {
            $images = ProductsImage::where(['product_id'=>$product->id])->get();
            $size_ids=ProductsAttribute::where(['product_id'=>$product->id])->where(['attribute_type'=>1])->get();
            $material_ids=ProductsAttribute::where(['product_id'=>$product->id])->where(['attribute_type'=>2])->get();
             
            $index_images;
            $material_array;
            $size_array;
            
            foreach($size_ids as $key=>$val) 
            {
                $size = ProductSize::where(['id'=>$val->attribute_value])->first();
                $size_array[$key]=$size;
            }
    
            foreach($material_ids as  $key=>$val) 
            {
                $material = ProductMaterial::where(['id' => $val->attribute_value])->first();
                $material_array[$key]=$material;
            }
            
            foreach($index as $key=>$val) 
            {
                $images = ProductsImage::where(['product_id'=>$product->id])->get();
                $index_images[$key]=$images;
                // $index_products->images=$index_images;
            }
            $product->sizes=$size_array;
            $product->materials=$material_array;
            $product->images=$images;
            // $product->index_products =$index_products;
            // $product->sizes = $sizes;
    }
    $category = $index;
        // return $products;
        //echo "<pre>";print_r(json_decode(json_encode($category)));die;
        return view('frontend.index', compact('category','products'));
        
        // $product=Product::where(['slug'=>$slug])->first();        
        // $product->category_name = $category_name->name;
        // $attributes=ProductsAttribute::where(['product_id' => $product->id])->get();
        // $product->designs = $attributes;
        // return view('frontend.productDetails', compact('product'));
        
    }
    
    public function showProduct($slug)
    {
        $product=Product::where(['slug'=>$slug])->first();        
        $index = Index::where(['id' => $product->index_Id])->first();
        $index_products = Product::where(['index_id' => $product->index_Id])->get();
        $images = ProductsImage::where(['product_id'=>$product->id])->get();
        $size_ids=ProductsAttribute::where(['product_id'=>$product->id])->where(['attribute_type'=>1])->get();
        $material_ids=ProductsAttribute::where(['product_id'=>$product->id])->where(['attribute_type'=>2])->get();
         
        $index_images;
        $material_array;
        $size_array;
        
        foreach($size_ids as $key=>$val) 
        {
            $size = ProductSize::where(['id'=>$val->attribute_value])->first();
            $size->price = $val->price;
            $size_array[$key]=$size;
        }

        foreach($material_ids as  $key=>$val) 
        {
            $material = ProductMaterial::where(['id' => $val->attribute_value])->first();
            $material->price = $val->price;
            $material_array[$key]=$material;
        }
        
        foreach($index_products as $key=>$val) 
        {
            $image = ProductsImage::where(['product_id'=>$val->id])->first();
            // foreach($images as $image)
            // {
            //     $index_images[$key]=$image->image;
            // }
            $index_products[$key]->image=$image;
        }
        // $index_products['image']=$index_images;
        $product->index_title=$index->title;
        $product->sizes=$size_array;
        $product->materials=$material_array;
        $product->images=$images;
        $product->index_products =$index_products;
        //dd($product);
        // return $index_products;
        return view('frontend.productDetails', compact('product','index_products'));
        
    }


    public function getSize($productId)
    {
        $size=ProductSize::where(['product_id'=>$productId])->get();
   

        return $size;
        // $product=Product::where(['slug'=>$slug])->first();        
        // $product->category_name = $category_name->name;
        // $attributes=ProductsAttribute::where(['product_id' => $product->id])->get();
        // $product->designs = $attributes;
        // return view('frontend.productDetails', compact('product'));
        
    }

    public function allProducts(Request $request)
    {
        $products = Product::get();
        foreach($products as $key => $val)
        {
			$index = Index::where(['id' => $val->index_Id])->first();
            $products[$key]->index_name = $index->title;
            $attributes=ProductsAttribute::where(['product_id' => $val->id])->get();
            $products[$key]->desings = $attributes;

        }
        $products = json_decode($products);
        return $products;
    
    }
    
    public function shoppingCart() 
    {
        return view('frontend.shoppingCart');
    }

    public function orderForm() 
    {
        return view('frontend.orderForm');
    }
    

    
}
