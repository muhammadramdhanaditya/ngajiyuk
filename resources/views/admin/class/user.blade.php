@extends('components.layouts.admin')

@section('content')
    <livewire:admin.class.user :userclass="$userclass" />
@endsection
