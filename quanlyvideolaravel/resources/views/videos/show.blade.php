{{-- resources/views/videos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Show Video')

@section('contents')
    <h1 class="mb-0">Detail Video</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $video->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">File Path</label>
            <input type="text" name="file_path" class="form-control" placeholder="File Path" value="{{ $video->file_path }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">User ID</label>
            <input type="text" name="user_id" class="form-control" placeholder="User ID" value="{{ $video->user_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Video</label>
            @if ($video->file_path)
                <video controls width="500">
                    <source src="{{ asset($video->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <p>No video available</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $video->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $video->updated_at }}" readonly>
        </div>
    </div>
@endsection