<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RuleController extends Controller
{
    public function index(Request $request)
    {
        $rules = Rule::all();

        //return Inertia::render('Devices/Index', compact('devices', 'sortBy', 'sort'));
    }
}
