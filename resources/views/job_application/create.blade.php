<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="[
        'İşlər' => route('jobs.index'),
        $job->title => route('jobs.show', $job),
        'Müraciət edin' => '#',
    ]" />

    <x-job-card :$job />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            İş Müraciətiniz
        </h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Gözlənilən Maaş</x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>

            <div class="mb-4">
                <x-label for="cv" :required="true">CV yükləyin</x-label>
                <x-text-input type="file" name="cv" />
            </div>

            <x-button class="w-full">Müraciət edin</x-button>
        </form>
    </x-card>
</x-layout>
