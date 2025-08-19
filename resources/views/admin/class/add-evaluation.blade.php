@extends('components.layouts.admin')

@section('content')
    <livewire:admin.class.add-evaluation :users_id="$users_id" :class_id="$class_id" :categories="$categories" />
@endsection
