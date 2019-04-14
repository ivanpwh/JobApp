<table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Status</th>
                <th>CV</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <a href="#" hidden>{{$i=1}}</a>
            @foreach ($users as $user)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dob}}</td>
                @if ($user->status == 1)
                    <td>Ready</td>
                @else
                    <td>Not Ready</td>
                @endif
                <td>
                    <div class="dropdown">
                        <div class="dropdown-trigger">
                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu7">
                            <span>Status CV</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                            </button>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu7" role="menu">
                            <div class="dropdown-content">
                                <a href="{{route("admin.statusUnread",$user->id)}}" class="dropdown-item unread"  data-id="{{$user->id}}">
                                    Unread
                                </a>
                                <a href="{{route("admin.statusAccept",$user->id)}}" class="dropdown-item" id="accept"  data-id="{{$user->id}}">
                                    Accept
                                </a>
                                <a href="{{route("admin.statusReject",$user->id)}}" class="dropdown-item reject"  data-id="{{$user->id}}">
                                    Reject
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a class="button is-primary is-rounded is-outlined" id="view-button" data-id="{{$user->id}}">View</a>
                    <a class="button is-success is-rounded is-outlined" id="update-button" data-id="{{$user->id}}">Edit</a>
                    <a class="button is-danger is-rounded is-outlined" id="delete-button"  data-id="{{$user->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>