<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.role', compact('roles'));
    }

    public function viewCreate()
    {
        return view('roles/create-role');
    }


    public function create()
    {
        try {
            $attributes = request()->validate([
                'name' => ['required']
            ]);

            $role = Role::create($attributes);
            if ($role) {
                return redirect('roles');
            } else {
                return redirect('roles')->with('error', '¡No se pudo crear el rol intente nuevamente!');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    public function view($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('roles.role-view', compact('role','permissions'));
    }


    public function update($id, Request $request)
    {
        $role = Role::find($id);
        $role->permissions()->sync($request->permissions);
        $permissions = Permission::all();
  
        return view('roles.role-view', compact('role','permissions'));
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect('roles.role')->with('success', '¡Usuario eliminado Correctamente!');
        } else {
            return redirect('roles.role')->with('error', '¡Usuario no encontrado!');
        }
    }
}
