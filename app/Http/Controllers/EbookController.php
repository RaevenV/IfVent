<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
   public function view($id)
    {
        $ebook = Ebook::findOrFail($id);
        return view('ebookView', compact('ebook'));
    }
}
