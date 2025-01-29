<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function view()
    {
        $permissions = Permission::all();
        return view('permissions.permission', compact('permissions'));
    }

    public function viewCreate()
    {
        return view('permissions/create-permission');
    }


    public function create()
    {
        try {
            $attributes = request()->validate([
                'name' => ['required']
            ]);

            $permissions = Permission::create($attributes);
            if ($permissions) {
                return redirect('permissions');
            } else {
                return redirect('permissions')->with('error', '¡No se pudo crear el permiso intente nuevamente!');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    public function destroy($id)
    {
        $permissions = Permission::find($id);
        if ($permissions) {
            $permissions->delete();
            return redirect('permissions.permission')->with('success', 'Permiso eliminado Correctamente!');
        } else {
            return redirect('permissions.permission')->with('error', 'Permiso no encontrado!');
        }
    }
}
