@extends('main')

@section('content')
<div id="checkout-page"></div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/checkout.js') }}"></script>
@endpush