<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['İşlər' => route('jobs.index')]" />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Axtar</div>
                    <x-text-input name="search" value="{{ request('search') }}"
                                  placeholder="İstənilən mətni axtarın" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Əmək Haqqı</div>

                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="Min" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="Maks" />
                    </div>
                </div>
                <div>3</div>
                <div>4</div>
            </div>

            <button class="w-full">Tətbiq et</button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Ətraflı Baxış
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
