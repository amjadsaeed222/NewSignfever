<?php

namespace App\Http\Controllers;
use File;
use Response;
use App\Models\Index;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Models\ProductsImage;
use App\Models\ProductMaterial;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Cart;

class ProductsController extends Controller
{
    
    public function addProduct(Request $request)
    {
        if($request->isMethod('post'))
        {
            
            // $validate=$request->validate([
            //     'product_name'=>'required',
            //     'product_index'=>'required',
            //     'product_description'=>'required',
            //     'product_price'=>'required',
            //     'product_shape'=>'required',
            //     'product_part_no'=>'required',
            //     'product_images'=>'required',
            // ]);
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            
			$product = new Product;
			$product->index_Id = $data['product_index'];
			$product->product_name = $data['product_name'];
            
            if(!empty($data['product_description']))
            {
				$product->description = $data['product_description'];
            }
            // else
            // {
			// 	$product->description = '';	
			// }
            
            if(empty($data['product_status']))
            {
                $status='0';
            }else
            {
                $status='1';
            }
			$product->price = $data['product_price'];
            $product->shape=$data['product_shape'];
            $product->partNo=$data['product_part_no'];
            $product->shape=$data['product_shape'];
            $product->status = $status;
            // if(empty($data['product_feature']))
            // {
            //     $product->feature=false;
            // }
            // else
            // {
            //     $product->feature=true;
            // }
            $product->slug=SlugService::createslug(Product::class,'slug',$data['product_name']);
            //echo "<pre>";print_r($product);die;
            $product->save();
            
            //Adding Sizes
            
            $addedproductId= $product->id;
            
            foreach($data['product_sizes'] as $size)
            {
                $attributes=new ProductsAttribute;
                $attributes->product_id=$addedproductId;
                //Attribute type 1=size
                $attributes->attribute_type=1;
                $attributes->attribute_value=$size;
                $attributes->save();
            }
            //Adding Product Materials
            foreach($data['product_materials'] as $material)
            {
                $attributes=new ProductsAttribute;
                $attributes->product_id=$addedproductId;
                //Attribute type 2=material
                $attributes->attribute_type=2;
                $attributes->attribute_value=$material;
                $attributes->save();
            }                    
                //Adding Images in size.
            foreach($data['product_images'] as $product_image)    
            {
                $extension = $product_image->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_path = 'images/backend_images/product/large'.'/'.$fileName;
                Image::make($product_image)->save($image_path);
                $imageDetails= new ProductsImage;
                $imageDetails->product_id = $addedproductId;
                $imageDetails->image = $fileName;
                $imageDetails->save();
            }    
            
			// return redirect()->back()->with('flash_message_success', 'Product has been added successfully');
            return redirect()->route('viewproducts')->with('flash_message_success', 'Product has been added successfully');
           
        }
        $sizes=ProductSize::all();
        $materials=ProductMaterial::all();
        $indexes=Index::all();
        return view('admin.products.add_product')->with(compact('sizes','materials','indexes'));
    }  
    
