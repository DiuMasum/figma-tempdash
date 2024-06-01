@extends('admin.layouts.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Single Blog Post</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Blog</h5>
                <small class="text-muted float-end">Input Information</small>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('storeblog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="category_name" name="category_name" aria-label="Default select example">
                                <option selected>Select Your Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="blog_title" name="blog_title"
                                placeholder="write the blog title here" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Author Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="author_img" name="author_img" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author_name" name="author_name"
                                placeholder="md korim" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="date" name="date"
                                placeholder="technology" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="blog_img" name="blog_img" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="blog_description" id="blog_description" cols="30" rows="10"></textarea>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Blog Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
