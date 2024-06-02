@extends('admin.layouts.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Author Info</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add New Author</h5>
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
                <form action="{{ route('storeauthor') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author_name" name="author_name"
                                placeholder="jhon doe" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="designation" name="designation"
                                placeholder="Tech Writter" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Author Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="author_description" id="author_description" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Facebook Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="facebokk_link" name="facebokk_link"
                                placeholder="https://www.facebook.com/" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Twitter Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                placeholder="https://www.twitter.com/" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Instagram Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                placeholder="https://www.instagram.com/" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Youtube Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                placeholder="https://www.youtube.com/" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Author Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="author_img" name="author_img" />
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
