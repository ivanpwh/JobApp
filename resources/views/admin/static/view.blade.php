s<div class="field">
    <div class="control">
        <label class="label">Name</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$users->name}}" name="name" id="name">
    </div>
    <div class="control">
        <label class="label">Email</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$users->email}}" name="email" id="email">
    </div>
    <div class="control">
        <label class="label">Date Of Birth</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$users->dob}}" name="dob" id="dob">
    </div>
    <div class="control">
        <label class="label">Gender</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->sex}}" name="sex" id="sex">
    </div>
    <div class="control">
        <label class="label">Religion</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->religion}}" name="religion" id="religion">
    </div>
    <div class="control">
        <label class="label">ID Card</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->card}}" name="card" id="card">
    </div>
    <div class="control">
        <label class="label">Address</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->address}}" name="address" id="address">
    </div>
    <div class="control">
        <label class="label">Last Education</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->last_edu}}" name="address" id="address">
    </div>
    <div class="control">
        <label class="label">Majors</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->majors}}" name="majors" id="majors">
    </div>
    <div class="control">
        <label class="label">Education Place</label>
        <input class="input" type="text" placeholder="Primary input" value="{{$details->edu_place}}" name="edu_place" id="edu_place">
    </div>
    <div class="control">
        {{-- <label class="label"></label> --}}
        <br>
        <a class="button is-link" href="{{asset($details->cv)}}">Download CV</a>
    </div>
</div>