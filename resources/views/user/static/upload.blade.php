@extends('user/layouts/new_app')

@section('content')
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-12">
            <div class="tile">
                <div class="tile is-parent is-light">
                    <article class="tile is-child notification is-light">
                        <p class="title">Middle tile</p>
                        <p class="subtitle">With an image</p>
                        <p>{{asset($details->cv)}}</p>
                        <figure class="image is-3by4">
                            <img src="https://bulma.io/images/placeholders/640x480.png">
                            {{-- <img src="{{asset($details->cv)}}"> --}}
                            <iframe src="{{asset($details->cv)}}" frameborder="0"></iframe>
                        </figure>
                    </article> 
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('user.upload',$currentUser->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('put')}}
        <div class="field">
            <div class="file is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="cv">
                    <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose a file…
                    </span>
                    </span>
                </label>
            </div>
            <br>
            <button type="submit" class="button is-success">Upload</button>
        </div>
    </form>

@endsection