<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>E-Point Siswa</title>
        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Font Awesome for icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        />
    </head>
    <body class="bg-gray-100 min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Mobile menu button - only visible on small screens -->
                        <div class="flex items-center md:hidden">
                            <button
                                id="mobile-menu-button"
                                type="button"
                                class="text-gray-500 hover:text-gray-700 focus:outline-none"
                            >
                                <i class="fas fa-bars text-2xl"></i>
                            </button>
                        </div>
                        <!-- Logo -->
                        <div
                            class="flex-shrink-0 flex items-center ml-4 sm:ml-0"
                        >
                            <a
                                href="#"
                                class="text-indigo-600 font-bold text-2xl"
                                >E-Point Siswa</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex">
            <!-- Desktop Sidebar - always visible on md screens and up -->
            <div class="hidden md:flex md:w-64 md:flex-col">
                <div
                    class="bg-indigo-700 h-screen sticky top-0 overflow-y-auto"
                >
                    <div class="px-4 pt-5 pb-4">
                        <div class="flex items-center justify-between">
                            <div class="text-white text-2xl font-bold">
                                Dashboard
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-2">
                                <a
                                    href="{{ route('admin.dashboard')}}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-home mr-3"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a
                                    href="{{ route('siswa.index')}}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-user-graduate mr-3"></i>
                                    <span>Data Siswa</span>
                                </a>
                                <a
                                    href="{{ route('akun.index')}}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-user-shield mr-3"></i>
                                    <span>Data Akun</span>
                                </a>
                                <a
                                    href="{{ route('pelanggaran.index') }}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i
                                        class="fas fa-exclamation-triangle mr-3"
                                    ></i>
                                    <span>Data Pelanggaran</span>
                                </a>
                                <a
                                    href="{{ route('pelanggar.index') }}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-list-alt mr-3"></i>
                                    <span>Data Pelanggar</span>
                                </a>
                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>Logout</span>
                                </a>
                                <form
                                    id="logout-form-sidebar"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    class="hidden"
                                >
                                    @csrf
                                </form>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Sidebar - only appears when toggled on small screens -->
            <div
                id="sidebar"
                class="fixed inset-0 z-40 hidden transform ease-in-out duration-300 md:hidden"
            >
                <!-- Background overlay -->
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>

                <!-- Sidebar content -->
                <div
                    class="relative max-w-xs w-full bg-indigo-700 h-full overflow-y-auto"
                >
                    <div class="px-4 pt-5 pb-4">
                        <div class="flex items-center justify-between">
                            <div class="text-white text-2xl font-bold">
                                Dashboard
                            </div>
                            <button id="close-sidebar" class="text-white">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-2">
                                <a
                                    href="{{ route('siswa.index')}}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-user-graduate mr-3"></i>
                                    <span>Data Siswa</span>
                                </a>
                                <a
                                    href="{{ route('akun.index')}}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-user-shield mr-3"></i>
                                    <span>Data Akun</span>
                                </a>
                                <a
                                    href="{{ route('pelanggaran.index') }}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i
                                        class="fas fa-exclamation-triangle mr-3"
                                    ></i>
                                    <span>Data Pelanggaran</span>
                                </a>
                                <a
                                    href="{{ route('pelanggar.index') }}"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-list-alt mr-3"></i>
                                    <span>Data Pelanggar</span>
                                </a>
                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                                    class="flex items-center p-2 rounded-md text-white hover:bg-indigo-600"
                                >
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>Logout</span>
                                </a>
                                <form
                                    id="logout-form-mobile"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    class="hidden"
                                >
                                    @csrf
                                </form>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <main class="py-6 px-4 sm:px-6 lg:px-8">@yield('content')</main>

                <!-- Footer -->
                <footer class="bg-white mt-12 py-6 border-t">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <p class="text-center text-sm text-gray-500">
                            © 2025 E-Point Siswa. All rights reserved.
                        </p>
                    </div>
                </footer>
            </div>
        </div>

        <!-- SweetAlert CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Mobile menu toggle
            const mobileMenuButton =
                document.getElementById("mobile-menu-button");
            const sidebar = document.getElementById("sidebar");
            const closeSidebar = document.getElementById("close-sidebar");

            mobileMenuButton.addEventListener("click", () => {
                sidebar.classList.remove("hidden");
            });

            closeSidebar.addEventListener("click", () => {
                sidebar.classList.add("hidden");
            });

            const userMenuButton = document.getElementById("user-menu-button");
            const userDropdown = document.getElementById("user-dropdown");

            userMenuButton.addEventListener("click", () => {
                userDropdown.classList.toggle("hidden");
            });

            window.addEventListener("click", (event) => {
                if (
                    !userMenuButton.contains(event.target) &&
                    !userDropdown.contains(event.target)
                ) {
                    userDropdown.classList.add("hidden");
                }
            });
        </script>
    </body>
</html>
