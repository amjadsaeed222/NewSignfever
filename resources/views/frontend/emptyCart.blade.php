@extends('layouts.frontendLayout.frontend_design') @section('content')
<div id="shopping-cart">
    <div class="desktop-only">
        <div class="row no-gutters mx-5 my-2">
            <!-- <div class="container"> -->
            <div class="col-12">
                <h4>Your shopping cart is empty.</h4>
                <p><a href="/">Click here to continue shopping.</a></p>
            </div>
        </div>
    </div>
    <div class="mobile-only">
        <div class="container text-center my-5">
            <!-- <div class="row"> -->
            <h4>Mobile View In Progress</h4>
            <p class="lead">Only Desktop view available at the moment. :)</p>
            <!-- </div> -->
        </div>
    </div>
</div>

<script>
    new Vue({
        el: "#shopping-cart",
        data: {
            cartProducts: result,
            totalPrice: 0,
        },
        mounted() {
            console.log(this.cartProducts);
            this.getTotalPrice();
        },
        methods: {
            getTotalPrice() {
                this.cartProducts.forEach((product) => {
                    this.totalPrice += product.price;
                });
            },
        },
    });
</script>

<!-- Desktop -->
<style>
    .mobile-only {
        height: 100vh;
    }
    p,
    b {
        font-size: 0.8rem;
        margin: 0 auto;
        padding: 0 auto;
    }
</style>

@endsection
