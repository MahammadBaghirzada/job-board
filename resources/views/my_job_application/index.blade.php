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
                <div></div>
            </div>
        </x-job-card>
    @empty
    @endforelse
</x-layout>
