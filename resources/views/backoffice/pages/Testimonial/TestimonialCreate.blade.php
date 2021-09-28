@extends('backoffice.template.template')

@section('back')

<section class="container">

    <h2>Create Testimonial</h2>
    @if ($errors->any())
        <div class="container alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="container d-flex flex-column w-75" action="{{route('testimonials.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="nom">Nom : </label>
        <input type="text" value="{{old('nom')}}" name="nom" id="nom">

        <label for="poste">Poste</label>
        <input type="text" name="poste" id="poste" value="{{old('poste')}}">

        <label for="commentaire">Commentaire</label>
        <input type="text" name="commentaire" id="commentaire" value="{{old('commentaire')}}">

        <label for="image">Image</label>
        <input type="file" name="image" id="image" value="{{old('image')}}">

        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection