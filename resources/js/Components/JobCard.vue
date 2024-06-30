<script setup>
import { useForm } from '@inertiajs/vue3';
    const randomNumber = Math.random(1, 100000);
    const imageLInk = `https://picsum.photos/seed/${randomNumber}/100/100`;

    defineProps({
        job: {
            type: Object,
            required: true,
        },
    })



    const storeData = (job) => {
        localStorage.setItem('job', JSON.stringify(job))
        let from = useForm({
            job: job,
        })
        from.get('/search')
    };

</script>
<template>
    <div class="flex md:flex-row flex-col justify-between bg-gray-500/10 p-4 m-2 rounded-md border border-gray-400 hover:bg-gray-700/20 mt-3 hover:border-blue-800 group">
        <div class="basis-0.5/3 px-2 mb-3">
            <img class="w-[140px] h-[100px]" :src="imageLInk" alt="">
        </div>
        <div class="basis-1/3 pb-2 md:pb-0">
            <a href="#" @click="storeData(job)"><h3 class="font-bold pb-1 underline group-hover:text-blue-800 transition-colors duration-900">{{ job.job_title }}</h3></a>
            <div class="text-sm pr-2 md:pr-0">
                <div class="text-gray-800 ">{{ job.company_name }}</div>
                <div class="text-xs">Location: {{  job.location }}</div>
                <p class="text-xs">{{ job.employment_type }} - {{  job.salary }}</p>
            </div>
        </div>
        <div class="basis-1/3 text-sm">
            <h4 class="pb-1">Job Description:</h4>
            <p class="text-justify text-xs ">{{ job.summary }}...</p>
        </div>
    </div>
</template>
