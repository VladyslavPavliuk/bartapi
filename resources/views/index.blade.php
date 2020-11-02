@extends('layouts.app')
@section('content')
<div id="app">
    <v-header></v-header>
    <div class="container">
    <router-view></router-view>
    </div>
</div>
@endsection
