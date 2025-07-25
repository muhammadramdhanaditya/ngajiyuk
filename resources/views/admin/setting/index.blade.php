@extends('components.layouts.admin')

@section('content')
    <livewire:admin.setting.index :settings="$settings" />
@endsection
