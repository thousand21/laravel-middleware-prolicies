@extends('backoffice.template.template')

@section('back')


<h2 class="page-section-heading text-center text-uppercase py-5">Modifiez Testimonial</h2>

    <section class="container rounded text-white py-5 ">

        @if ($errors->any())
        <div class="container alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form id="chefo" class="d-flex flex-column w-75" enctype="multipart/form-data" action="{{ route('testimonials.update', $testimonial->id) }}" method="post">
            @csrf
            @method('PUT')


    <div>
    <h3 class="text-dark">Testimonial</h3>
        <label class="text-dark" for="nom">Nom : </label>
        <input class="text-dark"  value="{{$testimonial->nom}}" name="nom" id="nom">
        
        <label class="text-dark" for="poste">Poste : </label>
        <input name="poste" id="poste" value="{{ $testimonial->poste }}">

        <label class="text-dark" for="commentaire">Commentaire : </label>
        <input name="commentaire" id="commentaire" value="{{ $testimonial->commentaire }}">

        <label class="text-dark" for="image">Image : </label>
        <input name="image" id="image" type="file"value="{{ $testimonial->image }}">
    </div>
            <button class="btn btn-success w-25 mt-3 text-dark" type="submit">Modifier</button>
        </form>
    </section>

@endsection