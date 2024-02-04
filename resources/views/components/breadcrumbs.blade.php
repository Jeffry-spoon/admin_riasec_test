@php
    $url = request()->getPathInfo();
    $items = explode('/', $url);
    unset($items[0]);
@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($items as $key => $item )
            @if($key == count($items))
            <li class="breadcrumb-item active">{{ Str::ucfirst($item) }}</li>
            @else
            <li class="breadcrumb-item" aria-current="page"> <a href="/{{ $item }}" class="text-body-secondary">{{ Str::ucfirst($item) }}</a></li>
            @endif

        @endforeach


    </ol>
</nav>
