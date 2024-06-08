<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin/addCategory');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:jpg,png|max:51200',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            if (!in_array($extension, ['jpg', 'png'])) {
                return back()->withErrors(['file' => 'The selected file type is invalid, must be .jpg or .png']);
            }

            $filename = time() . '.' . $extension;
            $path = 'uploads/categories/';
            $file->move($path, $filename);
            $validatedData['file_path'] = $path . $filename;
        }

        Category::create($validatedData);

        return redirect()->route('addCategories.index')->with('success', 'Category added successfully.');
    }
}




