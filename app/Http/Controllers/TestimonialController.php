<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial=Testimonial::all();
        return view('backoffice.pages.Testimonial.Testimonial',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.pages.testimonial.testimonialCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "poste" => "required",
            "image" => "required",
            "commentaire" => "required",
            
        ]);
        $testimonial = new Testimonial();
        $testimonial->nom = $request->nom;
        $testimonial->poste = $request->poste;
        $testimonial->image = $request->file('image')->hashName();
        $testimonial->commentaire = $request->commentaire;
        
        $testimonial->save();

        $request->file('image')->storePublicly('img', 'public');
        return redirect()->route('testimonials.index')->with('message', 'Testimonial ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('backoffice.pages.Testimonial.TestimonialShow',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backoffice.pages.Testimonial.TestimonialEdit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            "nom" => "required",
            "poste" => "required",
            "image" => "required",
            "commentaire" => "required",
            
        ]);
        Storage::disk("public")->delete("img/" . $testimonial->image);
        $testimonial->nom = $request->nom;
        $testimonial->poste = $request->poste;
        $testimonial->commentaire = $request->commentaire;
        $testimonial->image = $request->file("image")->hashName();
        $testimonial->save();
        $request->file('image')->storePublicly('img', 'public');

        return redirect()->route('testimonials.index')->with('message', 'Modifié avec succès');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::disk('public')->delete('img/'. $testimonial->image);
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('message', 'Chef supprimé avec succès');
    }
}
