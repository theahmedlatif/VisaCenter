@extends('layouts.internalApp')

@section('extraRef')
{{--
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
--}}

@endsection


@section('sideMenuList')

@endsection


@section('internalAppContent')
<div class="container">
    <form action="{{route('staff.passports.query.results')}}" method="get">
        <div class="form-row">
            <div class="form-group col-md-6 mb-3">
                <label for="dateFrom">Select Start Date </label>
                <input type="date" id="dateFrom" class="date form-control @error('dateFrom') is-invalid @enderror" name="dateFrom" value="{{old('dateFrom')}}">
                @error('dateFrom')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-3">
                <label for="dateTo">Select End Date </label>
                <input type="date" id="dateTo" class="date form-control @error('dateTo') is-invalid @enderror" name="dateTo" value="{{old('dateTo')}}">
                @error('dateTo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="creator_id">Received by</label>
                <select id="creator_id" name="creator_id" class="form-control">
                    <option value="">Please Select User...</option>
                    @foreach($users as $user)
                        @if($user->role_id == 2 )
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('creator_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="status_id">Select Status</label>
                <select id="status_id" name="status_id" class="form-control col-sm-8">
                    <option value="">Please Select Status...</option>
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->statusName}}</option>
                    @endforeach
                </select>
                @error('status_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="owner_id">Handled by</label>
                <select id="owner_id" name="owner_id" class="form-control">
                    <option value="">Please Select User...</option>
                    @foreach($users as $user)
                        @if($user->role_id == 3 )
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('owner_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4 mb-3 col-lg-offset-8">
                <input type="submit" class="btn btn-info btn-block" value="Query">
            </div>
        </div>
    </form>
</div>

<div class="container">
    @yield('passportsGrid')
</div>


    <script type="text/javascript">
        $('.date').datepicker({
            format: 'mm-dd-yyyy'
        });
    </script>
@endsection

