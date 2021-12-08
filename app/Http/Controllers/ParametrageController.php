<?php

namespace App\Http\Controllers;

use App\Models\Parametrage;
use App\Models\ParametrageEncombrement;
use App\Models\ParametrageGramage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ParametrageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = Parametrage::all();
        $all = ParametrageGramage::all();
        $encombrements = ParametrageEncombrement::all();
        return view('admin.parametrage.cout_sup', compact('parametres', 'all', 'encombrements'));
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

        $all = Parametrage::all();
        if ($all) {
            foreach ($all as $param) {
                $param->delete();
            }
        }

        $parametre = new Parametrage();
        $parametre->suplement_zone = $request['sup_zone'];
        $parametre->suplement_gramage = $request['sup_grame'];
        $parametre->suplement_encombrement = $request['sup_niveau'];
        $parametre->save();
        Toastr::success("Enregistrement effectué avec sucès !", "Succes");
        return redirect()->back();
    }

    public function storeGrammage(Request $request)
    {
        $all = ParametrageGramage::all();
        if ($all) {
            foreach ($all as $param) {
                $param->delete();
            }
        }
        $parametre = new ParametrageGramage();
        $parametre->gramage = $request['grame'];
        $parametre->valeur_gramage = $request['montant'];
        $parametre->save();
        Toastr::success("Enregistrement effectué avec sucès !", "Succes");
        return redirect()->back();
    }

    public function storeEncombrement(Request $request)
    {
        $parametre = new ParametrageEncombrement();
        $parametre->categorie_encombrement = $request['cat'];
        $parametre->niveau = $request['niveau'];
        $parametre->valeur_encombrement = 0;
        $parametre->save();
        Toastr::success("Enregistrement effectué avec sucès !", "Succes");
        return redirect()->back();
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
