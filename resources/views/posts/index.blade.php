@extends('portal_pages.layouts.master')
@section('content')
@section('title') | Posts Listing @endsection

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9 col-12">
                <h3 class="text-center"> Laravel 9 Ajax CRUD </h3>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 text-end">
                <a href="javascript:void(0)" id="create-post-btn" class="btn btn-primary"> Create Post </a>
            </div>
        </div>

        <div class="card my-3">
            <table class="table" id="postsTable">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="20%">Title</th>
                        <th width="30%">Description</th>
                        <th width="20%">Action</th>
                    <tr>
                </thead>

                <tbody>
                    @forelse ($posts as $post)
                    <tr id="post_{{$post->id}}">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="javascript:void(0)" data-id="{{$post->id}}" title="View" class="btn btn-sm btn-info btn-view"> View </a>
                            <a href="javascript:void(0)" data-id="{{$post->id}}" title="Edit" class="btn btn-sm btn-success btn-edit"> Edit </a>
                            <a href="javascript:void(0)" data-id="{{$post->id}}" title="Delete" class="btn btn-sm btn-danger btn-delete"> Delete </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="text-danger text-center"> No post found! </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- modal -->
        <div class="modal fade" id="postModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <form method="post" id="postForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"> AJAX CRUD Application</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Post Title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Body</label>
                                <textarea class="form-control" name="description" placeholder="Description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


