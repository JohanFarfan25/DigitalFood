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
        if (request()->hasFile('profile_picture')) {
            $profilePicture = ImageUploadController::upload(request()->file('profile_picture'), 'profile_pictures', $user->uuid);
            $user->update(['profile_picture' => !empty($profilePicture) ? $profilePicture : $user->profile_picture]);
        }

        // Eliminar roles previos antes de agregar los nuevos
        if ($user->roles()->exists()) {
            $user->roles()->detach();
        }

        if(!empty(request()->roles)) {
            foreach (request()->roles as $role) {
                $user->roles()->syncWithoutDetaching([
                    $role => [
                        'model_type' => get_class($user),
                        'team_id' => $user->id
                    ]
                ]);
            }
        }
        return (new HomeController)->dashboard();
    }



    public function update(Request $request)
    {
        // Retrieve the user model instance
        $user = User::find(Auth::user()->id);

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
                // Sección para el rol
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
                $profilePicture = ImageUploadController::upload($request->file('profile_picture'), 'profile_pictures', Auth::user()->uuid);
                $dataUpdate['profile_picture'] = !empty($profilePicture) ? $profilePicture : Auth::user()->profile_picture;
            }

            $user->update($dataUpdate);

            // Eliminar roles previos antes de agregar los nuevos
            if ($user->roles()->exists()) {
                $user->roles()->detach();
            }

            if(!empty($request->roles)) {
                foreach ($request->roles as $role) {
                    $user->roles()->syncWithoutDetaching([
                        $role => [
                            'model_type' => get_class($user),
                            'team_id' => $user->id
                        ]
                    ]);
                }
            }

        }

        return redirect('/user-profile')->with('success', '¡Perfil actualizado Correctamente!');
    }
}
