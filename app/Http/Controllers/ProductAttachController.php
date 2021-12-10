<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productattach;
use Illuminate\Support\Facades\Storage;

class ProductAttachController extends Controller
{






    //affichier le formulaire pour ajouter un produit attaché
    public function product_attach_add()
    {
        return view('admin.product_attach.add_product_attach');
    }

    //enregistrer un produits attacher dans ma base de donnée
    public function product_attach_add_save(Request $request)
    {

        $this->validate(
            $request,
            [
                'product_attach_name' => 'required',
                'product_attach_description' => 'required',
                'product_attach_image' => 'image|nullable|max:19990'
            ]
        );

        if ($request->hasFile('product_attach_image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('product_attach_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('product_attach_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //$path =$request->file('product_attach_image')->storeAs('public/product_attach_images',   $fileNameToStore);

            $path = $request->file('product_attach_image')->move(public_path() . '/product_attach_images',   $fileNameToStore);

            // foreach ($request->file('product_image') as $image){
            //     $name = $request->file('product_attach_image')->getClientOriginalName();
            //     $image->move(public_path() . '/public_attach_images/', $name);
            //     $data = $name;
            // }




        } else {
            $fileNameToStore = '["noimage.jpg"]';
        }
        $product_attach = new Productattach();
        $product_attach->product_attach_name = $request->input('product_attach_name');
        $product_attach->product_attach_description = $request->input('product_attach_description');
        $product_attach->product_attach_image = $fileNameToStore;
        $product_attach->product_attach_status = 1;
        $product_attach->save();

        //style notify message
        //notify()->success('le product_attach à été bien ajouter');
        //connectify('success', 'Connection Found', 'Success Message Here');
        //drakify('success'); // for success alert
        //drakify('error');

        return redirect('/product_attach_list');
    }

    //récupérer tous produits attach de la base de données
    public function product_attach_list()
    {
        $product_attaches = Productattach::orderBy('id', 'DESC')->paginate(4);
        return view('admin.product_attach.list_product_attach')
            ->with('product_attaches', $product_attaches);
    }




    public function disable_product_attach($id)
    {
        $product_attach = Productattach::find($id);
        $product_attach->product_attach_status = 0;
        $product_attach->update();
        return redirect('/product_attach_list')->with('status', 'le produit a été désactiver   avec succès');
    }

    public function enable_product_attach($id)
    {
        $product_attach = Productattach::find($id);
        $product_attach->product_attach_status = 1;
        $product_attach->update();
        return redirect('/product_attach_list')->with('status', 'le produit a été activer  avec succès');
    }


    public function delete_product_attach($id)
    {
        $product_attach = Productattach::find($id);
        if ($product_attach->product_attach_image != 'noimage.jpg') {

            Storage::delete('public/product_attach_images/' . $product_attach->image);
        }
        $product_attach->delete();
        return redirect('/product_attach_list')->with('status', 'le produit a été supprimer avec succès');
    }

    public function product_attach_update_save($id)
    {
        $product_attach = Productattach::find($id);
        return view('admin.product_attach.update_product_attach')->with('product_attach', $product_attach);
    }


    public function product_attach_update_save_action(Request $request)
    {
        $product_attach = Productattach::find($request->input('id'));
        $product_attach->product_attach_name = $request->input('product_attach_name');
        $product_attach->product_attach_description = $request->input('product_attach_description');

        $this->validate(
            $request,
            [
                'product_attach_name' => 'required',
                'product_attach_name' => 'required',
                'product_attach_image' => 'image| nullable|max:19990'
            ]
        );
        if ($request->hasFile('product_attach_image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('product_attach_image')->getClientOriginalName();
            //2 file name without extension
            
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('product_attach_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;

            //$path =$request->file('product_attach_image')->storeAs('public/product_attach_images',$fileNameToStore);

            $path = $request->file('product_attach_image')->move(public_path() . '/product_attach_images', $fileNameToStore);

            if ($product_attach->product_attach_image != 'noimage.jpg') {
                Storage::delete('public/product_attach_images/' . $product_attach->image);
            }
            $product_attach->product_attach_image = $fileNameToStore;
        }

        $product_attach->update();
        return redirect('/product_attach_list')->with('status', 'le produit a été modifier avec succès');
    }
}
