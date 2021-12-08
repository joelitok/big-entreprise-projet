<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use App\Models\NewsLetterData;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class NewsLetterController extends Controller
{
    //
    public $loading = false;

    public function newsletter_add_save(Request $request)
    {



        $exit =  NewsLetter::where('email', $request->input('email'))->first();
        if ($exit) {
            Toastr::error("S il vous plait veillez modifier cette email. il est deja existant dans notre base de données :)", 'Error');
            return redirect()->back();
        } else {
            $newsletter = new NewsLetter();
            $newsletter->email = $request->input('email');
            $newsletter->email_status = 1;
            $newsletter->save();
            Toastr::success("Vous venez de souscrire a notre Newsletter :)", 'Success');
            return redirect()->back();
        }
    }


    public function unsubcribre_to_news_letter($id)
    {
        $unsubcribe = NewsLetter::find($id);
        $unsubcribe->delete();
        Toastr::success(" unsubcribe succès :)", 'success');
        return back();
    }



    //enregistrer une newsletter dans ma base de donnée
    public function newslet_add_save(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'image' => 'image|nullable|max:19990',
                'description' => 'required',
                'link' => 'required',
                'subtitle' => 'required',
                'subdescription' => 'required',
            ]
        );

        if ($request->hasFile('image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->move(public_path() . '/newsletter_images', $fileNameToStore);
        } else {
            $fileNameToStore = '["noimage.jpg"]';
        }
        $this->loading = true;
        $newsletter = new NewsLetterData();
        $newsletter->title = $request->input('title');
        $newsletter->image = $fileNameToStore;
        $newsletter->link = $request->input('link');
        $newsletter->description = $request->input('description');
        $newsletter->subtitle = $request->input('subtitle');
        $newsletter->subdescription = $request->input('subdescription');
        $newsletter->save();

        if ($this->is_connected() == true) {
            //start send newsletter  
            if ($request->input('title')) {
                //Send mail to admin

                Mail::send(
                    'newsletterdata',
                    array(
                        'newsletter_title' => $request->input('title'),
                        'newsletter_image' => $fileNameToStore,
                        'newsletter_link' => $request->input('link'),
                        'newsletter_description' => $request->input('description'),
                        'newsletter_subtitle' => $request->input('subtitle'),
                        'newsletter_subdescription' => $request->input('subdescription'),
                    ),

                    function ($message) use ($request) {
                        $newsletter_email = NewsLetter::where('email_status', 1)->get();
                        $message->from('securTrack@gtafric.com');
                        foreach ($newsletter_email as $email) {
                            $message->to($email->email, 'User')
                                ->subject($request->input('title'));
                        }
                    }
                );
            }
            Toastr::success(" La Newsletter a été envoyé aux abonnées :)", 'Success');
            $this->loading = false;
        } else {
            Toastr::error(" La Newsletter n'a pas été envoyé aux abonnées car vous n'est pas connecté a internet :)", 'Error');
            return redirect()->back();
        }

        //end send newsletter

        return  redirect('/list_newsletter');
    }









    //récupérer tous produits attach de la base de données
    public function newsletter_list()
    {
        $newsletters = NewsLetterData::orderBy('id', 'DESC')->paginate(6);
        return view('admin.newsletter.newsletter')
            ->with('newsletters', $newsletters);
    }


    public function delete_newsletter($id)
    {
        $newsletter = NewsLetterData::find($id);
        if ($newsletter->newsletter != 'noimage.jpg') {

            Storage::delete('public/newsletter_images' . $newsletter->image);
        }
        $newsletter->delete();
        return redirect('/list_newsletter')
            ->with('status', ' cette newslettter a été supprimer avec succès');
    }


    public function is_connected()
    {
        $connected = @fsockopen("www.google.fr", 80);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = true; //action when connected
            fclose($connected);
        } else {
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
}
