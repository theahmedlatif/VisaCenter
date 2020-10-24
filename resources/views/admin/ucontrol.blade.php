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

@section('internalAppContent')
<div class="container">
        <fieldset disabled>
        <div class="form-row">
            <div class="form-group col-md-2 mb-3">
                <label for="disabledTextInput">User id: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->id}}">
            </div>

            <div class="form-group col-md-5 mb-3">
                <label for="disabledTextInput">Name: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->name}}">
            </div>

            <div class="form-group col-md-5 mb-3">
                <label for="disabledTextInput">Email: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->email}}">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="disabledTextInput">Role: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->role->roleName}}">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="disabledTextInput">Created at: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->created_at}}">
            </div>

            <div class="form-group col-md-4 mb-3">
                <label for="disabledTextInput">Last Update at: </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->updated_at}}">
            </div>
        </div>
    </fieldset>
</div>


<div class="container">
    <form class="form-group" action="{{route('admin.panel.user.update',$user->id)}}" method="post">
        {{method_field('PUT')}}
        @csrf
        <label for="role" class="col-sm-4 col-form-label gray-bg "><strong>Update User Role: </strong></label>
        <select id="role" name="role_id" class="form-control col-sm-8">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->roleName}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-danger btn-sm btn-outline-danger btn-block" value="Update">
    </form>
</div>

@endsection
