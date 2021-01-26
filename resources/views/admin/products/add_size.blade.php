@extends('layouts.adminLayout.admin_design') @section('content')

<div id="add-size">
    <div class="container">
        <div class="my-5" id="form">
        <h5 class="text-center">Add A New Size</h5>

            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/api/admin/add-material') }}"
                name="add_size"
                id="add_size"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label for="size_title" class="col-sm-3 col-form-label"
                            >Size Title</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="size_title"
                                placeholder="Size Title"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size_spn" class="col-sm-3 col-form-label"
                            >Size SPN</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="size_spn"
                                placeholder="Size SPN"
                            />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add Size
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
