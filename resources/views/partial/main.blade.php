<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinbarangan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- Include Video.js CSS -->
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />

    <!-- Include Video.js JavaScript -->
    <script src="https://vjs.zencdn.net/7.10.2/video.js"></script>

    <!-- Include Video.js YouTube Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/videojs-youtube/dist/Youtube.min.js"></script>
    
    <script src="https://cdn.tiny.cloud/1/p2dc08j629ts2y9bbvyzizd6ds2ljjkkewgj8s34cojjbagt/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        /* Custom Tailwind CSS styles */
        .bg-custom-orange {
            background-color: #FB8A3C;
            /* Adjust this to your desired shade of orange */
        }

        .text-custom-orange {
            color: #FB8A3C;
            /* Adjust this to your desired shade of orange */
        }

        .border-custom-orange {
            color: #FB8A3C;
            /* Adjust this to your desired shade of orange */
        }

    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    <div class="flex">
        @include('partial.sidebar')

        @include('partial.header')
    </div>
    <div class="px-4 sm:ml-64">
        @yield('content')
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
