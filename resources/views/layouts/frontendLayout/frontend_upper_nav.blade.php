<!-- Upper Nav -->
<div class="upper-nav">
    <div class="container">
        <ul>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Customer Service</a></li>
            <li>
                <a href="#"
                    ><b>Free Shipping</b> for order of $29.95 and more.
                    <b>Free 2nd Day UPS</b> for order of $100 or more</a
                >
            </li>
        </ul>
    </div>
</div>

<!-- Middle Nav -->

<div class="middle-nav">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-1">
                <img
                    class="logo"
                    src="{{ asset('/images/frontend_images/nav/logo-sf.svg') }}"
                    alt="logo"
                />
            </div>
            <div class="search col-md-5">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="What messages do you want on your sign?"
                        aria-label="Recipient's username"
                        aria-describedby="basic-addon2"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- <b-input-group class="mt-2">
          <b-form-input
            placeholder="What messages do you want on your sign?"
          ></b-form-input>
          <b-input-group-append>
            <button class="main-green">X</button>
          </b-input-group-append>
        </b-input-group> -->
            </div>
            <div class="col-md-2 mt-2">
                <div class="row">
                    <div>
                        <button class="btn btn-success main-green">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                    </div>
                    <div class="ml-2 header-helpers">
                        <h6>Chat Now!</h6>
                        <small class="">Get help from a real person</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <div class="row">
                    <div>
                        <button class="btn btn-success main-green">
                            <i class="fas fa-comment-dots"></i>
                        </button>
                    </div>
                    <div class="ml-2 header-helpers">
                        <h6>(800) 123-4567</h6>
                        <small class="">Mon - Fri 8:00am to 7:00pm EST</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <div class="row">
                    <div>
                        <a href="/shopping-cart">
                            <button class="btn btn-success main-green">
                                <i class="fas fa-comment-dots"></i>
                            </button>
                        </a>
                    </div>
                    <div class="ml-2 header-helpers">
                        <h6>Shopping Cart</h6>
                        <?php 
                        if(session('cart')){
                            $cart = session('cart');
                            $cartItems = count((array) $cart->items);
                            $cartPrice = $cart->totalPrice;
                        } else {
                            $cartItems = 0;
                            $cartPrice = 0.00;
                        }
                        ?>
                        <small class="">{{$cartItems}} items, ${{$cartPrice}}</small>
                        <div>
                            <small class="v-sm"
                                >Free shipping over $29.95</small
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="middle-nav-mobile mobile-only">
    <div class="search col-md-5">
        <div class="input-group mb-3">
            <div class="input-group-append">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <input
                type="text"
                class="form-control"
                placeholder="Search Products"
                aria-label="Recipient's username"
                aria-describedby="basic-addon2"
            />
        </div>
    </div>
</div>
<style>
    .middle-nav {
        background-color: #f3f3f3;
        padding: 10px 10px;
    }
    .main-green {
        background-color: white;
        color: green;
    }
    .upper-nav {
        font-size: 0.8rem;
        padding-top: 5px;
        border-bottom: 1px solid #636363;
        color: #636363;
    }

    .upper-nav ul {
        list-style: none;
        display: flex;
    }
    ul > * {
        margin: 0px 6px;
    }
    a {
        text-decoration: none;
        color: black;
    }

    .header-helpers {
        width: 110px;
    }
    .header-helpers small {
        margin: 0;
        font-size: 12px;
    }

    .header-helpers h6 {
        font-size: 15px;
        margin: 0;
    }

    .v-sm {
        margin: 0;
        font-size: 9px !important;
    }

    @media only screen and (max-width: 768px) {
        .upper-nav {
            display: none;
        }
        .middle-nav {
            display: none;
        }
        .middle-nav-mobile {
            display: unset;
        }
    }
</style>
