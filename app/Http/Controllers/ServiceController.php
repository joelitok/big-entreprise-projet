<?php

namespace App\Http\Controllers;

use App\Models\DevisService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{


    public function devis_form($id)
    {
        $devisInput = DevisService::where('service_id', $id)->get();
        return view('client.devis_form')->with('devisInput', $devisInput);
    }

    public function devis_form_data(Request $req)
    {
        dd($req);
        //start send newsletter  
        if (true) {

            // //Send mail to admin
            // \Mail::send('newsletter', array(
            // 'product_price'=>$product->product_price,
            // 'product_name' => $product->product_name,
            // 'product_description' => $product->product_description,
            // 'product_category' => $product->product_category,
            // 'product_image'=>$product->product_image,
            // 'stock' => $product->stock,

            // ),

            // function($message) use ($request){
            // $newsletter_email=NewsLetter::where('email_status', 1)->get();
            // $message->from('joelnkouatchet@gmail.com');
            // foreach($newsletter_email as $email){
            // $message->to($email->email, 'User')
            // ->subject('Les nouvelles a propos des nouveaux produits');
            //   }

            // });   
        }
        // end send newsletter data





    }




    public function service_add()
    {
        return view('admin.services.addService');
    }

    //enregistrer un services dans ma base de donnée
    public function service_add_save(Request $request)
    {

        if ($request->hasFile('service_image')) {
            //1 get file name with extension
            foreach ($request->file('service_image') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/public_service_images/', $name);
                $data[] = $name;
            }


            // $fileNameWithExt = $request->file('service_image')->getClientOriginalName();
            //2 file name without extension

            // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            // $extension = $request->file('service_image')->getClientOriginalExtension();

            //4 renamane image to store
            // $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // $path = $request->file('service_image')->storeAs('public/service_images', $fileNameToStore);

        } else {
            //  $fileNameToStore = 'noimage.jpg';
            $data = 'noimage.jpg';
        }
        $service = new Service();
        $service->service_name = $request->input('service_name');
        $service->service_description = $request->input('service_description');
        $service->service_image = json_encode($data);
        $service->service_status = 1;
        $service->save();
        Toastr::success("le service $service->service_name a bien été  ajouter :)", 'Success');
        //        return redirect('/service_list');
        return redirect()->back()->with('service', $service);
    }

    //récupérer tous les services de ma base de données
    public function service_list()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(4);
        return view('admin.services.listServices')->with('services', $services);
    }


    public function desactiverservice($id)
    {
        $service = Service::find($id);
        $service->service_status = 0;
        $service->update();
        return redirect('/service_list')->with('status', 'le service a été désactiver   avec succès');
    }


    public function activerservice($id)
    {
        $service = Service::find($id);
        $service->service_status = 1;
        $service->update();
        return redirect('/service_list')->with('status', 'le service a été activer  avec succès');
    }


    public function delete_service($id)
    {
        $service = Service::find($id);
        if ($service->service_image != 'noimage.jpg') {
            Storage::delete('public/service_images/' . $service->image);
        }
        $service->delete();
        Toastr::success("le service  a bien été  supprimer :)", 'Success');
        return redirect('/service_list');
    }


    public function service_update_save($id)
    {
        $service = Service::find($id);
        return view('admin.services.updateServices')->with('service', $service);
    }

    public function saveChampDevis(Request $request, $serviceId)
    {
        $devis = new DevisService();
        $devis->champ_type = $request['champ_type'];
        $devis->champ_name = $request['champ_name'];
        $devis->service_id = $serviceId;

        if ($request['champ_val']) {
            $devis->valeur = $request['champ_val'];
        } else {
            $devis->valeur = "";
        }
        $exist = DevisService::where('champ_name', $devis->champ_name)->first();
        if ($exist) {
            Toastr::warning('Ce champ existe déjà pour ce service', 'Avertissement');
        } else {
            $devis->save();
            Toastr::success("Champ ajouter avec succès !", 'Succes');
        }
        return redirect()->back();
    }


    public function service_update_save_action(Request $request)
    {

        $service = Service::find($request->input('id'));
        $service->service_name = $request->input('service_name');
        $service->service_description = $request->input('service_description');

        $this->validate(
            $request,
            [
                'service_name' => 'required',
                'service_name' => 'required',
                'service_image' => 'image| nullable|max:19990'
            ]
        );
        if ($request->hasFile('service_image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('service_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('service_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;

            $path = $request->file('service_image')->move(
                public_path() . '/service_images',
                $fileNameToStore
            );

            if ($service->service_image != 'noimage.jpg') {
                Storage::delete('public/service_images/' . $service->image);
            }
            $service->service_image = $fileNameToStore;
        }
        Toastr::success("le service a été modifier avec succès :)", 'Success');
        $service->update();
        return redirect('/service_list');
    }

    public function initInfos()
    {
        //        Artisan::call('storage:link');
        //        Artisan::call('db:seed', array('--class' => "DatabaseSeeder"));
        //        Artisan::call('composer install --ignore-platform-reqs');
        $data['output'] = shell_exec('(cd ' . base_path() . ' && /usr/local/bin/install --ignore-platform-reqs)');

        // debug
        dd($data);
        dd('Seeder run successfully');
    }
}
