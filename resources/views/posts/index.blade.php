@extends('portal_pages.layouts.master')
@section('content')
@section('title') | Posts Listing @endsection

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-12">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-post">Add post</a>
                    <div class="textmsg"></div>
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>body</th>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody id="posts-crud">
                        @foreach($posts as $post)
                        <tr id="post_id_{{ $post->id }}">
                            <td>{{ $post->id  }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td><a href="javascript:void(0)" id="edit-post" data-id="{{ $post->id }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <a href="javascript:void(0)" id="delete-post" data-id="{{ $post->id }}" class="btn btn-danger delete-post">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="postCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="postForm" name="postForm" class="form-horizontal">
                        <input type="hidden" name="post_id" id="post_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" value="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Body</label>
                            <div class="col-sm-12">
                                <input class="form-control" id="body" name="body" value="" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