    /* public function addmaterial(Request $request)
    {
        if($request->isMethod('post'))
        {
        $data=$request->all();
        $material=new ProductMaterial;
        $material->title=$data['material_title'];
        $material->sizeId=$data['product_size'];
        $material->description=$data['material_description'];
        $material->save();
        $request->session()->flash('alert-success', 'Material successful added!');
        return redirect()->back();
        }
        $products=Product::all();
		return view('admin.products.add_materials', compact('products')); 
        
    }*/

  
    public function editProduct(Request $request,$slug=null,$id=null)
    {

        if($request->isMethod('post'))
        {
        //     $validate=$request->validate([
        //         'product_name'=>'required',
        //         'product_index'=>'required',
        //         'description'=>'required',
        //         'product_price'=>'required',
        //         'product_shape'=>'required',
        //         'product_part_no'=>'required',
                
        //     ]);
            $data = $request->all();
			//echo "<pre>"; print_r($data); die;

            if(empty($data['product_status']))
            {
                $status='0';
            }else
            {
                $status='1';
            }

            // if(empty($data['description']))
            // {
            // 	$data['description'] = '';
            // }
            // if(empty($data['product_feature']))
            // {
            //     $feature=false;
            // }
            // else
            // {
            //     $feature=true;
            // }
            
            $updateProduct=Product::where(['slug'=>$slug])->first();
            $updateProduct->slug=null;
            $updateProduct->update(['index_Id'=> $data['product_index'],'partNo'=> $data['product_part_no'],'shape'=> $data['product_shape'],'status'=>$status,'product_name'=>$data['product_name'],
				'description'=> $data['product_description'],'price'=>$data['product_price']]);
            // $updateProduct->update(['index_Id'=> $data['product_index'],'partNo'=> $data['product_part_no'],'shape'=> $data['product_shape'],'status'=>$status,'product_name'=>$data['product_name'],
			// 	'description'=> $data['description'],'price'=>$data['product_price'],'feature'=> $feature]);
            //Updating Attribute of the product
            $product_id=$updateProduct->id;
            
            ProductsAttribute::where(['product_id'=>$product_id,'attribute_type'=>1])->delete();
            ProductsAttribute::where(['product_id'=>$product_id,'attribute_type'=>2])->delete();
            
            foreach($data['product_sizes'] as $size)
            {
                $attribute=new ProductsAttribute;
                $attribute->product_id=$product_id;
                $attribute->attribute_type=1;
                $attribute->attribute_value=$size;
                $attribute->save();
                
            }
            foreach($data['product_materials'] as $material)
            {
                $attribute=new ProductsAttribute;
                $attribute->product_id=$product_id;
                $attribute->attribute_type=2;
                $attribute->attribute_value=$material;
                $attribute->save();    
            }
            //Update Image
            if(!empty($data['product_images']))
            {
                ProductsImage::where(['product_id'=>$product_id])->delete();
                $image_path='images/backend_images/product/large/';
                if(!empty($data['current_images']))
                {
                    foreach($data['current_images'] as $current_image)
                    {
                        unlink($image_path.$current_image);
                    }
                }
                
                $images=$data['product_images'];
                $img_len=count($images);
                for($i=0; $i<$img_len; $i++)
                {
                    $productImage = new ProductsImage;
                    $extension = $images[$i]->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    Image::make($images[$i])->save($image_path);
                    $productImage->product_id=$product_id;
                    $productImage->image= $fileName;
                    $productImage->save();
                    
                }
            }
            
			// return redirect()->route('viewproducts')->with('flash_message_success', 'Product has been edited successfully');
			return redirect()->route('viewproducts')->with('flash_message_success', 'Product has been edited successfully');
        
        }

        // Get Product Details start //
        
		$productDetails = Product::where(['slug'=>$slug])->first();
		// Get Product Details End //
        $id=$productDetails->id;
		$productIndexes = Index::all();
		$productMaterials = ProductMaterial::all();
        $productSizes=ProductSize::all();
        $productAttributes=ProductsAttribute::where('product_id',$id)->get();
        $productImages=ProductsImage::where('product_Id',$id)->get();
		
        //dd($productDetails);
		return view('admin.products.edit_product')->with(compact('productDetails','productIndexes','id','productSizes','productMaterials','productAttributes','productImages'));
    } 
    

