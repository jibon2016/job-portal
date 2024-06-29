<script setup>
import { Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import JobCard from '@/Components/JobCard.vue'
import SectionHeading from '@/Components/SectionHeading.vue'


defineProps({
    jobs: {
        type: Object,
        required: true,
    },
    featured_jobs: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <Head title="Welcome" />
    <AuthenticatedLayout>
        <div class="flex mt-10">
            <section class="basis-1/2">
                <SectionHeading>Top Jobs</SectionHeading>
                <JobCard v-for="job in jobs " :key="job.id" :job="job"/>
            </section>
            <section class="basis-1/2">
                <SectionHeading>New Jobs</SectionHeading>
                <JobCard v-for="job in featured_jobs " :key="job.id" :job="job" />
            </section>
        </div>
    </AuthenticatedLayout>
</template>
