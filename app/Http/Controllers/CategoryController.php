<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //

    public function category_add()
    {
        return view('admin_shop.category.add_category');
    }


    //enregistrer un categorys dans ma base de donnée
    public function category_add_save(Request $request)
    {

         $this->validate(
             $request,
             [
                 'category_name' => 'required|unique:categories'
             ]
         );

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->category_status = 1;

        //insertion de l id parent si il a été selectionné
        $category->idParent = $request->input('idParent') ? $request->input('idParent') : 0;

        if (Session::has('admin_shop_id')) {
            $category->admin_shop_id = Session::get('admin_shop_id');
        } else {
            $category->admin_shop_id = 0;
        }
        $category->save();
        Toastr::success("La categorie '. $category->category_name . ' a été ajouter avec succes :)", 'Success');
        return redirect('/list_category');
    }

    //récupérer tous les categorys de ma base de données
    public function list_category()
    {

        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)
       ->paginate(6);
      $subcategories = Category::orderBy('id', 'DESC')->whereNotNull('idParent')->get();


        return view('admin_shop.category.list_category')->with('categories', $categories);
    }

    public function desactivercategory($id)
    {
        $category = Category::find($id);
        $category->category_status = 0;
        $category->update();
        return redirect('/list_category')->with('status', 'le category a été désactiver   avec succès');
    }



    public function activercategory($id)
    {
        $category = Category::find($id);
        $category->category_status = 1;
        $category->update();
        return redirect('/list_category')->with('status', 'le category a été activer  avec succès');
    }


    public function delete_category($id)
    {
        $category = Category::find($id);
        if ($category->category_image != 'noimage.jpg') {
            Storage::delete('public/category_images/' . $category->image);
        }
        $category->delete();
        return redirect('/list_category')->with('status', 'le category a été supprimer avec succès');
    }


    public function category_update_save($id)
    {
        $category = Category::find($id);
        return view('admin_shop.category.update_category')->with('category', $category);
    }


    public function category_update_save_action(Request $request)
    {


        $category = Category::find($request->input('id'));
        $category->category_name = $request->input('category_name');

        $this->validate(
            $request,
            [
                'category_name' => 'required',
            ]
        );

        $category->update();
        return redirect('/list_category')
            ->with('status', 'le category a été modifier avec succès');
    }
}
