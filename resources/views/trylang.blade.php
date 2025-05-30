<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.welcome') }}</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        select {
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>
    <h1>@lang('messages.welcome')</h1>
    <p>{{ __('messages.news', ['name' => 'Budi']) }}</p>

    {{-- Dropdown untuk ganti bahasa --}}
<form method="GET" action="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}">
    <select name="lang">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="id" {{ app()->getLocale() == 'id' ? 'selected' : '' }}>Bahasa Indonesia</option>
    </select>
    <br>
    <button type="submit">Switch Language</button>
</form>

<a href="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}">
    Switch to {{ app()->getLocale() == 'id' ? 'English' : 'Bahasa Indonesia' }}
</a>


</body>
</html>
