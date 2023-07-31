<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['İşlər' => route('jobs.index')]" />

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
