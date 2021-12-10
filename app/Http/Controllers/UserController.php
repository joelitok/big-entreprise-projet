<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Auth::logout();
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view("admin.users.users")->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $ressources = Ressource::all();
        return view('admin.users.add_users')->with('roles', $roles)
        ->with('ressources', $ressources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->firstname = $request['nom'];
        $user->lastname = $request['prenom'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->gender = $request['sexe'];
        $user->status = 1;
        $user->password = Hash::make("admin");


        $exit = User::where('firstname', $user->firstname)->orWhere('email', $user->email)->first();
        if (!$exit) {
            $user->save();
            Toastr::success("L'utilisateur $user->fisrtname a bien été ajouté :)", 'Success');
            return back();
        } else {
            Toastr::warning("Cet utilisateur existe déjà :)", 'Warning');
            return back();
        }
    }


    public function getUserRoles($user_id)
    {
        $user = User::find($user_id);
        $roles = Role::all();

        if ($roles != null) {
            foreach ($roles as $role) {
                $role_user = RoleUser::where('user_id', $user->id)
                ->where('role_id', $role->id)->get();
                if ($role_user != null ? count($role_user) > 0 : false) {
                    $role->exist = true;
                }
            }
        }

        return view('admin.users.user_role', compact("user", "roles"));
    }

    public function affecter(Request $request)
    {
        $userid = $request->user_id;
        $ids = $request->ids;
        $roles_id = array();
        $ids = str_replace(",", "", $ids);
        $roles_id = str_split($ids);
        DB::beginTransaction();
        try {
            $roles = RoleUser::where('user_id', $userid)->get();
            foreach ($roles as $role) {
                $role->delete();
            }
            // on enregistre les nouveaux roles
            for ($i = 0; $i < count($roles_id); $i++) {
                $role = new RoleUser();
                $role->user_id = $userid;
                $role->role_id = $roles_id[$i];
                $role->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        Toastr::success("Vos rôles ont été mis à jour :)", 'Success');
        return $this->getUserRoles($userid);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.update_users', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->firstname = $request['nom'];
        $user->lastname = $request['prenom'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->gender = $request['sexe'];
        if ($request['password']) {
            $user->password = Hash::make($request['password']);
        }

        $exit = User::where('firstname', $user->firstname)
        ->orWhere('email', $user->email)->first();
        if (!$exit || $exit->id == $user->id) {
            $user->updated_at = now();
        }
        $user->save();
        Toastr::success("Modification effectuée  :)", 'Success');
        //        return view('admin.users.update_users')->with('user', $user);
        return redirect()->back()->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
