@props(['width'])
<img {{ $attributes->merge(['width' => $width . '%']) }} src="{{ asset('img/IMG_6060.PNG') }}" width=25%>
