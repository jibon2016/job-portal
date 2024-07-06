<script setup>
import { useForm } from '@inertiajs/vue3';
    const randomNumber = Math.random(1, 100000);
    const imageLInk = `https://picsum.photos/seed/${randomNumber}/100/100`;

    const props = defineProps({
        job: {
            type: Object,
            required: true,
        },
    });

    function getImageUrl(name) {
        return new URL(`/public/storage/${name}`, import.meta.url + '/public/').href;
    };
    const logo = getImageUrl(props.job.company_image);

    const storeData = (job) => {
        localStorage.setItem('job', JSON.stringify(job));
        let from = useForm({
            job: job,
        })
        from.get('/search')
    };

</script>
<template>
    <div class="flex md:flex-row flex-col justify-between bg-gray-500/10 p-4 m-2 rounded-md border border-gray-400 hover:bg-gray-700/20 mt-3 hover:border-blue-800 group">
        <div class="basis-1/2 pb-2 md:pb-0">
            <a href="#" @click="storeData(job)"><h3 class="font-bold pb-1 underline group-hover:text-blue-800 transition-colors duration-900">{{ job.job_title }} </h3></a>
            <div class="text-sm pr-2 space-y-2 md:pr-0 md:mt-2 mt-0">
                <div class="flex items-center text-gray-800 font-semibold "><span class="material-symbols-outlined mr-1 text-md">apartment</span>{{ job.company_name }}</div>
                <div class="flex items-center text-sm font-semibold"><span class="material-symbols-outlined  mr-1 text-md">checklist</span>{{ job.employment_type }} - {{  job.salary }}</div>
                <div class="flex items-center text-sm font-semibold"><span class="material-symbols-outlined mr-1 text-md">location_on</span> {{ job.location }}</div>
            </div>
        </div>
        <div class="basis-1/2 text-sm">
            <div class=" px-2 mb-3">
                <img class="w-[60px] h-[60px]" :src="logo" alt="">
            </div>
            <h4 class="pb-1">Job Description:</h4>
            <p class="text-justify text-xs " v-text="job.summary.replace(/(<([^>]+)>)/ig, '').substring(0, 100)"></p>
        </div>
    </div>
</template>
