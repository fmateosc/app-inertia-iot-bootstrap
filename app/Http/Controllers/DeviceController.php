<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DeviceController extends Controller
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

        $devices = Device::orderBy($sortBy, ($sort == 'ASC') ? 'ASC' : 'DESC')
            ->filter($filters)
            ->paginate(5);

        return Inertia::render('Devices/Index', compact('devices', 'sortBy', 'sort'));
    }


    public function store(Request $request)
    {
        Device::create(
            $request->validate([
                'device_id' => "required|min:4|max:10|unique:devices",
                'name' => "required|min:4|max:20",
                'type' => "required|min:5|max:100",
                'notas' => ""
            ])
        );

        return Redirect::route('dispositivos.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'device_id' => "required|min:4|max:10|unique:devices,device_id," . $request->id,
            'name' => "required|min:4|max:20",
            'type' => "required|min:5|max:100",
            'notas' => ""
        ]);

        $device = Device::find($id);

        $device->device_id = $request->device_id;
        $device->name = $request->name;
        $device->type = $request->type;
        $device->notas = $request->notas;

        $device->save();

        return Redirect::route('dispositivos.index');
    }

    public function activarDesactivar(Request $request, $device)
    {
        $id = $device;

        $device = Device::find($id);

        $device->selected = !$device->selected;
        $device->save();

        return Redirect::route('dispositivos.index');
    }
}
