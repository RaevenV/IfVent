<?php

namespace App\Http\Controllers;

use App\Models\BeyondTheBook;
use Illuminate\Http\Request;

class BeyondTheBookController extends Controller
{
    public function view($id)
    {
        $beyondTheBook = BeyondTheBook::findOrFail($id);
        return view('beyondTheBookView', compact('beyondTheBook'));
    }
}
