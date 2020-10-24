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
        <div class="row">
            <div class="jumbotron-fluid">
                <h2>Approval Center</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 bg-light shadow rounded align-self-center " style="">
                <div class="col-3  float-left" style="font-size: 14em">
                    <svg width="90%" height="90%" viewBox="0 0 16 16" class="bi bi-file-person mb-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"></path>
                        <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                    </svg>
                </div>
                <div class="col-8 float-left border-left">
                    <div class="mt-4 pl-5">
                        <h4>
                            <label class="mb-1" style="font-weight: bold">Applicant Name:</label> {{$passport->applicantName}}
                            <a href="#handleForm" class="float-right" style="scroll-behavior: smooth"><button class="btn btn-success btn-sm">Handle Passport</button></a>
                        </h4>
                        <ul class="list-unstyled mb-5">
                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Passport Number: </label>
                                <input class="form-control form-control-sm" type="text" placeholder="{{$passport->passportNumber}}" readonly>
                            </li>
                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Nationality:</label>
                                <input class="form-control form-control-sm" type="text" placeholder="{{$passport->nationality}}" readonly>
                            </li>
                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Status:</label>
                                @if($passport->status->id===1)
                                    <span class="ml-1 text-primary inline">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                </svg>
                                </span>
                                @elseif($passport->status->id===2)
                                    <span class="ml-1 text-warning">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                    </svg>
                                </span>
                                @elseif($passport->status->id===3)
                                    <span class="ml-1 text-success">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                </span>
                                @elseif($passport->status->id===4)
                                    <span class="ml-1 text-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                </span>
                                @endif
                                <input class="form-control form-control-sm" type="text" placeholder="{{$passport->status->statusName}}" readonly>


                            </li>
                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Received by:</label>
                                <input class="form-control form-control-sm" type="text" placeholder="{{$passport->created_by->name}}" readonly>

                            </li>

                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Handled by:</label>
                                <input class="form-control form-control-sm" type="text" placeholder="{{isset($passport->owner_id)?$passport->handled_by->name:''}}" readonly>

                            </li>
                            <li class="mt-2">
                                <label class="mb-1" style="font-weight: bold">Comments</label>
                                <textarea class="form-control" name="details" readonly>{{isset($passport->details)?$passport->details:''}}</textarea>
                            </li>
                            <div class="row mb-1 mt-2">
                                <p class="card-text"><small class="text-muted"><label class="mb-1" style="font-weight: bold">Updated at</label> {{$passport->updated_at}}</small></p>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h4 class="text-primary" style="font-weight: bold">Handle Passport</h4>
        <form @if($passport->status_id < 3) action="{{route('staff.passport.dispatch',$passport->id)}}"  method="post" @endif id="handleForm">
            @if($passport->status_id < 3)
                @csrf
                {{method_field('PUT')}}
            @endif
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Owner</label>
                    <select class="form-control" id="inputEmail4" name="owner_id" @if($passport->status_id >= 3) readonly @endif>
                        @foreach($users as $user)
                                <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <input type="submit" class="btn btn-outline-primary btn-lg btn-block" @if($passport->status_id >= 3) disabled @endif>
            </div>
        </form>
    </div>


@endsection
