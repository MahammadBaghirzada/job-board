<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['İşlər' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>

        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Müraciət edin
            </x-link-button>
        @else
            @auth
                <div class="text-center text-sm font-medium text-slate-500">
                    Siz artıq bu işə müraciət etmisiniz
                </div>
            @else
                <div class="text-center text-sm font-medium text-slate-500">
                    Müraciət üçün <a class="text-indigo-500 hover:underline" href="{{ route('login') }}">daxil olun</a>
                </div>
            @endauth
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            {{ $job->employer->company_name }} &rarr; Digər iş elanları
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        {{ number_format($otherJob->salary) }} AZN
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
