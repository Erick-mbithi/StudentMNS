
@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">My Profile</h2>
        <p class="text-muted">
            Manage your personal information and account security.
        </p>
    </div>

    {{-- PROFILE INFORMATION --}}
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                <i class="bi bi-person-circle text-primary me-2"></i>
                Personal Information
            </h5>
        </div>

        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>

    </div>

    {{-- UPDATE PASSWORD --}}
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                <i class="bi bi-shield-lock text-success me-2"></i>
                Change Password
            </h5>
        </div>

        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>

    </div>

    {{-- DELETE ACCOUNT --}}
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Delete Account
            </h5>
        </div>

        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

</div>

@endsection
