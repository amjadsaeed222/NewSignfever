@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="order-form">
    <div class="checkout-steps">
        <h5>Checkout Steps:</h5>
        <div class="steps">
            <h6>1. Shipping Info</h6>
            <h6>2. Ship Method</h6>
            <h6>3. Payement Info</h6>
            <h6>4. Place Order</h6>
        </div>
    </div>
    <div class="shipping-address" v-if="formCounter == 1">
        <h4>Shipping Address</h4>
        <div class="addresses">
            <div class="address"></div>
        </div>
        <div class="add-new">
            <button
                class="btn btn-link"
                data-toggle="modal"
                data-target="#new-address-modal"
            >
                Add new
            </button>

            <div
                class="modal fade"
                id="new-address-modal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="new-address-modalTitle"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Add New Address
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row px-3">
                                <div class="form-group col-md-6">
                                    <label for="first-name">First Name:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="first-name"
                                        placeholder="Enter First Name"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last-name">Last Name:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="last-name"
                                        placeholder="Enter Last Name"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company-name"
                                        >Company Name:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="company-name"
                                        placeholder="Enter Company Name"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street-address"
                                        >Street Address:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="street-address"
                                        placeholder="Enter Street Address"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address-type"
                                        >Apt/Suite/Other:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="address-type"
                                        placeholder="Apt/Suite/Other"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="city"
                                        placeholder="City"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="country"
                                        placeholder="Country"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state-province"
                                        >State/Province:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="state-province"
                                        placeholder="State/Province"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Zip</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="zip"
                                        placeholder="Zip"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery-phone"
                                        >Delivery Phone:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="delivery-phone"
                                        placeholder="(000) 000-0000"
                                    />
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="ext"
                                        placeholder="Ext"
                                    />
                                </div>
                                <div class="form-group col-md-6">
                                    <h6>This address is a :</h6>
                                    <input
                                        type="radio"
                                        name="address-of"
                                        id="residence"
                                    />
                                    <label for="residence">Residence</label>
                                    <br />
                                    <input
                                        type="radio"
                                        name="address-of"
                                        id="business"
                                    />
                                    <label for="business">Business</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6>
                                        Is this address also your billing
                                        address?
                                    </h6>
                                    <div class="flex">
                                        <input
                                            type="radio"
                                            name="billing-address"
                                            id="yes"
                                        />
                                        <label for="yes">Yes</label>
                                        <input
                                            type="radio"
                                            name="billing-address"
                                            id="no"
                                        />
                                        <label for="no">No</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shipping-method" v-if="formCounter == 2">
        <h4>Choose A shipping method</h4>

        <table class="table">
            <thead class="thead-dark" v-if="worldwide">
                <tr>
                    <th scope="col">Shipping Method</th>
                    <th scope="col">Shipping Speed</th>
                    <th scope="col">You Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Worldwide Shipping</th>
                    <td></td>
                    <td>Otto</td>
                </tr>
            </tbody>
        </table>

        <!-- Packadge Table -->
        <table class="table">
            <!-- <thead class="thead-light" >
                <tr>
                    <th scope="col">Package 1</th>
                    <th scope="col">Est:</th>
                    <th scope="col">You Pay</th>
                </tr>
            </thead> -->
            <tbody>
                <tr>
                    <td scope="row">
                        <img
                            src="https://www.mysafetysign.com/img/tn/L/Break-Glass-Fire-Extinguisher-Label-LB-0909.gif"
                            alt=""
                        />
                    </td>
                    <td>
                        <div class="">
                            <p>
                                <b
                                    >Fire Extinguisher In Case Of Fire Break
                                    Glass</b
                                >
                            </p>
                            <h4>$8.27</h4>
                            <p>Qty: 1 Sign</p>
                        </div>
                    </td>
                    <td>
                        <p><b>Choose your delivery options:**</b></p>
                        <div class="form-group">
                            <input
                                type="radio"
                                name="delivery-opt"
                                id="opt-1"
                            />
                            <label for="opt-1" class="text-success"
                                ><b>Thu., Feb. 25 - Mon., Mar. 01</b></label
                            >
                            <br />
                            <label for="opt-1" class="container"
                                >$6.99 Regular Ground Shipping</label
                            >
                        </div>
                        <div class="form-group">
                            <input
                                type="radio"
                                name="delivery-opt"
                                id="opt-2"
                            />
                            <label for="opt-2" class="text-success"
                                ><b>Wed., Feb. 24 - Thu., Feb. 25</b></label
                            >
                            <br />
                            <label for="opt-2" class="container"
                                >$14.33 Three-Day Shipping (Best Value)</label
                            >
                        </div>
                        <div class="form-group">
                            <input
                                type="radio"
                                name="delivery-opt"
                                id="opt-3"
                            />
                            <label for="opt-3" class="text-success"
                                ><b>Tue., Feb. 23 - Wed., Feb. 24</b></label
                            >
                            <br />
                            <label for="opt-3" class="container"
                                >$33.96 Two-Day Shipping</label
                            >
                        </div>
                        <div class="form-group">
                            <input
                                type="radio"
                                name="delivery-opt"
                                id="opt-4"
                            />
                            <label for="opt-4" class="text-success"
                                ><b>Mon., Feb. 22 - Tue., Feb. 23</b></label
                            >
                            <br />
                            <label for="opt-4" class="container"
                                >$75.96 One-Day Shipping</label
                            >
                        </div>

                        <a href="#">** Learn more about Delivery Dates</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <button class="btn btn-success" @click="prev()">Previous</button>
    <button class="btn btn-success" @click="next()">Next</button>
</div>

<script>
    new Vue({
        el: "#order-form",
        data() {
            return {
                formCounter: 1,
                worldwide: false,
            };
        },
        mounted() {
            console.log("Order-From Vue Connected!");
        },
        methods: {
            next() {
                this.formCounter++;
            },
            prev() {
                this.formCounter--;
            },
        },
    });
</script>

<style>
    .steps {
        display: flex;
        justify-content: space-between;
        align-content: center;
    }
</style>

@endsection
