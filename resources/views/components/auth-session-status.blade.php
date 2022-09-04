@props(['status'])

{{--@if ($status)--}}
{{--    <div {{ $attributes->merge(['class' => 'fw-normal text-sm text-success']) }}>--}}
{{--        {{ $status }}--}}
{{--    </div>--}}
{{--@endif--}}


{{--bs 5--}}
@if ($status)
    <div {{ $attributes->merge(['class' => 'fs-3 text-success']) }}>
        {{ $status }}
    </div>
@endif
