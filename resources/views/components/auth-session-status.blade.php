@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif

@section('logo')
    <img src="{{ asset('images/mfts.png') }}" alt="MFTS Logo" class="w-20 h-20 mx-auto">
@endsection
