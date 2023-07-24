@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input mt-1 rounded-md block w-full focus:border-indigo-100 shadow-md ']) !!}>
