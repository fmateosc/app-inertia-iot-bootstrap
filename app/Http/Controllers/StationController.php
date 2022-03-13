<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class StationController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all('search');

        $sortBy = $request->sortBy;

        if (!in_array($sortBy, ['id', 'device_id', 'name', 'type'])) {
            $sortBy = 'id';
        }

        $sort = $request->sort;

        if (!in_array($sort, ['ASC', 'DESC'])) {
            $sort = 'ASC';
        }

        $stations = Station::orderBy($sortBy, ($sort == 'ASC') ? 'ASC' : 'DESC')
            ->filter($filters)
            ->paginate(20);

        return Inertia::render('Stations/Index', compact('stations', 'sortBy', 'sort'));      }     
}
