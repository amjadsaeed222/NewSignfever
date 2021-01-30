@extends('layouts.adminLayout.admin_design') @section('content')

<div id="add-size">
    <div class="container">
        <div class="my-5" id="form">
            <h5 class="text-center">Add A New Category</h5>

            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/admin/add-new-category') }}"
                name="add_category"
                id="add_category"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label
                            for="category_title"
                            class="col-sm-3 col-form-label"
                            >Catgory Title</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="category_title"
                                name="category_title"
                                placeholder="Category Title"
                            />
                            @error('category_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
