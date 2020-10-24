@extends('layouts.internalApp')
@section('extraRef')
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/extensions/export/bootstrap-table-export.min.js"></script>
--}}
@endsection

@section('internalAppContent')
<div class="container">
    <div class="row">
        <table class="table table-hover table-responsive ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Applicant Name</th>
                <th scope="col">Passport Number</th>
                <th scope="col">Nationality</th>
                <th scope="col">Received at</th>
                <th scope="col">Last Update at</th>
                <th scope="col">Status</th>
                <th scope="col">Received by</th>
                <th scope="col">Owner</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($passports as $passport)
                <tr>
                    <th scope="row">{{$passport->id}}</th>
                    <td>{{$passport->applicantName}}</td>
                    <td>{{$passport->passportNumber}}</td>
                    <td>{{$passport->nationality}}</td>
                    <td class="text-wrap">{{$passport->created_at}}</td>
                    <td class="text-wrap">{{$passport->updated_at}}</td>
                    <td>{{$passport->status->statusName}}</td>
                    <td>{{$passport->created_by->name}}</td>
                    <td>{{isset($passport->handled_by)?$passport->handled_by->name:''}}</td>
                    <td>{{isset($passport->details)?$passport->details:''}}</td>
                    <td>
                        @if(Auth::user()->role_id == 3 or Auth::user()->role_id == 5)
                            <a href="{{route('staff.passport.edit',$passport->id)}}" class="btn btn-sm btn-success m-1">Handle</a>
                        @endif
                        <a href="{{route('staff.passport.show',$passport->id)}}" class="btn btn-sm btn-info m-1">View</a>

                        @if(Auth::user()->role_id == 4 or Auth::user()->role_id == 5)
                            <a href="{{route('staff.passport.assign',$passport->id)}}" class="btn btn-sm btn-warning m-1">Assign</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="extensions/export/bootstrap-table-export.js"></script>

@endsection
