@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Job Post</div>

                    <div class="card-body">
                        <form action="{{route('jobs.store')}}" method="post" >
                            @csrf
                            @if( Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                            @if($errors->has('title'))
                                <div style="color: red">
                                    {{$errors->first('title')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Roles</label>
                            <input type="text" name="roles" class="form-control" value="{{old('roles')}}">
                        </div>
                            @if($errors->has('roles'))
                                <div style="color: red">
                                    {{$errors->first('roles')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{old('title')}}</textarea>
                        </div>
                            @if($errors->has('description'))
                                <div style="color: red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" class="form-control" value="{{old('position')}}">
                        </div>
                            @if($errors->has('position'))
                                <div style="color: red">
                                    {{$errors->first('position')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                            @if($errors->has('category'))
                                <div style="color: red">
                                    {{$errors->first('category')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                            @if($errors->has('address'))
                                <div style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="casual">Casual</option>
                            </select>
                        </div>
                            @if($errors->has('type'))
                                <div style="color: red">
                                    {{$errors->first('type')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="live">Live</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                            @if($errors->has('status'))
                                <div style="color: red">
                                    {{$errors->first('status')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <label>Application Deadline</label>
                            <input type="date" name="last_date" class="form-control">
                        </div>
                            @if($errors->has('date'))
                                <div style="color: red">
                                    {{$errors->first('date')}}
                                </div>
                            @endif

                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
