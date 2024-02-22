@extends('layouts.app')
@section('title', 'Project Details')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $project->title }}</h2>
                        <p>By: {{ $project->user->name }}</p>
                        <p>Type: {{ $project->type->name }}</p>
                        <p>Description: {{ $project->description }}</p>
                        <p>Date: {{ $project->date }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
