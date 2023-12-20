{{-- resources/views/videos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Home Videos')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Videos</h1>
        <a href="{{ route('videos.create') }}" class="btn btn-primary">Add Video</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>File Path</th>
                <th>User ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($videos->count() > 0)
                @foreach($videos as $video)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $video->title }}</td>
                        <td class="align-middle">{{ $video->file_path }}</td>
                        <td class="align-middle">{{ $video->user_id }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('videos.show', $video->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('videos.edit', $video->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Videos not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $videos->links() }} <!-- Hiển thị phân trang -->
@endsection