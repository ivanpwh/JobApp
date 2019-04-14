<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href={{asset("css/style.css")}} rel="stylesheet">
</head>
<body>
    <section class="section">
        <div class="container">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" name="id" id="id" value="{{$currentUser->id}}" hidden>
                <h1 class="title"><center>User Details</center></h1>
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input" value="{{$currentUser->name}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input" value="{{$currentUser->email}}" disabled>
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
                            <input class="input is-danger" type="text" name="card" id="card" placeholder="Your ID Card">
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help is-danger">
                                {{ $errors->first('card') }}
                            </p>
                        @else
                            <input class="input" type="text" name="card" id="card" placeholder="Your ID Card">
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Address</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('address'))
                            <textarea class="textarea is-danger" placeholder="e.g. Jl Bojongsoang no 69" name="address" id="address" rows="10"></textarea>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help is-danger">
                                {{ $errors->first('address') }}
                            </p>
                        @else
                            <textarea class="textarea" placeholder="e.g. Jl Bojongsoang no 69" name="address" id="address" rows="10"></textarea>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Last Education</label>
                    <div class="control">
                        <div class="select">
                            <select name="last_edu" id="last_edu">
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
                            <input class="input is-danger" type="text" placeholder="e.g S1 Teknik Informatika" name="majors" id="majors">
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help-block">
                                {{ $errors->first('majors') }}
                            </p>
                        @else
                            <input class="input" type="text" placeholder="e.g S1 Teknik Informatika" name="majors" id="majors">
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Education Place</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('edu_place'))
                            <input class="input is-danger" type="text" placeholder="e.g Telkom University" name="edu_place" id="edu_place">
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help is-danger">
                                {{ $errors->first('edu_place') }}
                            </p>
                        @else
                            <input class="input" type="text" placeholder="e.g Telkom University" name="edu_place" id="edu_place">
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Upload Photo Profile</label>
                    <div class="file has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" name="photo">
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
                <div class="field">
                    <label class="label">Upload Curriculum Vitae</label>
                    <div class="file has-name">
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
                    @if ($errors->has('cv'))
                        <p class="help is-danger">
                            {{ $errors->first('cv') }}
                        </p>
                    @endif
                </div>
                <br>
                <button type="submit" class="button is-success">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>
