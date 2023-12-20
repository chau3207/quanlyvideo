<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = DB::table('videos')->paginate(1); // Số lượng video trên mỗi trang (ví dụ: 10)

        return view('videos.index', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4|max:50000', // Giả sử giới hạn dung lượng là 50MB
        ]);

        $video = new Video();
        $video->title = $request->title;
        $video->user_id = auth()->id();

        // Lưu file video vào thư mục public/videos (hoặc thư mục bạn chọn)
        $filePath = $request->file('video')->store('public/videos');
        $video->file_path = $filePath;

        $video->save();

        return redirect()->route('videos')->with('success', 'Video added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'title' => 'required|max:255',
            'video' => 'nullable|mimes:mp4|max:50000', // Giới hạn dung lượng video (đơn vị KB)
        ]);

        // Lấy thông tin video từ database
        $video = Video::findOrFail($id);

        // Cập nhật title nếu có
        $video->title = $request->title;

        // Nếu có file video mới được tải lên, cập nhật đường dẫn file
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $newFilePath = 'uploads/' . $videoFile->getClientOriginalName();
            $videoFile->move('uploads', $videoFile->getClientOriginalName());
            $video->file_path = $newFilePath;
        }

        // Lưu thay đổi vào database
        $video->save();

        return redirect()->route('videos.show', $video->id)->with('success', 'Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the video and delete it
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully');
    }
}