@extends('layouts.frontendLayout.frontend_design') @section('content')
<div id="shopping-cart">
    <div class="desktop-only">
        <div class="row no-gutters mx-5 my-2">
            <!-- <div class="container"> -->
            <div class="col-12">
                <h4>Shopping Cart</h4>
            </div>
            <div class="col-9">
                <!-- Table Row -->
                <div class="col-12">
                    <table class="table table-hover text-left">
                        <thead class="">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Description</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <!-- Loop of Products on this <tr > -->
                            <tr>
                                <td>
                                    <img
                                        src="https://www.mysafetysign.com/img/sm/S/all-ppe-required-notice-sign-s-9775.png"
                                        alt=""
                                        class="mx-auto d-block cursor-pointer"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                    />
                                    <div
                                        class="modal fade"
                                        id="exampleModal"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog"
                                            role="document"
                                        >
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img
                                                        src="https://www.mysafetysign.com/img/sm/S/all-ppe-required-notice-sign-s-9775.png"
                                                        class="d-block w-100"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal"
                                                    />
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal"
                                                    >
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="no-gutters">
                                    <div class="col-12">
                                        <a href="#"
                                            >Maintain Distance (Spanish) Floor
                                            Making Tape (2.25" x 54")</a
                                        >
                                    </div>
                                    <div class="col-12 row no-gutters">
                                        <div class="col-6">
                                            <b>Size:</b>
                                        </div>
                                        <div class="col-6">
                                            <p>2.25" x 684" (H x W)</p>
                                        </div>
                                        <div class="col-6">
                                            <p><b>Material:</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                Floor Marking Tape 2.25" x 54"
                                                Roll
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p><b>Part#</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>SF-0834-CD-FMT-2.25x54F</p>
                                        </div>
                                        <div class="col-6">
                                            <p><b>Price Group:</b></p>
                                        </div>
                                        <div class="col-6">
                                            <p>CD-FMT-2x25x54F</p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <b>Expected Ship date:</b>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p>January 27</p>
                                        </div>
                                        <div class="col-12">
                                            <button
                                                class="btn btn-outline-danger my-2"
                                                style="font-size: 0.8rem"
                                            >
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-12 no-gutters">
                                        <div class="col-12">
                                            <p>$37.05/Roll</p>
                                        </div>
                                        <div class="col-12">
                                            <p>Package: 1 Roll</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-12 no-gutters text-center">
                                        <div class="col-12 border">
                                            <p class="">1</p>
                                        </div>
                                        <div class="col-12">
                                            <p>Roll</p>
                                        </div>
                                        <div class="col-12">
                                            <button
                                                class="btn btn-outline-info"
                                                style="font-size: 0.8rem"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-12 no-gutters">
                                        <p>$37.05</p>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#cccccc">
                                <td></td>
                                <td>
                                    <div class="col-12 text-left">
                                        <p>1 item(s) in your cart.</p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p
                                        style="
                                            font-size: 0.7rem;
                                            font-weight: 600;
                                        "
                                    >
                                        Total : $37.05
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Buttons Row -->
                <div class="col-12">
                    <button class="border btn">
                        <i class="fas fa-caret-left" style="color: red"></i>
                        Continue Shopping
                    </button>
                    <button class="border btn">
                        <i class="fas fa-truck" style="color: red"></i> Estimate
                        Shipping Cost
                    </button>
                </div>
            </div>

            <div class="col-3">
                <div class="col-12 border rounded py-2 my-2 text-center">
                    <p class="my-2 font-weight-bold">
                        Subtotal (1 item) : $37.05
                    </p>
                    <button
                        class="btn btn-success d-block w-100"
                        style="font-size: 1.3rem"
                    >
                        Go to Checkout >
                    </button>
                </div>
                <div class="col-12 border rounded py-2 text-center my-2">
                    <p class="my-1">Alternative Checkout Options</p>
                    <div class="my-2">
                        <img
                            src="/images/frontend/cart/pay-with-paypal.png"
                            alt="pay-with-paypal"
                            style="width: 45%"
                            class="d-block mx-auto"
                        />
                        <small class="text-muted"
                            >The safer, easier way to pay</small
                        >
                    </div>
                    <div class="my-2">
                        <img
                            src="/images/frontend/cart/pay-with-amazon.png"
                            alt="pay-with-amazon"
                            style="width: 45%"
                            class="d-block mx-auto"
                        />
                    </div>
                </div>
                <div class="col-12 border rounded py-2 text-center my-2">
                    <div class="col-12">
                        <button class="btn border">
                            Email Cart
                            <i
                                class="fas fa-shopping-cart"
                                style="color: red"
                            ></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script></script>

<!-- Desktop -->
<style>
    p,
    b {
        font-size: 0.8rem;
        margin: 0 auto;
        padding: 0 auto;
    }
</style>

@endsection
