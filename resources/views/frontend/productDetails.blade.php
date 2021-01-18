@extends('layouts.frontendLayout.frontend_design')
@section('content')

<div id='product-details' class="mt-5 ml-5">
    <div class='row'>
        <div class="col-4">        
        <div>
            <img :src="currentImage" 
            width="75%"
            alt="product_image">
            <!-- <img src="{{ asset('/images/backend_images/product/small/'.$product->image) }}" 
            width="75%"
            alt="product_image"> -->
        </div>
        </div>
        <div class="col-8">
            <div>
                <h5>@{{product.product_name}}</h5>
            </div>
            <div v-if="product.designs">
                <h6>Select Design:</h6>
                <div class="row cursor-pointer">
                    <div v-for="(design,i) in product.designs" key=@{{design.id}}  v-on:click="selectDesign(design)" class="col-2 border mx-2 my-2" >
                        <img :src="design.images.length > 0 ? setDefaultImages(design) : 'no'" style="width:100%" alt="image_here">
                    </div>
                </div>
            </div>
            <div id="details">
                <div>
                <p><b>Design:</b> @{{selectedDesign.title}}</p>
                <p><b>Material Type:</b> @{{selectedDesign.materialType}}</p>
                <p><b>Size:</b> @{{selectedDesign.size}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

var dbProduct = {!! $product !!}
new Vue({

  // Targeting the Product Details div

  el: '#product-details',
  data: {
    product:{},
    selectedDesign: {},
    selectedSize: {},
    selectedMaterial: {},
    productData: {},
    designImages:{},
    currentImage: "/images/backend_images/product/small/"
  },
  mounted(){
    this.product = dbProduct;
    this.currentImage = this.currentImage + this.product.image
    console.log(this.product)
    this.selectedDesign = this.product.designs[0];
    // console.log(this.selectedDesign.images[0].image)
    // console.log(this.selectedDesign);
    // this.selectedSize = this.selectedDesign.sizes[0];
    // console.log(this.selectedSize);
    },
    methods:{
        
        selectDesign(design){
          this.selectedDesign = design;
          if(design.images){
          this.currentImage = "/images/backend_images/product/small/" + design.images[0].image 
          }
        },
        setDefaultImages(design){
            if(design.images){
                return "/images/backend_images/product/small/" + design.images[0].image 
            }
            // else {
            //     return "none"
            // }
        }
    },
    
})


</script>

<style>
.cursor-pointer:hover 
{
  cursor: pointer;
}
</style>

@endsection
