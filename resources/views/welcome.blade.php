@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
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
        <div>
            <a href="{{route('allJobs')}}">
                <button style="width: 100%" class="btn btn-success btn-lg">Browse All Jobs</button>
            </a>
        </div><br><br>
        <h1 class="text-center">Feature Companies</h1>

        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{str_limit($company->description, 25)}}</p>
                            <a href="{{route('company.index',[$company->id, $company->slug])}}" class="btn btn-outline-success">Visit Company</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
@endsection
