<script setup>
import { Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import JobCardMini from '@/Components/JobCardMini.vue'
import JobDetails from '@/Components/JobDetails.vue'
import SectionHeading from '@/Components/SectionHeading.vue'


defineProps({
    jobs: {
        type: Object,
        required: true,
    },
    search:{
        type: String,
        required: true,
    }
})

</script>

<template>
    <Head title="Search" />
    <AuthenticatedLayout :search="search">
        <div class="flex mt-10">
            <section class="basis-1/3">
                <SectionHeading>Search Jobs</SectionHeading>
                <JobCardMini v-for="job in jobs " :key="job.id" :job="job"/>
            </section>
            <section class="basis-2/3">
                <SectionHeading>Finding Result</SectionHeading>
                <JobDetails :job="jobs[0]" :search="search"/>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
