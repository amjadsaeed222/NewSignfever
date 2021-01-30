@extends('layouts.adminLayout.admin_design') @section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<div id="content">
    <div class="container">
        <h5 class="text-center">Add A New Product Index</h5>
        
        <div class="my-5" id="form">
            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/admin/add-index') }}"
                name="add_index"
                id="add_index"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label for="index_title" class="col-sm-3 col-form-label"
                            >Index Title</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="index_title"
                                name="index_title"
                                value="{{ old('index_title') }}"
                                placeholder="Index Title"
                            />
                            @error('index_title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="index_title" class="col-sm-3 col-form-label"
                            >Category</label
                        >
                        <div class="col-sm-9">
                            <select
                                
                                class="form-control"
                                id="category_id"
                                name="category_id"
                                value="{{ old('category_id') }}"
                            >
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>    
                            @endforeach
                            </select>
                            @error('index_title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="index_description"
                            class="col-sm-3 col-form-label"
                            >Index Description</label
                        >
                        <div class="col-sm-9">
                            <textarea
                                
                                class="ckeditor form-control"
                                name="description"
                                id="description"
                                placeholder="Index Description"
                            ></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Image</div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    name="index_image"
                                    class="custom-file-input"
                                    id="Index_image"
                                    
                                />
                                <label
                                    class="custom-file-label"
                                    for="index_image"
                                    >Choose An Image</label
                                >
                                @error('index_image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add index
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
