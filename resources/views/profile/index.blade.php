@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="150" class="img-thumbnail">
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="150" class="img-thumbnail">
                @endif
                <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Update Picture</div>
                        <div class="card-body">
                            <input type="file" name="avatar" class="form-control"><br>
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red">
                                {{$errors->first('avatar')}}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">Update Your Information</div>
                    <div class="card-body">
                        <form method="post" action="{{route('profile.store')}}">
                            @if( Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <lebel>Address</lebel>
                                <textarea rows="3" class="form-control" name="address">{{Auth::user()->profile->address}}</textarea>
                            </div>
                            @if($errors->has('address'))
                                <div style="color: red">
                                    {{$errors->first('address')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <lebel>Phone Number</lebel>
                                <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->phone_number}}">
                            </div>
                            @if($errors->has('phone_number'))
                                <div style="color: red">
                                    {{$errors->first('phone_number')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <lebel>Experience</lebel>
                                <textarea rows="3" class="form-control" name="experience">{{Auth::user()->profile->experience}}</textarea>
                            </div>
                            @if($errors->has('experience'))
                                <div style="color: red">
                                    {{$errors->first('experience')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <lebel>BIODATA</lebel>
                                <textarea rows="3" class="form-control" name="bio">{{Auth::user()->profile->bio}}</textarea>
                            </div>
                            @if($errors->has('bio'))
                                <div style="color: red">
                                    {{$errors->first('bio')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">
                        <p><b>Name: </b> {{Auth::user()->name}}</p>
                        <p><b>Email: </b> {{Auth::user()->email}}</p>
                        <p><b>Address: </b> {{Auth::user()->profile->address}}</p>
                        <p><b>Phone: </b> {{Auth::user()->profile->phone_number}}</p>
                        <p><b>Experience: </b> {{Auth::user()->profile->experience}}</p>
                        <p><b>BIO: </b> {{Auth::user()->profile->bio}}</p>
                        <p><b>Member Since: </b> {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a>
                            </p>
                        @else
                            <p class="text-danger">Please Upload Your Cover Letter</p>

                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Resume</a>
                            </p>
                        @else
                            <p class="text-danger">Please Upload Resume Letter</p>

                        @endif


                    </div>
                </div>
                <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header text-center">Update Cover Letter</div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-control"><br>
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                    @if($errors->has('cover_letter'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                </div>
                </form>
                <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header text-center">Update Resume</div>
                    <div class="card-body">
                        <input type="file" name="resume" class="form-control"><br>
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                    @if($errors->has('resume'))
                        <div class="error" style="color: red">
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
