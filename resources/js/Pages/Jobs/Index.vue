<script setup>
import { Head, Link } from '@inertiajs/vue3';
import logo from '/resources/images/logo.png';
import MainContent from '@/Components/MainContent.vue'

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
    <div class=" text-black/90 dark:bg-black dark:text-white/50 px-10 ">
        <nav class="flex justify-between items-center border-b-2 border-white/50 py-4">
            <div>
                <a href="">
                    <img class="h-[30px] " :src="logo" alt="Logo">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Companies</a>
            </div>
            <div class="space-x-3">
                <a href="">Login/Register</a>
                <a href="">Post a Job</a>
            </div>
        </nav>

        <MainContent :jobs="jobs" :featuredJobs="featured_jobs" ></MainContent>
    </div>
</template>
