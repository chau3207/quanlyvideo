{{-- resources/views/videos/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Video')

@section('contents')
    <h1 class="mb-0">Edit Video</h1>
    <hr />
    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $video->title }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Video File</label>
                <input type="file" name="video" accept="video/mp4">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update Video</button>
            </div>
        </div>
    </form>
@endsection