@extends('layouts.index')

@section('title')Профиль@endsection

@section('content')
    @include('layouts.messages')
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
@endsection

