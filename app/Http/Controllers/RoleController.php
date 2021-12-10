<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\RessourceRole;
use App\Models\Role;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role = new Role();
        $role->name = $request['name'];
        $role->description = $request['description'];

        $exist = Role::where('name', $role->name)->first();
        if (!$exist) {
            $role->save();
            return back()->with("message", "Le rôle $role->name a bien été ajouté !");
        } else {
            return back()->with("message", "Ce rôle existe déjà");
        }
    }

    public function getRoleRessources($role_id)
    {
        $role = Role::findOrFail($role_id);
        $ressources = Ressource::orderBy('id', 'DESC')->paginate(20);

        if ($ressources != null) {
            foreach ($ressources as $res) {
                $role_user = RessourceRole::where('role_id', $role->id)->where('ressource_id', $res->id)->get();
                if ($role_user != null ? count($role_user) > 0 : false) {
                    $res->exist = true;
                }
            }
        }

        return view('admin.users.ressource_role', compact('role', 'ressources'));
    }

    public function affecter(Request $request)
    {
        $roleid = $request->role_id;
        $ids = $request->ids;
        
        $b = preg_split("/[,]/", $ids);

        DB::beginTransaction();
        try {
            $res = RessourceRole::where('role_id',$roleid)->get();
            if ($res) {
                foreach ($res as $item) {
                    $item->delete();
                }
              
            }
           

            foreach ($b as $item) {
                $res = new RessourceRole();
                $res->role_id = $roleid;
                $res->ressource_id = $item;
                $res->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return $this->getRoleRessources($roleid);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
