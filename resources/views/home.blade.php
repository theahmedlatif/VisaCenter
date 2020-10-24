@extends('layouts.internalApp')

@section('internalAppContent')
    <div class="row ml-4 mt-1">
        <div class="float-left" style="font-size: 2em; font-weight: normal; color: #818181">Weclome {{Auth::user()->name}}!</div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="font-size:2em; color: #0055b3">{{ __('Control Panel') }}</div>

                <div class="card-body">
                    <div class="container-fluid m-1">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(Auth::user()->role_id > 1)
                            @if(Auth::user()->role_id == 5)
                            <a href="{{route('admin.panel.users')}}" class="text-decoration-none">
                            <button class="btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-badge" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 0 1 4.5 0h7A2.5 2.5 0 0 1 14 2.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2.5zM4.5 1A1.5 1.5 0 0 0 3 2.5v10.795a4.2 4.2 0 0 1 .776-.492C4.608 12.387 5.937 12 8 12s3.392.387 4.224.803a4.2 4.2 0 0 1 .776.492V2.5A1.5 1.5 0 0 0 11.5 1h-7z"/>
                                    <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
                                </svg><br>
                                <p class="mt-2">Users Control Panel</p>
                            </button>
                            </a>
                            @endif

                            @if(Auth::user()->role_id == 2 or Auth::user()->role_id == 5)
                            <a href="{{route('staff.passport')}}" class="text-decoration-none">
                            <button class="btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-folder-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                                    <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg><br>
                                <p class="mt-2">Receive Passport</p>
                            </button>
                            </a>
                            @endif

                            @if(Auth::user()->role_id == 3 or Auth::user()->role_id == 5)
                            <a href="{{route('staff.passports.workspace')}}" class="text-decoration-none">
                            <button class="btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-briefcase-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                                    <path fill-rule="evenodd" d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v1.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z"/>
                                </svg><br>
                                <p class="mt-2">My Workspace</p>
                            </button>
                            </a>
                            @endif

                            @if(Auth::user()->role_id == 3 or Auth::user()->role_id == 5)
                            <a href="{{route('staff.passports.myHistory')}}" class="text-decoration-none">
                            <button class="btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg><br>
                                <p class="mt-2">My History</p>
                            </button>
                            </a>
                            @endif
                            <a href="{{route('staff.passports.query')}}" class="text-decoration-none">
                            <button class="btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg><br>
                                <p class="mt-2">Query</p>
                            </button>
                            </a>
                            @if(Auth::user()->role_id == 4 or Auth::user()->role_id == 5)
                                <a class="text-decoration-none" href="{{route('reports.dashboard')}}" >
                                    <button class="text-decoration-none btn btn-lg btn-outline-primary align-content-center m-1 shadow-sm" style="height: 8em; width: 8em">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                            <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                                        </svg><br>
                                        <p class="mt-2">Passports Dashboard</p>
                                    </button>
                                </a>
                                @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
