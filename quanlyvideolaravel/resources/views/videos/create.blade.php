{{-- resources/views/videos/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Video')

@section('contents')
    <h1 class="mb-0">Add Video</h1>
    <hr />
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col">
                <input type="file" name="video" accept="video/mp4" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <!-- You may adjust this field based on your requirements -->
                <input type="text" name="user_id" class="form-control" placeholder="User ID" required>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection