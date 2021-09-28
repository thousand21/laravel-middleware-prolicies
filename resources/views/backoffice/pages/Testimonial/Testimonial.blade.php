@extends('backoffice.template.template')

@section('back')

<section >


    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="container d-flex justify-content-center">
        <a class="btn btn-success mb-5 fs-4" href="{{route('testimonials.create')}}">Ajouter un nouveau Testimonial</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Photo</th>
                <th scope="col">Bouton</th>

            </tr>
        </thead>
        <tbody>
            @foreach($testimonial as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->nom}}</td>
                <td>{{$data->poste}}</td>
                <td><img src="{{ asset("img/" . $data->image) }}" alt=""></td>
                <td>{{$data->commentaire}}</td>
                <td>
                <div class="d-flex justify-content-around my-3">
                                <a class="btn btn-primary text-black" href="{{route('testimonials.show', $data->id)}}">Détails</a>
                                <a class="btn btn-warning" href="{{route('testimonials.edit', $data->id)}}">Modifier</a>
                                <form action="{{route('testimonials.destroy', $data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-black" type="submit">Supprimer</button>
                                </form>
                            </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection