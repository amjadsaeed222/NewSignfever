<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\ProductSize;
use App\Models\ProductMaterial;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function home()
    {
        $products=Product::all();

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
            $sub_categories = Category::where(['parent_id' => $category->id])->get();
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
    // }


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
        $category=Category::where(['slug'=>$slug])->first();
        $products= Product::where(['category_id' => $category->id])->get();
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


    public function showProduct($slug)
    {
        $product=Product::where(['slug'=>$slug])->first();        
        $category_name = Category::where(['id' => $product->category_id])->first();
        $product->category_name = $category_name->name;
        $sizes=ProductSize::where(['product_id'=>$product->id])->get();
        foreach($sizes as $size)
        {   
            $images = ProductsImage::where(['productSize_id'=>$size->id])->get();
            $materials=ProductMaterial::where(['sizeId'=>$size->id])->get();
            $size->materials=$materials;
            $size->images=$images;
        }
        $product->sizes = $sizes;

        
        
        // $attributes=ProductsAttribute::where(['product_id' => $product->id])->get();
        // foreach($attributes as $attribute)
        // {
        //     $images = ProductsImage::where(['productAttribute_id' => $attribute->id])->get();
        //     $attribute->images = $images;
        // }
        // $product->designs = $attributes;
        // return $product;
        return view('frontend.productDetails', compact('product'));
        
    }





    public function allProducts(Request $request)
    {
        $products = Product::get();
        foreach($products as $key => $val)
        {
			$category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
            $attributes=ProductsAttribute::where(['product_id' => $val->id])->get();
            $products[$key]->desings = $attributes;

        }
        $products = json_decode($products);
        return $products;
        //echo "<pre>";print_r($products);die;
    }
    
    public function shoppingCart() 
    {
        return view('frontend.shoppingCart');
    }

    
}
