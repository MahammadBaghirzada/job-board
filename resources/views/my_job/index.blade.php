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

                @if($job->deleted_at)
                    <span class="text-xs text-red-500">Silinib</span>
                @else
                    <div class="flex space-x-2">
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Redaktə Et</x-link-button>

                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Sil</x-button>
                        </form>
                    </div>
                @endif
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
