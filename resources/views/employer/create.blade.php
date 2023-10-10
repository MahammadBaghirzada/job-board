<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">Şirkət Adı</x-label>
                <x-text-input name="company_name" />
            </div>

            <x-button class="w-full">Yadda saxla</x-button>
        </form>
    </x-card>
</x-layout>
