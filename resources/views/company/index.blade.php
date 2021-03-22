@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card border-0">
            <div class="company-profile card-header" >
                @if(empty(Auth::user()->company->cover_photo))
                    <img style="width: 100%; height:200px" src="{{asset('avatar/logo.png')}}"  class="img-thumbnail">
                @else
                    <img style="width: 100%; height:200px" src="{{asset('uploads/cover')}}/{{Auth::user()->company->cover_photo}}"  class="img-thumbnail">
                @endif

            </div>
            <div class="company-des card-body">
                @if(empty(Auth::user()->company->logo))
                    <img  src="{{asset('avatar/logo.png')}}" style="width: 150px; height: 150px" class="img-thumbnail">
                @else
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" style="width: 150px; height: 150px" class="img-thumbnail">
                @endif

                <h1>{{$company->cname}}</h1>
                <p>{{$company->description}}</p><br>
                <p><b>{{$company->slogun}}</b></p>
                <p>
                    <b>Address:</b> {{$company->address}}<br>
                    <b>Phone: </b>{{$company->phone}}<br>
                    <b>Website: </b>{{$company->website}}
                </p>

            </div>
            </div>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($company->jobs as $job)
                    <tr>
                        <td>
                            <img src="{{asset('avatar/logo.png')}}" width="80">
                        </td>
                        <td>
                            Position: {{$job->position}}<br>
                            Job Type: <i class="fa fa-clock"></i> &nbsp; {{$job->type}}
                        </td>
                        <td>
                            <i class="fa fa-map-marker"></i>&nbsp; Address: {{$job->address}}
                        </td>
                        <td>
                            <i class="fa fa-calendar-check"></i>&nbsp; Date: {{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{route('jobs.show',[$job->id, $job->slug])}}">
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
