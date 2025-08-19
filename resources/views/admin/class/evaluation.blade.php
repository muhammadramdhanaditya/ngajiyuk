@extends('components.layouts.admin')

@section('content')
    <livewire:admin.class.evaluation :evaluations="$evaluations" :users_id="$users_id" :class_id="$class_id" :category_class="$category_class" />
@endsection
