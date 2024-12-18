<nav x-data="{ isOpen: false, mobileMenuOpen: false, searchOpen: false }" class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://cdn.discordapp.com/attachments/1272806920884981812/1319065761066651688/PyramidLogozzznobg.png?ex=67649b38&is=676349b8&hm=500b9edf41db77704ee90c71556899ed5d07a8769ee7b8a4be0ecba89096199e&"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Navigation Links -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Search Icon -->
                    <div class="relative">
                        <button @click="searchOpen = !searchOpen"
                            class="relative inline-flex items-center justify-center rounded-full bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-expanded="false">
                            <span class="sr-only">Open search</span>
                            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 19a8 8 0 100-16 8 8 0 000 16zm6.5-6.5L21 21" />
                            </svg>
                        </button>
                        <!-- Search Dropdown -->
                        <div x-show="searchOpen" @click.outside="searchOpen = false"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-80 origin-top-right rounded-md bg-white py-4 shadow-lg ring-1 ring-black/5 focus:outline-none"
                            role="menu" aria-orientation="vertical" tabindex="-1">
                            <form method="GET" action="/search" class="px-4">
                                <input type="text" name="query" placeholder="Search categories, users, posts..."
                                    class="w-full rounded-lg border-gray-300 bg-gray-100 px-3 py-2 text-sm text-gray-800 focus:border-indigo-500 focus:ring-indigo-500"
                                    autocomplete="off" required>
                                <button type="submit"
                                    class="mt-2 w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Profile Dropdown or Login Button -->
                    @auth
                    <div class="relative ml-3">
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="sr-only">Open user menu</span>
                            <img class="size-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem">My Page</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 w-full text-left">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                    @endauth

                    @guest
                    <x-nav-link href="{{ route('login.form') }}" :active="request()->is('login')">Login</x-nav-link>
                    @endguest
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" class="block size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" class="hidden size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
