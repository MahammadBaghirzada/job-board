<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['İşlər' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job />
</x-layout>
