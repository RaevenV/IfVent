<?php

namespace App\Http\Controllers;

use App\Models\AudioBook;
use Illuminate\Http\Request;

class AudioBookController extends Controller
{
    public function view($id)
    {
        $audioBook = AudioBook::findOrFail($id);
        return view('audioBookView', compact('audioBook'));
    }


}