    public function deleteProductImage($id=null)
    {

		// Get Product Image
		$productImage = Product::where('id',$id)->first();

		// Get Product Image Paths
		$large_image_path = 'images/backend_images/product/large/';
		$medium_image_path = 'images/backend_images/product/medium/';
		$small_image_path = 'images/backend_images/product/small/';

		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image))
        {
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products table
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');
	}

    public function deleteProductAltImage($id=null)
    {

        // Get Product Image
        $productImage = ProductsImage::where('id',$id)->first();

        // Get Product Image Paths
        $large_image_path = 'images/backend_images/product/large/';
        $medium_image_path = 'images/backend_images/product/medium/';
        $small_image_path = 'images/backend_images/product/small/';

        // Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        // Delete Image from Products Images table
        ProductsImage::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Product alternate mage has been deleted successfully');
    }

    public function viewProducts(Request $request)
    {
        //$products = Product::get();
        $products=DB::table('products')->paginate(10);
        foreach($products as $product)
        {
			$index = Index::where(['id' => $product->index_Id])->first();
            $product->index_title = $index->title;            
        }
         //echo "<pre>";print_r($products);die;
        return view('admin.products.view_products')->with(compact('products'));
        
	}

    public function deleteProduct($id = null)
    {
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }

    public function deleteAttribute($id = null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product Attribute has been deleted successfully');
    }

    public function addAttributes(Request $request, $id=null)
    {
        
        
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();
        $productAttribute=ProductsAttribute::where(['product_id'=> $id])->get();
        //$productDetails = json_decode(json_encode($productDetails));
        /*echo "<pre>"; print_r($productDetails); die;*/

        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;

        if($request->isMethod('post'))
        {/*
            $request->validate([
                'sku'=>'required|unique:ProductsAttribute,sku',
                'title'=>'required',
                'size'=>'required',
                'stock'=>'required',
                'material'=>'required',
            ]);*/
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
                
            foreach($data['sku'] as $key => $val)
            {
                if(!empty($val))
                {
                    $attrCountSKU = ProductsAttribute::where(['sku'=>$val])->count();
                    if($attrCountSKU>0)
                    {
                        return redirect('/api/admin/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists. Please add another SKU.');    
                    }
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>0)
                    {
                        return redirect('/api/admin/add-attributes/'.$id)->with('flash_message_error', 'Attribute already exists. Please add another Attribute.');    
                    }
                    $attr = new ProductsAttribute;
                    $attr->product_id = $id;
                    $attr->title=$data['title'][$key];
                    $attr->sku = $val;
                    $attr->size = $data['size'][$key];
                    $attr->stock = $data['stock'][$key];
                    $attr->materialType=$data['material'][$key];
                    $attr->save();
                    //dd($attr);
                    
                   
                }
            }
            return redirect('/api/admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully');

        }

        $title = "Add Attributes";
        return view('/admin.products.add_attributes')->with(compact('title','productDetails','category_name','productAttribute'));
    }

    public function editAttributes(Request $request, $id=null)
    {
        //echo "<pre>";json_decode(json_encode($request->all()));die;
        if($request->isMethod('post'))
        
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['idAttr'] as $key=> $attr)
            {
                if(!empty($attr))
                {
                    ProductsAttribute::where(['id' => $data['idAttr'][$key]])->update(['materialType' => $data['material'][$key], 'stock' => $data['stock'][$key],'title'=>$data['title'][$key],'size'=>$data['size'][$key]]);
                }
            }
            
            return redirect('/api/admin/add-attributes/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
        }
    }

    public function addImages(Request $request, $id=null)
    {
        $productDetails = ProductsAttribute::where(['id' => $id])->first();

        //$categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        //$category_name = $categoryDetails->name;

        if($request->isMethod('post'))
        {
            $data = $request->all();
            if ($request->hasFile('image'))
             {
                $files = $request->file('image');
                foreach($files as $file){
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;  
                    $image->productAttribute_id = $data['productAttribute_id'];
                    $image->save();
                }   
            }

            return redirect('/api/admin/add-images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');

        }

        $productImages = ProductsImage::where(['productAttribute_id' => $id])->orderBy('id','DESC')->get();

        $title = "Add Images";
        return view('admin.products.add_images')->with(compact('title','productDetails','productImages'));
    }

    public function products($url=null)
    {

    	// Show 404 Page if Category does not exists
    	$categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}

    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();

    	$categoryDetails = Category::where(['url'=>$url])->first();
    	if($categoryDetails->parent_id==0){
    		$subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
    		$subCategories = json_decode(json_encode($subCategories));
    		foreach($subCategories as $subcat){
    			$cat_ids[] = $subcat->id;
    		}
    		$productsAll = Product::whereIn('category_id', $cat_ids)->where('status','1')->get();
    	}else{
    		$productsAll = Product::where(['category_id'=>$categoryDetails->id])->where('status','1')->get();	
    	}
    	
    	return view('products.listing')->with(compact('categories','productsAll','categoryDetails'));

    }

    public function product($id = null)
    {

        // Show 404 Page if Product is disabled
        $productCount = Product::where(['id'=>$id,'status'=>1])->count();
        if($productCount==0){
            abort(404);
        }

        // Get Product Details
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();

        /*foreach($relatedProducts->chunk(3) as $chunk){
            foreach($chunk as $item){
                echo $item; echo "<br>"; 
            }   
            echo "<br><br><br>";
        }*/
        
        // Get Product Alt Images
        $productAltImages = ProductsImage::where('product_id',$id)->get();
        /*$productAltImages = json_decode(json_encode($productAltImages));
        echo "<pre>"; print_r($productAltImages); die;*/
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock','relatedProducts'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all(); 
        $proArr = explode("-",$data['idsize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price; 
        echo "#";
        echo $proAttr->stock; 
    }


    public function addtocart(Request $request)
    {

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        echo "<pre>"; print_r(json_decode(json_encode($data))); die;
        if(empty($data['user_email']))
        {
            $data['user_email'] = '';    
        }

        $session_id = Session::get('session_id');
        if(!isset($session_id))
        {
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }

        $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'],'product_color' => $data['product_color'],'size' => $data['size'],'session_id' => $session_id])->count();
        if($countProducts>0)
        {
            return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
        }

        $sizeIDArr = explode('-',$data['size']);
        $product_size = $sizeIDArr[1];

        $getSKU = ProductsAttribute::select('sku')->where(['product_id' => $data['product_id'], 'size' => $product_size])->first();
                
        DB::table('cart')
        ->insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],
            'product_code' => $getSKU['sku'],'product_color' => $data['product_color'],
            'price' => $data['price'],'size' => $product_size,'quantity' => $data['quantity'],'user_email' => $data['user_email'],'session_id' => $session_id]);

        return redirect('cart')->with('flash_message_success','Product has been added in Cart!');

    }    

    public function cart()
    {       
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        foreach($userCart as $key => $product)
        {
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        /*echo "<pre>"; print_r($userCart); die;*/
        return view('products.cart')->with(compact('userCart'));
    }

    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $getProductSKU = DB::table('cart')->select('product_code','quantity')->where('id',$id)->first();
        $getProductStock = ProductsAttribute::where('sku',$getProductSKU->product_code)->first();
        $updated_quantity = $getProductSKU->quantity+$quantity;
        if($getProductStock->stock>=$updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity); 
            return redirect('cart')->with('flash_message_success','Product Quantity has been updated in Cart!');   
        }else{
            return redirect('cart')->with('flash_message_error','Required Product Quantity is not available!');    
        }
    }

    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Product has been deleted in Cart!');
    }

    public function applyCoupon(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error','This coupon does not exists!');
        }else{
            // with perform other checks like Active/Inactive, Expiry date..

            // Get Coupon Details
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();
            
            // If coupon is Inactive
            if($couponDetails->status==0){
                return redirect()->back()->with('flash_message_error','This coupon is not active!');
            }

            // If coupon is Expired
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expiry_date < $current_date){
                return redirect()->back()->with('flash_message_error','This coupon is expired!');
            }

            // Coupon is Valid for Discount

            // Get Cart Total Amount
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
            $total_amount = 0;
            foreach($userCart as $item){
               $total_amount = $total_amount + ($item->price * $item->quantity);
            }

            // Check if amount type is Fixed or Percentage
            if($couponDetails->amount_type=="Fixed"){
                $couponAmount = $couponDetails->amount;
            }else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }

            // Add Coupon Code & Amount in Session
            Session::put('CouponAmount',$couponAmount);
            Session::put('CouponCode',$data['coupon_code']);

            return redirect()->back()->with('flash_message_success','Coupon code successfully
                applied. You are availing discount!');

        }
    }
    public function Search(Request $request)
    {
        $products=Product::where ('product_name','LIKE',"%Input::get('search')%")->orWhere('description','LIKE',"%Input::get('search')%")->get();
       // $categories=Category::where ('name','LIKE',"%Input::get('search')%")->orWhere('description','LIKE',"%Input::get('search')%")->get();
        
        /* if(!empty($categories))
        {
            foreach($categories as $category)
            {
                $products=Product::where(['parent_id'=>$category->id])->get();
            }
            return view('viewProducts')->with(compact('products'));
        } */
        if(!empty($products))
        {
            foreach($products as $product)
            {
                $category=Category::where(['id'=> $product->parent_id])->first();
                $products->category_name=$category->name;
                $products->category_slug=$category->slug;
                $products->category_image=$category->image;
            }   
            return view('viewProducts')->with(compact('products'));
        }
        else
        {
            return redirect()->back()->with('msg',"Product Not Found!");
        }
    }
    public function AddSize(Request $request)
    {
        if($request->isMethod('post'))
        {
            // $validate=$request->validate([
            //     'size_title'=>'required|unique:App\Models\ProductSize,title',
            //     'size_spn'=>'required',
            // ]);
            $data=$request->all();
            $sizeDetails= new ProductSize;
            $sizeDetails->title=$data['size_title'];
            $sizeDetails->SPN=$data['size_spn'];
            $sizeDetails->save();
            return redirect()->action([ProductsController::class,'ViewSize'])->with('flash_message_success', 'Size has been added successfully');

            // return $sizeDetails;
        }
        
		return view('admin.products.add_size');
        
    }

    public function AddSizeAjax(Request $request)
    {
        if($request->isMethod('post'))
        {
            // $validate=$request->validate([
            //     'size_title'=>'required|unique:App\Models\ProductSize,title',
            //     'size_spn'=>'required',
            // ]);
            $data=$request->json()->all();
            $sizeDetails= new ProductSize;
            $sizeDetails->title=$data['size_title'];
            $sizeDetails->SPN=$data['size_spn'];
            $sizeDetails->save();
            return $sizeDetails;
        }
        
		return "Inavlid Request";
        
    }


    public function ViewSize()
    {
        $sizes=DB::table('product_sizes')->paginate(10);
        return view('admin.products.view_size')->with(compact('sizes'));
        
    }
    public function EditSize(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            $validate=$request->validate([
                'size_title'=>'required',
                'size_SPN'=>'required',    
                ]);
            $data=$request->all();
            $sizeDetails=ProductSize::where(['id'=> $id])->first();
            $sizeDetails->update(['title'=>$data['size_title'],'SPN'=> $data['size_SPN']]);
            
            // return redirect('admin/view-size')->with('msg','Size updated successfully');
            return redirect()->action([ProductsController::class,'ViewSize'])->with('flash_message_success', 'Size has been updated successfully');

        }
        $size=ProductSize::where(['id'=>$id])->first();
        return view('admin.products.edit_size')->with(compact('size'));
    }
    public function deleteSize($id = null)
    {
        ProductSize::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Size has been deleted successfully');
    }
    //Product Materials
    public function AddMaterial(Request $request)
    {
        if($request->isMethod('post'))
        {
            // $validate=$request->validate([
            //     'material_title'=>'required|unique:App\Models\ProductMaterial,title',
            //     'description'=>'required',
            //     'material_config_image'=>'required',
            // ]);
            $data=$request->all();
            $MaterialDetails=new ProductMaterial;
            $MaterialDetails->title=$data['material_title'];
            $MaterialDetails->description=$data['description'];

            $extension = $data['material_config_image']->getClientOriginalExtension();
            $fileName = rand(111,99999).'.'.$extension;
            $image_path = 'images/backend_images/product/large'.'/'.$fileName;
            Image::make($data['material_config_image'])->save($image_path);
            
            $MaterialDetails->configImage = $fileName;
            $MaterialDetails->save();            
            // return $MaterialDetails;
            return redirect()->action([ProductsController::class,'ViewMaterial'])->with('flash_message_success', 'Material has been added successfully');

        }
        
		return view('admin.products.add_materials');
        
    }

    public function AddMaterialAjax(Request $request)
    {
        if($request->isMethod('post'))
        {
            // $validate=$request->validate([
            //     'material_title'=>'required|unique:App\Models\ProductMaterial,title',
            //     'description'=>'required',
            //     'material_config_image'=>'required',
            // ]);
            $data=$request->json()->all();
            $MaterialDetails=new ProductMaterial;
            $MaterialDetails->title=$data['material_title'];
            $MaterialDetails->description=$data['description'];

            // $extension = $data['material_config_image']->getClientOriginalExtension();
            // $fileName = rand(111,99999).'.'.$extension;
            // $image_path = 'images/backend_images/product/large'.'/'.$fileName;
            // Image::make($data['material_config_image'])->save($image_path);
            
            $MaterialDetails->configImage = "SampleImage";
            $MaterialDetails->save();            
            return $MaterialDetails;
        }
        
        // return view('admin.products.add_materials');
        return "Invalid Request";
        
    }




    public function ViewMaterial()
    {
        //$materials=ProductMaterial::all();
        $materials=DB::table('product_materials')->paginate(10);
        return view('admin.products.view_material')->with(compact('materials'));
        
    }

    public function EditMaterial(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            $validate=$request->validate([
                'material_title'=>'required',
                'description'=>'required',
                
            ]);
            $data=$request->all();
            $MaterialDetails=ProductMaterial::where(['id'=> $id])->first();
            if(empty($data['image']))
            {
                $fileName=$data['current_image'];
            }
            else
            {
                $extension = $data['image']->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_path = 'images/backend_images/product/large'.'/'.$fileName;
                Image::make($data['image'])->save($image_path);
            }
            
            $MaterialDetails->update(['title'=>$data['material_title'],'description'=> $data['description'],'configImage'=>$fileName]);
            
            // return redirect('admin/view-material')->with('msg','Material updated successfully');
            return redirect()->action([ProductsController::class,'ViewMaterial'])->with('flash_message_success', 'Material has been edited successfully');

        }
        $material=ProductMaterial::where(['id'=>$id])->first();
        return view('admin.products.edit_material')->with(compact('material'));
    }
    public function deleteMaterial($id = null)
    {
        ProductMaterial::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Material has been deleted successfully');
    }
    
    public function addIndex(Request $request)
    {

        if($request->isMethod('post'))
        {
            $validate=$request->validate([
                'index_title'=>'required|unique:App\Models\Index,title',
                'description'=>'required',
                'index_image'=>'required',
                'category_id'=>'required',
            ]);
            $data=$request->all();
            $indexDetails=new Index;
            $indexDetails->title=$data['index_title'];
            $indexDetails->category_id=$data['category_id'];
            $indexDetails->description=$data['description'];
            $indexDetails->slug=SlugService::createslug(Index::class,'slug',$data['index_title']);
            $extension = $data['index_image']->getClientOriginalExtension();
            $fileName = rand(111,99999).'.'.$extension;
            $image_path = 'images/backend_images/index'.'/'.$fileName;
            Image::make($data['index_image'])->save($image_path);
            $indexDetails->image=$fileName;
            $indexDetails->save();
            return redirect()->back();
        }
        $categories=Category::all();
        
        return view('admin.products.add_index')->with(compact('categories'));
        
    }
    public function editIndex(Request $request,$slug=null)
    {

        if($request->isMethod('post'))
        {

            /* $validate=$request->validate([
                'index_title'=>'required',
                'description'=>'required',
                'category_id'=>'required',
            ]); */
            $data=$request->all();
            if($request->hasFile('index_image'))
            {
            	$image_tmp = $request->file('index_image');;
                if ($image_tmp->isValid()) 
                {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    
                    if(isset($data['current_image']))
                        File::delete(public_path('images/backend_images/index/'. $data['current_image']));
                    
                    $large_image_path = 'images/backend_images/index'.'/'.$fileName;
                    Image::make($image_tmp)->save($large_image_path);
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

            
            $index=Index::where(['slug'=> $slug])->first();
            $index->slug=null;
            $index->update(['title'=>$data['index_title'],'image'=>$fileName,'description'=> $data['description'],'category_id'=>$data['category_id']]);   
            // return redirect();
            return redirect()->action([ProductsController::class,'viewIndex'])->with('flash_message_success', 'Index has been edited successfully');
            
        }
        $index=Index::where('slug',$slug)->first();
        $categories=Category::all();
        return view('admin.products.edit_index')->with(compact('index','categories'));
    }
    public function deleteIndex($id = null)
    {
        Index::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Index has been deleted successfully');
    }
    public function viewIndex()
    {
        //$allIndexes=Index::all();
        $allIndexes=DB::table('indexes')->paginate(10);
        
        foreach($allIndexes as $key=>$val)
        {
            $category=Category::where(['id'=> $val->category_id])->first();
            $allIndexes[$key]->category_name=$category->name;
        }
        return view('admin.products.view_index')->with(compact('allIndexes'));
    }
    public function getAddToCart(Request $request, $id, $sizeId, $materialId) 
    {
        $product = Product::find($id);
        $size=ProductSize::find($sizeId);
        $material=ProductMaterial::find($materialId);
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id,$size->title,$material->title);

        $request->session()->put('cart', $cart);
        dd(session ('cart'));
        return redirect()->route('product.index');
    }

    public function getCart() {
        if (!Session::has('cart')) {
            // return view('shop.shopping-cart');

            $products = null;
        return view('frontend.shoppingCart', compact('products'));


        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        dd($products);
        // $products = json_decode($products);

        // return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        return view('frontend.shoppingCart',compact('products'));

    }
    
}