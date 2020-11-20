@extends('layouts.master')


@section('NoiDung')
{{-- @if($khoahoc != "")
{{ $khoahoc }}
@else
{{ "Khong co khoa hoc" }}
@endif --}}
<br>
{{-- {{$khoahoc or "khong co khoa hoc"}} --}}
{{-- @for ($i = 0; $i < 10; $i++)
    {{ $i. " " }}
@endfor --}}

@php
    $khoahoc = array("PHP", "IOS", "Python", "Golang");
@endphp
{{-- @if (!empty($khoahoc))
@foreach ($khoahoc as $value)
    {{$value. " "}}
@endforeach
@else
    {{"Mang rong"}}
@endif --}}
@forelse ($khoahoc as $value)
    @continue($value == "PHP")
    @break($value == "Golang")
    {{$value}}
@empty
    {{ "mang rong" }}
@endforelse

@endsection