@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('account.password.action') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="currentPassword">Current Password:</label>
                            <input type="password" class="form-control" name="currentPassword"/>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password:</label>
                            <input type="password" class="form-control" name="newPassword" autocomplete="new-password"/>
                        </div>
                        <div class="form-group">
                            <label for="newPassword_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control" name="newPassword_confirmation" autocomplete="new-password"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
