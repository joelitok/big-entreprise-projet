<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Brian2694\Toastr\Facades\Toastr;

class VisitorController extends Controller
{

    //récupérer tous les Visitors de ma base de données
    public function list_visitor()
    {
        $visitors = Visitor::orderBy('id', 'DESC')->paginate(6);
        return view('admin.visitor.list_visitor')->with('visitors', $visitors);
    }


    public function delete_visitor($id)
    {
        $visitor = Visitor::find($id);
        if ($visitor) {
            $visitor->delete();
        } else {
            Toastr::error("Cet element n existe plus ", 'error');
        }

        return redirect('/list_visitor')->with('status', 'Visite supprimer avec succès');
    }
}
