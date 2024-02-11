@php
    $url = request()->getPathInfo();
    $items = explode('/', $url);
    $breadcrumbs = [];
    $path = '';

    // Loop through items to create breadcrumb items
    foreach ($items as $key => $item) {
        if ($item !== '') {
            $path .= '/' . $item;
            $breadcrumbs[] = [
                'name' => ucfirst($item),
                'url' => $path,
            ];
        }
    }
@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if ($key === count($breadcrumbs) - 1)
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}" class="text-body-secondary">{{ $breadcrumb['name'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
