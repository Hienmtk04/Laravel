@extends('layouts.site')
@section('title', 'Trang chủ')
@section('maincontent')
    {{-- slider --}}
    <x-slider />

    {{-- intro --}}
    <x-intro-brand />

    {{-- type Product --}}
    <x-type-product />

    <!-- newProduct----------------------------------------------------------------------- -->
    <x-new-product />

    <!-- trendProduct----------------------------------------------------------------------- -->
    <x-sale-product />

    <!-- newPost----------------------------------------------------------------------- -->
    <x-new-post />


    {{-- sendLetter --}}
    <x-send-letter />

@endsection
