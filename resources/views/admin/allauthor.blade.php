@extends('admin.layouts.template')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Author List</h4>
        <div class="card">
            <h5 class="card-header">Available Author Information</h5>
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
                    <th>Author Name</th>
                    <th>Designation</th>
                    <th>Author Description</th>
                    <th>Author Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($authors as $author)

                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->designation }}</td>
                        <td>{{ $author->author_description }}</td>
                        <td>
                            <img style="height: 100px" src="{{ asset($author->author_img) }}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('editauthor', $author->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteauthor', $author->id) }}" class="btn btn-warning">Delete</a>
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
