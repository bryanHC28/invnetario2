<div>
    <label for="{{ $model }}" class="mb-2">{{ $label.':' }} {!! isset($required) ? '<span class="text-danger">*</span>' : '' !!}</label>
    <select
        id="{{ $model }}"
        name="{{ $model }}"
        class="form-control @error($model) is-invalid @enderror"
        {!! isset($onchange) ? "onchange=\"$onchange\"" : '' !!}
        {!! isset($required) ? 'required="required"' : '' !!}
        {!! isset($readonly) ? 'readonly="readonly"' : '' !!}
        {!! isset($disabled) ? 'disabled="disabled"' : '' !!}
    >
    {!! $slot !!}
    </select>
    @error($model)<span class="font-italic text-danger">{{ $message }}</span>@enderror
</div>
