<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSSのCDN版を今回は使います（時短のためです） -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <main class="px-2 md:px-0 py-8">
            <div class="bg-gray-50 rounded-lg container mx-auto px-2 md:px-6 py-6">
                <header class="mb-8 flex justify-between  flex-col gap-8">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-bold text-gray-800">アイコン一覧</h1>
                        <div class="">
                            <a href="{{ url('icon/create') }}"
                                class="w-full text-[13px] sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 ease-in-out text-center">
                                新規アイコン登録
                            </a>
                        </div>
                    </div>
                </header>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <ul class="divide-y divide-gray-200">
                        @foreach ($icons as $icon)
                        <li class="flex items-center py-4 px-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <img src="{{ $icon->image_path }}" alt="アイコン画像"
                               class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex flex-col md:block ml-4">
                                <div class="flex-grow">
                                    <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                        {{ $icon->title }}
                                  </h2>
                                </div>
                                <div class="flex mt-3">
                                    <a href="{{ url('icon/' . $icon->id) }}"
                                        class="text-blue-500 hover:text-blue-600 font-medium">
                                        詳細
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
