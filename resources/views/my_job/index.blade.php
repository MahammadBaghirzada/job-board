<x-layout>
    <x-breadcrumbs :links="['Mənim İşlərim' => '#']" class="mb-4" />

    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">Yeni İş</x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>
                                {{ $application->created_at->diffForHumans() }} müraciət edilib
                            </div>
                            <div>
                                CV yükləyin
                            </div>
                        </div>

                        <div>{{ number_format($application->expected_salary) }} AZN</div>
                    </div>
                @empty
                    <div>Müraciət yoxdur</div>
                @endforelse
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                İş yoxdur
            </div>
            <div class="text-center">
                İlk işinizi <a class="text-indigo-500 hover:underline"
                               href="{{ route('my-jobs.create') }}">burada </a>yerləşdirin!
            </div>
        </div>
    @endforelse
</x-layout>
