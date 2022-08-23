@props(['disabled' => false, 'select' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $select != false ? "checked":"" }}  {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
