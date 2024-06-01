@extends('admin.layouts.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Blog List</h4>
        <div class="card">
            <h5 class="card-header">Available Blog Information</h5>
            @if (session()->has('message'))
                <div class="alert alret-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Blog Category</th>
                    <th>Blog Title</th>
                    <th>Blog Image</th>
                    <th>Author Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($blogs as $blog)

                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->category_name }}</td>
                        <td>{{ $blog->blog_title }}</td>
                        <td>
                            <img style="height: 100px" src="{{ asset($blog->blog_img) }}" alt="">
                        </td>
                        <td>{{ $blog->author_name }}</td>
                        <td>
                            <a href="{{ route('editblog', $blog->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteblog', $blog->id) }}" class="btn btn-warning">Delete</a>
                        </td>
                      </tr>

                      @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- Bootstrap Table with Header - Light -->
    </div>

@endsection
