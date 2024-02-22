@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            @forelse ($projects as $project)
                <div class="card col-md-4 mb-4 mx-4">
                    <div class="card-body">
                        <img class="w-100" src="{{$project->image}}" alt="">
                        {{ $project->title }}
                        <p>{{ $project->user->name }}</p>

                        <p>{{ $project->type->name }}</p>

                        <p>{{ $project->description }}</p>

                        <p>{{ $project->date }}</p>



                        <p>vedi i particolare del progetto:</p>
                        <a href="{{ route('guest.show', $project) }}"> <button class="btn btn-primary"> More</button>
                        </a>
                    </div>
                </div>
            @empty
                <h1>There are no projects available</h1>
            @endforelse
        </div>
    </div>
@endsection
