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

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-none d-sm-inline-block shadow-sm bg-primary text-white p-2">Today Figures</div>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today(),'dateTo='.today()->addDay(),'status_id=1'])}}">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Recieved Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getReceivedPassportsToday']}}
                                    <a href="{{route('staff.passports.query.results',['dateFrom='.today(),'dateTo='.today()->addDay(),'status_id=2','owner_id='])}}">
                                        <span class="bg-danger text-white float-right" style="font-size: small; font-weight: lighter">
                                            (Not Assigned: {{$values['getReceivedPassportsWithoutOwnerToday']}})
                                        </span>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today(),'dateTo='.today()->addDay(),'status_id=2'])}}">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getPendingPassportsToday']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill text-warning" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today(),'dateTo='.today()->addDay(),'status_id=3'])}}">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approved Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getApprovedPassportsToday']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today(),'dateTo='.today()->addDay(),'status_id=4'])}}">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Rejected Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getRejectedPassportsToday']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--=================================================
    Last 30 days figures
    =====================================================--}}

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-none d-sm-inline-block shadow-sm bg-primary text-white p-2">Last 30 Days Figures</div>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today()->subDay(30),'dateTo='.today()->addDay(),'status_id=1'])}}">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Recieved Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{$values['getReceivedPassports']}}
                                    <a href="{{route('staff.passports.query.results',['dateFrom='.today()->subDay(30),'dateTo='.today()->addDay(),'status_id=1','owner_id='])}}">
                                        <span class="bg-danger text-white float-right" style="font-size: small; font-weight: lighter">
                                            (Not Assigned: {{$values['getReceivedPassportsWithoutOwner']}})
                                        </span>
                                    </a>
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today()->subDay(30),'dateTo='.today()->addDay(),'status_id=2'])}}">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getPendingPassports']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill text-warning" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today()->subDay(30),'dateTo='.today()->addDay(),'status_id=3'])}}">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approved Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getApprovedPassports']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{route('staff.passports.query.results',['dateFrom='.today()->subDay(30),'dateTo='.today()->addDay(),'status_id=4'])}}">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Rejected Passports</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$values['getRejectedPassports']}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 25px">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
