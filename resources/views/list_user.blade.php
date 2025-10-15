@extends('layouts.app')

@section('content')
    <x-user-table :users="$users" />
@endsection
