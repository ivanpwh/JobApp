@extends('user.layouts.new_app')

@section('content')
    <h1 class="title">
    Hello World
    </h1>
    <p class="subtitle">
    My first website with <strong>Bulma</strong>!
    </p>
    <h1 class="title"><center>User Details</center></h1>
    <div class="box">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-12">
                <div class="tile">
                    <div class="tile is-parent is-2"></div>
                    <div class="tile is-parent is-3">
                        <article class="tile is-child notification is-light">
                            <p class="title">Profile Picture</p>
                            <figure class="image is-3by4">
                                <img src="https://bulma.io/images/placeholders/640x480.png">
                                <img src="{{ asset($details->photo) }}">
                            </figure>
                        </article>
                    </div>
                    <div class="tile is-parent is-light">
                        {{-- <article class="tile is-child notification is-light">
                            <p class="title">Middle tile</p>
                            <p class="subtitle">With an image</p>
                            <figure class="image is-4by3">
                                <img src="https://bulma.io/images/placeholders/640x480.png">
                            </figure>
                        </article> --}}
                        <table class="table notification">
                            <tr>
                                <th>Name</th>
                                <td>{{$currentUser->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$currentUser->email}}</td>
                            </tr>
                            <tr>
                                <th>ID Card</th>
                                <td>{{$details->card}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$details->address}}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$currentUser->dob}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$details->sex}}</td>
                            </tr>
                            <tr>
                                <th>Religion</th>
                                <td>{{$details->religion}}</td>
                            </tr>
                            <tr>
                                <th>Last Education</th>
                                <td>{{$details->last_edu}}</td>
                            </tr>
                            <tr>
                                <th>Major</th>
                                <td>{{$details->majors}}</td>
                            </tr>
                            <tr>
                                <th>Education Place</th>
                                <td>{{$details->edu_place}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if ($currentUser->status_cv == 0)
                                    <td><a class="button is-light">Unread</a></td>
                                @elseif($currentUser->status_cv == 1)
                                    <td><a class="button is-success">Accept</a></td>
                                @else
                                    <td><a class="button is-danger">Reject</a></td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
