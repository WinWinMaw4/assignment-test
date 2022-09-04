@props(['errors'])
{{--@if ($errors->any())--}}
{{--    <div {{ $attributes }}>--}}
{{--        <div class="font-medium text-red-600">--}}
{{--            {{ __('Whoops! Something went wrong.') }}--}}
{{--        </div>--}}

{{--        <ul class="mt-3 list-disc list-inside text-sm text-red-600">--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif
{{----}}

{{--bs 5--}}

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fw-bold fs-3 text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 fs-6 fw-light text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
