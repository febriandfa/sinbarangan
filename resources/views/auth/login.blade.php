<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- custom scripts -->
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
    </style>
</head>

<body class="bg-gray-100">

    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="{{ asset('assets/Frame 68.png') }}" alt="image" class="object-cover w-full h-full">
        </div>
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            <!-- Session Status -->
            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="px-6 py-8">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autocomplete="username"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-custom-orange hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Log
                    in</button>
                <!-- Sign up  Link -->
                <div class="mt-6 flex space-between justify-center space-x-1">
                    <h2>Belum memiliki akun?</h2>
                    <a href="{{ route('register') }}" class="hover:underline text-custom-orange text-center">Daftar</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>