<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</head>

<body>
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 pt-16">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/books"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-book"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Books</span>
                        @if (Request::is('books') || Request::is('books/*'))
                            <div
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium rounded-full">
                                <i class="fa-solid fa-circle-arrow-left"></i>
                            </div>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="/categories"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                        @if (Request::is('categories') || Request::is('categories/*'))
                            <div
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium rounded-full">
                                <i class="fa-solid fa-circle-arrow-left"></i>
                            </div>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="/loans"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-table-list"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Loans</span>
                        @if (Request::is('loans') || Request::is('loans/*'))
                            <div
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium rounded-full">
                                <i class="fa-solid fa-circle-arrow-left"></i>
                            </div>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        @yield('content')
    </div>
</body>

</html>
