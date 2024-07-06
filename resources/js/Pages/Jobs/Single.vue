<script setup>
import { Head, Link} from '@inertiajs/vue3';
import { reactive, watch } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import JobCardMini from '@/Components/JobCardMini.vue'
import JobDetails from '@/Components/JobDetails.vue'
import SectionHeading from '@/Components/SectionHeading.vue'



const props = defineProps({
    job: {
        type: Object,
        required: true,
    },
    search:{
        type: String,
        default: '',
    },
})

const job = reactive({});
if (localStorage.getItem('job')) {
    if (props.jobs.length > 0) {
        job.value = JSON.parse(localStorage.getItem('job'));
    }else{
        localStorage.removeItem('job')
    }
} else{
    job.value = props.job;
}


</script>

<template>
    <Head :title="job.title" />
    <AuthenticatedLayout :search="search">
        <div class="flex mt-10 space-x-2">
            <section class="basis-1/3 overflow-y-scroll max-h-screen pr-2">
                <SectionHeading>Search Jobs</SectionHeading>
                <JobCardMini  :job="props.job"/>
            </section>
            <section class="basis-2/3">
                <SectionHeading>Finding Result</SectionHeading>
                <JobDetails :job="job.value" :search="search"/>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
