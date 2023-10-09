<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-sky-600">
        Hesabınıza daxil olun
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input type="email" name="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" :required="true">Şifrə</x-label>
                <x-text-input type="password" name="password" />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" name="remember" id="remember"
                               class="rounded-sm border border-slate-400">
                        <label for="remember">Məni xatırla</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Şifrəni unutmusuz?
                    </a>
                </div>
            </div>

            <x-button class="w-full bg-gray-50">Daxil Ol</x-button>
        </form>
    </x-card>
</x-layout>
