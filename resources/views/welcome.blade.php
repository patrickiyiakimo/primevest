<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Primevest</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="bg-green-500 text-white px-10 py-3 flex justify-center items-center">
            <h1 class="text-2xl font-bold">Welcome To Primevest</h1>
        </div>
        
        <div class="bg-blue-500 text-white p-4 m-4 rounded-lg">
            <p>If you see this blue box, Tailwind is working!</p>
        </div>
    </body>
</html>