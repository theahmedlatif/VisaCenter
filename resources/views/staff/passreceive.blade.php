@extends('layouts.internalApp')

@section('extraRef')
{{--    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>--}}

@endsection


@section('sideMenuList')

@endsection


@section('internalAppContent')

    <div class="container">
        <div class="row">
            <div class="jumbotron-fluid">
                <h2>Front Desk</h2>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <form class="form-group" action="{{route('staff.passport.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="applicantName">Applicant Name: </label>
                            <input type="text" id="applicantName" class="form-control @error('applicantName') is-invalid @enderror" name="applicantName" placeholder="Type Applicant Name..." value="{{old('applicantName')}}">
                            @error('applicantName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="passportNumber">Passport Number: </label>
                            <input type="text" id="passportNumber" class="form-control @error('passportNumber') is-invalid @enderror" name="passportNumber" placeholder="Type Passport Number..." value="{{old('passportNumber')}}">
                            @error('passportNumber')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="nationality">Passport Number: </label>
                            <input type="text" id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" placeholder="Applicant Nationality..." value="{{old('nationality')}}">
                            @error('nationality')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="btn" style="margin: 0.75em"></label>
                            <input type="submit" class="btn btn-success btn-outline-success btn-block" value="Receive">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
