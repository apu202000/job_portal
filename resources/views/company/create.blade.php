@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="width: 100%" src="{{asset('avatar/logo.png')}}" width="150" class="img-thumbnail">
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" width="150" class="img-thumbnail">
                @endif
                <form action=" {{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Company Logo</div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-control"><br>
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        @if($errors->has('logo'))
                            <div class="error" style="color: red">
                                {{$errors->first('logo')}}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">Update Company Information</div>
                    <div class="card-body">
                        <form method="post" action="{{route('company.store')}} ">
                            @csrf
                            <div class="form-group">
                                <lebel>Address</lebel>
                                <textarea rows="3" class="form-control" name="address"> {{Auth::user()->company->address}}</textarea>
                            </div>
                            @if($errors->has('address'))
                                <div style="color: red">
                                    {{$errors->first('address')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <lebel>Phone Number</lebel>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}} ">
                            </div>
                            @if($errors->has('phone'))
                                <div style="color: red">
                                    {{$errors->first('phone')}}
                                </div>

                            @endif

                            <div class="form-group">
                                <lebel>Web Address</lebel>
                                <input type="text" class="form-control" name="website" value=" {{Auth::user()->company->website}}">
                            </div>
                            @if($errors->has('website'))
                                <div style="color: red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <lebel>Slogan</lebel>
                                <input type="text" class="form-control" name="slogan" value=" {{Auth::user()->company->slogan}}">
                            </div>
                            @if($errors->has('slogan'))
                                <div style="color: red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif


                            <div class="form-group">
                                <lebel>Description</lebel>
                                <textarea rows="3" class="form-control" name="description"> {{Auth::user()->company->description}}</textarea>
                            </div>
                            @if($errors->has('description'))
                                <div style="color: red">
                                    {{$errors->first('description')}}
                                </div>

                            @endif

                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>

                            @if( Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Company Details</div>
                    <div class="card-body">
                        <p><b>Company Name: </b> {{Auth::user()->company->cname}}</p>
                        <p><b>Web Address: </b> {{Auth::user()->company->website}}</p>
                        <p><b>Phone: </b> {{Auth::user()->company->phone}}</p>
                        <p><b>Website: </b> {{Auth::user()->company->website}}</p>
                        <p><b>Address: </b> {{Auth::user()->company->address}}</p>
                        <p><b>Company Page: </b> <a href="company/{{Auth::user()->company->slug}}">view</a> </p>
                        <p><b>Slogan: </b> {{Auth::user()->company->slogan}}</p>
                        <p><b>Member Since: </b> {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                    </div>
                </div>
                <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header text-center">Update Cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo" class="form-control"><br>
                            @if($errors->has('cover_photo'))
                                <div class="error" style="color: red">
                                    {{$errors->first('cover_photo')}}
                                </div>
                            @endif
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
