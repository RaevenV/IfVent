<?php

namespace App\Http\Controllers;

use App\Models\AudioBook;
use App\Models\BeyondTheBook;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.addResource', compact('categories'));
    }

    public function view()
    {
        $categories = Category::with('ebooks', 'audioBooks', 'beyondTheBooks')->get();
        return view('viewResource', compact('categories'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:audio,ebook,beyond',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'alt' => 'required|string|max:255',
            'link' => 'required|url',
        ]);


        if ($request->input('type') == 'audio') {
            $request->validate([
                'file' => 'required|file|mimes:mp3,mp4,m4a|max:51200',
            ]);
        } elseif ($request->input('type') == 'ebook') {
            $request->validate([
                'file' => 'required|file|mimes:pdf|max:51200',
            ]);
        }else if($request->input('type') == 'beyond'){
            $request->validate([
                'file' => 'required|file|mimes:pdf|max:51200',
                'video_link' => 'url',
            ]);
        }

        $filename = NULL;
        $path = NULL;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            if (($request->input('type') == 'audio' && !in_array($extension, ['mp3', 'mp4','m4a'])) ||
                ($request->input('type') == 'ebook' && $extension != 'pdf') || ($request->input('type') == 'beyond' && $extension != 'pdf')) {
                return back()->withErrors(['file' => 'The selected file type is invalid.']);
            }

            $filename = time() . '.' . $extension;
            $path = 'uploads/resources/';
            $file->move($path, $filename);
            $validatedData['file_path'] = $path . $filename;
        }

        if ($request->input('type') == 'audio') {
            AudioBook::create($validatedData);
        } elseif ($request->input('type') == 'ebook') {
            Ebook::create($validatedData);
        }elseif ($request->input('type') == 'beyond'){
            $validatedData['video_link'] = $request->input('video_link') ?: null;
            BeyondTheBook::create($validatedData);
        }

        return redirect()->route('addResources.index')->with('success', 'Resource added successfully.');
    }
}

