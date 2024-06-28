<script setup>
import { Head, Link} from '@inertiajs/vue3';
import MainContent from '@/Components/MainContent.vue'
import Navbar from '@/Components/Navbar.vue'

defineProps({
    jobs: {
        type: Object,
        required: true,
    },
    featured_jobs: {
        type: Object,
        required: true,
    }
})

</script>

<template>
    <Head title="Welcome" />
    <div class=" text-black/90 px-10 ">
        <Navbar />
        <MainContent :class="menuBar ? 'mt-30': '' " :jobs="jobs" :featuredJobs="featured_jobs" ></MainContent>
    </div>
</template>
