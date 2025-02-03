
@extends('layouts.user_type.auth')

@section('content')
<h1>Factura #{{ $transaction->id }}</h1>
<p>Fecha: {{ $transaction->date }}</p>
<p>Total: ${{ $transaction->total }}</p>
@endsection