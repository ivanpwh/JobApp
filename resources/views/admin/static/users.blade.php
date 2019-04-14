@extends('admin.layouts.new_app')

@section('content')
    <div class="box" id="coba">
        <div class="tabs">
            <ul>
                <li id='button-unread' class="is-active"><a>Unread</a></li>
                <li id='button-accept'><a>Accept</a></li>
                <li id='button-reject'><a>Reject</a></li>
            </ul>
        </div>
        <div id="table">
            @include('admin/static/list')
        </div>
    </div>
        
    <div class="modal" id="view-modal">
        <div class="modal-background"></div>
        <section class="hero">
            <div class="hero-body">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Modal title</p>
                        <button class="delete" aria-label="close" id="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <!-- Content ... -->
                        {{-- <input type="text" id="user-id" disabled> --}}
                        <div id="data-view">
                            {{-- @include('admin.static.list') --}}
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        {{-- <button class="button is-success">Save changes</button> --}}
                        <button class="button" id="cancel">Cancel</button>
                    </footer>
                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="update-modal">
        <div class="modal-background"></div>
        <section class="hero">
            <div class="hero-body">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Modal title</p>
                        <button class="delete" aria-label="close" id="close2"></button>
                    </header>
                    
                    <section class="modal-card-body">
                        <!-- Content ... -->
                        {{-- <input type="text" id="user-id" disabled> --}}
                        <div id="data-update">
                            {{-- @include('admin.static.list') --}}
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        {{-- <button type="sumbit" class="button is-success">Save changes</button> --}}
                        <button class="button" id="cancel2">Cancel</button>
                    </footer>
                </div>
            </div>
        </section>
    </div>
@endsection