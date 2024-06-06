<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garagiste - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="flex flex-col justify-between min-h-screen bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold">Your Website</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home.index') }}" class="hover:text-gray-300">Home</a></li>
                    <li><a href="{{ route('clients.index') }}" class="hover:text-gray-300">Clients</a></li>
                    <li><a href="{{ route('admins.index') }}" class="hover:text-gray-300">Admins</a></li>
                    <li><a href="{{ route('mechanics.index') }}" class="hover:text-gray-300">Mechanics</a></li>
                    <li><a href="{{ route('repairs.index') }}" class="hover:text-gray-300">Repairs</a></li>
                    <li><a href="{{ route('vehicles.index') }}" class="hover:text-gray-300">Vehicles</a></li>
                    <li><a href="{{ route('spareparts.index') }}" class="hover:text-gray-300">SP</a></li>
                    <li><a href="#" class="hover:text-gray-300">About</a></li>
                    <li><a href="#" class="hover:text-gray-300">Services</a></li>
                    <li><a href="#" class="hover:text-gray-300">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Your Website. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
