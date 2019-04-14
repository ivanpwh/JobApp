@extends('user.layouts.new_app')

@section('content')
    <h1 class="title"><center>Edit Profile</center></h1>
    <div class="box">
        <form method="POST" action="{{ route('user.update',$currentUser->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('put')}}
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-12">
                <div class="tile">
                    <div class="tile is-parent is-6">
                        <article class="tile is-child notification is-light">
                            <input type="text" name="id" id="id" value="{{$currentUser->id}}" hidden>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="name" id="name" value="{{$currentUser->name}}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="email" id="email" value="{{$currentUser->email}}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Date of Birth</label>
                                <div class="control">
                                    <input type="date" name="dob" value="{{$currentUser->dob}}">
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Gender</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="sex" id="sex">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Religion</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="religion" id="religion">
                                            <option value="{{$details->religion}}">{{$details->religion}}</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Protestant">Protestant</option>
                                            <option value="Catholic">Catholic</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddhist">Buddhist</option>
                                            <option value="Confucian">Confucian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">ID Card</label>
                                <div class="control has-icons-right">
                                    @if ($errors->has('card'))
                                        <input class="input is-danger" type="text" name="card" id="card" placeholder="Your ID Card" value="{{$details->card}}">
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <p class="help is-danger">
                                            {{ $errors->first('card') }}
                                        </p>
                                    @else
                                        <input class="input" type="text" name="card" id="card" placeholder="Your ID Card" value="{{$details->card}}">
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Address</label>
                                <div class="control has-icons-right">
                                    @if ($errors->has('address'))
                                        <textarea class="textarea is-danger" placeholder="e.g. Jl Bojongsoang no 69" name="address" id="address" rows="10">{{$details->address}}</textarea>
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <p class="help is-danger">
                                            {{ $errors->first('address') }}
                                        </p>
                                    @else
                                        <textarea class="textarea" placeholder="e.g. Jl Bojongsoang no 69" name="address" id="address" rows="10">{{$details->address}}</textarea>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="tile is-parent id-6">
                        <article class="tile is-child notification is-light">
                            <div class="field">
                                <label class="label">Last Education</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="last_edu" id="last_edu">
                                            <option value="{{$details->last_edu}}">{{$details->last_edu}}</option>
                                            <option value="Elementary School">Elementary School</option>
                                            <option value="Junior High School">Junior High School</option>
                                            <option value="High School">High School</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Magister">Magister</option>
                                            <option value="Doctor">Doctor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Majors</label>
                                <div class="control has-icons-right">
                                    @if ($errors->has('majors'))
                                        <input class="input is-danger" type="text" placeholder="e.g S1 Teknik Informatika" name="majors" id="majors" value="{{$details->majors}}">
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <p class="help-block">
                                            {{ $errors->first('majors') }}
                                        </p>
                                    @else
                                        <input class="input" type="text" placeholder="e.g S1 Teknik Informatika" name="majors" id="majors" value="{{$details->majors}}">
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Education Place</label>
                                <div class="control has-icons-right">
                                    @if ($errors->has('edu_place'))
                                        <input class="input is-danger" type="text" placeholder="e.g Telkom University" name="edu_place" id="edu_place" value="{{$details->edu_place}}">
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <p class="help is-danger">
                                            {{ $errors->first('edu_place') }}
                                        </p>
                                    @else
                                        <input class="input" type="text" placeholder="e.g Telkom University" name="edu_place" id="edu_place" value="{{$details->edu_place}}">
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Upload Photo Profile</label>
                                <div class="file has-name">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="photo" value="{{$details->photo}}">
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
                                @if ($errors->has('photo'))
                                    <p class="help is-danger">
                                        {{ $errors->first('photo') }}
                                    </p>
                                @endif
                            </div>
                            <br>
                            <button type="submit" class="button is-success">Submit</button>
                        </article>
                    </div>
                </div>  
            </div>
        </div>
        </form>
    </div>
@endsection
