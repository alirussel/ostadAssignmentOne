@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
