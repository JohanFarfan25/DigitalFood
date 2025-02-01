<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserManagementController extends Controller
{

    use HasRoles;

    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)
            ->where('status', 1)
            ->get();

        return view('users.user-management', compact('users'));
    }

    public function view($id, Request $request)
    {

        $user = User::find($id);
        $roles = Role::all();

        if ($_POST && $user) {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($id)],
                'phone'     => ['max:50'],
                'location' => ['max:70'],
                'about_me'    => ['max:150'],
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if (request()->hasFile('profile_picture')) {
                $profilePicture = ImageUploadController::upload($request->file('profile_picture'), 'profile_pictures', $user->uuid);
                $attributes['profile_picture'] = !empty($profilePicture) ? $profilePicture : $user->profile_picture;
            }

            $user->update($attributes);

            // Eliminar roles previos antes de agregar los nuevos
            if ($user->roles()->exists()) {
                $user->roles()->detach();
            }

            if (!empty($request->roles)) {
                foreach ($request->roles as $role) {
                    $user->roles()->syncWithoutDetaching([
                        $role => [
                            'model_type' => get_class($user),
                            'team_id' => $id
                        ]
                    ]);
                }
            }
        }

        return view('users.user-view', compact('user', 'roles'));
    }


    public function viewCreate()
    {
        return view('users/create-user');
    }


    public function store()
    {
        try {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
                'password' => ['required', 'min:5', 'max:20'],
                'rol_id' => ['required'],
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $attributes['password'] = bcrypt($attributes['password']);

            $user = User::create($attributes);
            if (isset($user->id)) {

                if (request()->hasFile('profile_picture')) {
                    $profilePicture = ImageUploadController::upload(request()->file('profile_picture'), 'profile_pictures', $user->uuid);
                    $attributes['profile_picture'] = !empty($profilePicture) ? $profilePicture : null;
                }

                // Eliminar roles previos antes de agregar los nuevos
                if ($user->roles()->exists()) {
                    $user->roles()->detach();
                }


                if (!empty(request()->roles)) {
                    foreach (request()->roles as $role) {
                        $user->roles()->syncWithoutDetaching([
                            $role => [
                                'model_type' => get_class($user),
                                'team_id' => $user->id
                            ]
                        ]);
                    }
                }

                return redirect('user-management');
            } else {
                return back()->withErrors(['email' => 'Email o password invalido.']);
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    public function update(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:50'],
            'location' => ['max:70'],
            'about_me'    => ['max:150'],
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


        User::where('id', Auth::user()->id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attribute['email'],
                'phone'     => $attributes['phone'],
                'location' => $attributes['location'],
                'about_me'    => $attributes["about_me"],
            ]);


        return redirect('/user-profile');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('user-management');
        } else {
            return redirect('user-management');
        }
    }
}
