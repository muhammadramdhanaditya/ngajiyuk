@extends('components.layouts.admin')

@section('content')
    <livewire:admin.class.edit :classes="$classes" :selectedCategories="$selectedCategories" />
@endsection
