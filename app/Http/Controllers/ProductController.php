<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    //
    // //
    // public function product(){
    //     return view('admin.products.listproducts');
    // }


    public function product_add()
    {
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        return view('admin_shop.product.add_product')->with('categories', $categories);
    }


    //enregistrer un products dans ma base de donnée
    public function product_add_save(Request $request)
    {

        $this->validate(
            $request,
            [
                'product_price' => 'required',
                'product_name' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',
                'stock' => 'required',
                'stock_min' => 'required',
                'poids' => 'required',
                'encombrement' => 'required',
                'product_image' => 'image|nullable|max:19990'
            ]
        );

        if ($request->hasFile('product_image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('product_image')->storeAs(
                'public/product_images',
                $fileNameToStore
            );
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->stock = $request->input('stock');;
        $product->stock_min = $request->input('stock_min');
        $product->poids = $request->input('poids');
        $product->encombrement = $request->input('encombrement');
        $product->product_status = 1;

        //condition pour enregistrer le produire pour l'administrateur et l'administrateur shop
        if (Session::has('admin_shop_id')) {
            $product->admin_shop_id = Session::get('admin_shop_id');
        } else {
            $product->admin_shop_id = 0;
        }



        $product->save();
        return redirect('/product_add')->with('status', 'le product ' . $product->product_name . ' a été ajouter avec succes');
    }

    //récupérer tous les products de ma base de données
    public function list_product()
    {
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        if (Session::has('admin_shop_id')) {
            $products = Product::orderBy('id', 'DESC')
                ->where('admin_shop_id', Session::get('admin_shop_id'))->paginate(6);
            return view('admin_shop.product.list_product')
                ->with('products', $products)->with('$categories', $categories);
        } else {

            $products = Product::orderBy('id', 'DESC')->paginate(6);
            return view('admin_shop.product.list_product')
                ->with('products', $products)->with('$categories', $categories);
        }
    }


    public function desactiverproduct($id)
    {
        $product = Product::find($id);
        $product->product_status = 0;
        $product->update();
        return redirect('/list_product')->with('status', 'le product a été désactiver   avec succès');
    }


    public function activerproduct($id)
    {
        $product = Product::find($id);
        $product->product_status = 1;
        $product->update();
        return redirect('/list_product')->with('status', 'le product a été activer  avec succès');
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if ($product->product_image != 'noimage.jpg') {
            Storage::delete('public/product_images/' . $product->image);
        }
        $product->delete();
        return redirect('/list_product')->with('status', 'le product a été supprimer avec succès');
    }


    public function product_update_save($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        return view('admin_shop.product.update_product')
            ->with('product', $product)->with('categories', $categories);
    }


    public function product_update_save_action(Request $request)
    {


        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_category = $request->input('product_category');
        $product->product_price = $request->input('product_price');


        $this->validate(
            $request,
            [
                'product_name' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',
                'product_price' => 'required',
                'product_image' => 'image| nullable|max:19990'
            ]
        );


        if ($request->hasFile('product_image')) {
            //1 get file name with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;

            $path = $request->file('product_image')->storeAs(
                'public/product_images',
                $fileNameToStore
            );

            if ($product->product_image != 'noimage.jpg') {
                Storage::delete('public/product_images/' . $product->image);
            }
            $product->product_image = $fileNameToStore;
        }


        $product->update();
        return redirect('/list_product')->with('status', 'le product a été modifier avec succès');
    }
}
