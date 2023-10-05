<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['İş Müraciətlərim' => '#']" />

    @forelse($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        {{ $application->created_at->diffForHumans() }} müraciət olunub
                    </div>
                    <div>
                        Digər {{ Str::plural('istifadəçilər:', $application->job->job_applications_count - 1) }}
                        {{ $application->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        İstədiyiniz maaş {{number_format($application->expected_salary)}} AZN-dir
                    </div>
                    <div>
                        Ortalama əmək haqqı {{ number_format($application->job->job_applications_avg_expected_salary) }} AZN-dir
                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Ləğv Et</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                İş müraciəti mövcud deyil
            </div>
            <div class="text-center">
                İş müraciəti üçün
                <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">axtarın</a>
            </div>
        </div>
    @endforelse
</x-layout>
