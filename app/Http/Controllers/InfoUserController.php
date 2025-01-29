<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class InfoUserController extends Controller
{

    public function view()
    {
        $roles = Role::all();
        return view('users.user-profile', compact('roles'));
    }


    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        if (!isset($user->id)) {
            return back()->withErrors(['email' => 'Email o password invalido.']);
        }
        return redirect('dashboard')->with(['success' => 'Usuario creado exitosamente.']);
    }



    public function update(Request $request)
    {

        $user = User::where('id', Auth::user()->id);
        if ($_POST && $user) {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                'phone'     => ['max:50'],
                'location' => ['max:70'],
                'about_me'    => ['max:150'],
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->get('email') != Auth::user()->email) {
                //Sección para el rol
                if (env('IS_DEMO') && Auth::user()->id == 1) {
                    return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                }
            } else {
                $attribute = request()->validate([
                    'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                ]);
            }

            $dataUpdate = [
                'name'    => $attributes['name'],
                'email' => $attribute['email'],
                'phone'     => $attributes['phone'],
                'location' => $attributes['location'],
                'about_me'    => $attributes["about_me"]
            ];

            if (request()->hasFile('profile_picture')) {
                $dataUpdate['profile_picture'] = request()->file('profile_picture')->store('profile_pictures', 'public');
            }

            $user->update($dataUpdate);
            // Eliminar roles previos antes de agregar los nuevos
            $user->roles()->detach();

            $rolesIds = $request->roles;
            foreach ($rolesIds as $role) {
                $user->roles()->syncWithoutDetaching([
                    $role => [
                        'model_type' => get_class($user),
                        'team_id' => $user->id
                    ]
                ]);
            }
        }

        return redirect('/user-profile')->with('success', '¡Perfil actualizado Correctamente!');
    }
}
