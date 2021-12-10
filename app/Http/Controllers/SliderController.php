<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    //
    public function slider_add()
    {
        return view('admin.sliders.addSlider');
    }

    //enregistrer un sliders dans ma base de donnée
    public function slider_add_save(Request $request)
    {

        $this->validate(
            $request,
            [
                'slider_name' => 'required',
                'slider_shot_description' => 'required',
                'slider_image' => 'image|nullable|max:19990'
            ]
        );

        if ($request->hasFile('slider_image')) {
            //1 get file name with extension


            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //$path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
            $path = $request->file('slider_image')->move(public_path() . '/slider_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $slider = new Slider();
        $slider->slider_name = $request->input('slider_name');
        $slider->slider_shot_description = $request->input('slider_shot_description');
        $slider->slider_image = $fileNameToStore;
        $slider->slider_status = 1;
        $slider->save();
        Toastr::success("le slider $slider->slider_name a bien été  ajouter :)", 'Success');
        return redirect('/slider_list');
    }

    //récupérer tous les sliders de ma base de données
    public function slider_list()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(3);
        return view('admin.sliders.listSlider')->with('sliders', $sliders);
    }

    public function desactiverslider($id)
    {
        $slider = Slider::find($id);
        $slider->slider_status = 0;
        $slider->update();
        Toastr::warning("le slider a été désactiver avec succès :)", 'Success');
        return redirect('/slider_list');
    }


    public function activerslider($id)
    {
        $slider = Slider::find($id);
        $slider->slider_status = 1;
        $slider->update();
        Toastr::success("le slider a été activer  avec succès :)", 'Success');
        return redirect('/slider_list');
    }


    public function delete_slider($id)
    {
        $slider = Slider::find($id);
        if ($slider->slider_image != 'noimage.jpg') {
            Storage::delete('public/slider_images/' . $slider->image);
        }
        $slider->delete();
        Toastr::success("le slider a été supprimer avec succès :)", 'Success');
        return redirect('/slider_list');
    }


    public function slider_update_save($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.updateSlider')->with('slider', $slider);
    }


    public function slider_update_save_action(Request $request)
    {

        $slider = Slider::find($request->input('id'));
        $slider->slider_name = $request->input('slider_name');
        $slider->slider_shot_description = $request->input('slider_shot_description');

        $this->validate(
            $request,
            [
                'slider_name' => 'required',
                'slider_name' => 'required',
                'slider_image' => 'image| nullable|max:19990'
            ]
        );

        if ($request->hasFile('slider_image')) {
            //1 get file name with extension

            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;

            $path = $request->file('slider_image')->move(
                public_path() . '/slider_images',
                $fileNameToStore
            );

            if ($slider->slider_image != 'noimage.jpg') {
                Storage::delete('public/slider_images/' . $slider->image);
            }
            $slider->slider_image = $fileNameToStore;
        }

        $slider->update();
        Toastr::success("le slider a été modifier avec succès :)", 'Success');
        return redirect('/slider_list');
    }
}
