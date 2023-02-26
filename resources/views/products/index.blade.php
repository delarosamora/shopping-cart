@extends('main')

@section('content')
<div id="product-page"></div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/products.js') }}"></script>
@endpush