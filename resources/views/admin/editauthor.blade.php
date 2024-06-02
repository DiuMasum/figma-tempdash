@extends('admin.layouts.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Author Info</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Author</h5>
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
                <form action="{{ route('updateauthor') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $author_info->id }}" name="author_id">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author_name" name="author_name"
                            value="{{ $author_info->author_name }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="designation" name="designation"
                            value="{{ $author_info->designation }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="author_description" id="author_description" cols="30" rows="10" ></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Facebook Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="facebokk_link" name="facebokk_link"
                            value="{{ $author_info->facebokk_link }}" />
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
