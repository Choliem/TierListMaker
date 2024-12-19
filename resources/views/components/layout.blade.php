<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title ?? 'Default Dashboard' }}</title>

    <style>


        /* Full background image with blur effect */
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('your-image-url.jpg'); /* Replace with your image */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(8px);
            z-index: -1; /* Keep the background behind the content */
        }

        /* Content container to ensure the content is readable */
        .content {
            position: relative;
            z-index: 1;
        }

        /* Smooth scroll for the entire page */
        .scrollable {
            overflow-y: auto;
            height: 100vh;
        }

        /* Stylish header */
        header {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .header-text {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .header-text:hover {
            transform: scale(1.05);
        }

        /* Footer in front of the post content */
        footer {
            text-align: center;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 1rem;
            position: fixed;
            width: 100%;
            bottom: 0;
            z-index: 10; /* Ensure it appears above the post content */
        }
    </style>
</head>

<body class="h-full scrollable">
    <!-- Background image with blur effect -->
    <div class="background-image"></div>

    <div class="min-h-full relative">

        <!-- Navbar -->
        <x-navbar></x-navbar>

        <!-- Header Section -->
        <header class="mb-6">
            <h1 class="header-text">{{ $title ?? 'Default Title' }}</h1>
        </header>

        <!-- Main Content -->
        <main class="relative">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 content">
                @yield('content') <!-- This will render the content passed from the view -->
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Your Website. All rights reserved.</p>
        </footer>

    </div>

    <!-- Modal Example -->
    <div class="modal" id="exampleModal">
        <h2>Modal Title</h2>
        <p>This is an interactive modal. You can close it by clicking outside or the close button.</p>
        <button onclick="document.getElementById('exampleModal').classList.remove('show')">Close</button>
    </div>

    <script>
        // Example function to show modal
        function showModal() {
            document.getElementById('exampleModal').classList.add('show');
        }

        // Example button that triggers the modal
        document.getElementById('showModalButton').addEventListener('click', showModal);
    </script>
</body>

</html>
