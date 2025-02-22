<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section
        class="w-screen h-screen bg-gradient-to-tr from-purple-900 to-blue-900 flex flex-col justify-center items-center gap-4 font-[figtree]">
        <div>
            <h1 class="text-3xl font-bold font-[figtree] px-6 py-2 text-white rounded-xl">BrandName</h1>
        </div>

        <div class="px-16 py-10 bg-white rounded-2xl flex flex-col gap-4">
            <div class="flex flex-col justify-center items-center text-center">
                <h1 class="font-extrabold font-serif text-2xl text-black">Buat Akun Kamu</h1>
                <p class="text-base font-medium text-gray-800">Kami Berharap Kamu Join dan Daftar Akun.</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-lg font-bold text-gray-900 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-auto md:w-96 px-4 py-2 bg-transparent border border-gray-400 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="your@email.com" />
                </div>
                <div>
                    <label class="block text-lg font-bold text-gray-900 mb-1">Username</label>
                    <input type="text" name="name"
                        class="w-auto md:w-96 px-4 py-2 bg-transparent border border-gray-400 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="username" />
                </div>
                <div>
                    <label class="block text-lg font-bold text-gray-900 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-auto md:w-96 px-4 py-2 bg-transparent border border-gray-400 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="********" />
                </div>
                <div>
                    <label class="block text-lg font-bold text-gray-900 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-auto md:w-96 px-4 py-2 bg-transparent border border-gray-400 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="********" />
                </div>

                <button type='submit'
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
                    Daftar
                </button>

                @if (session('success'))
                    <div class="text-xl font-semibold text-center text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <p class="text-base text-center font-semibold text-gray-700 pt-4">Sudah Punya Akun? <a
                        href="{{ route('login') }}" class="text-blue-800">Masuk</a></p>
            </form>
        </div>

    </section>
</body>

</html>
