<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function store()
    {
        author::create(request()->only([
            'name','dob'
        ]));
    }
}
