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
    <div class=" bg-gray-500/10 p-4 m-2 rounded-md border border-gray-400 hover:bg-gray-700/20 mt-3 hover:border-blue-800 group">
        <div class="flex md:flex-row flex-col justify-between">
            <div class="basis-1/2 pb-2 md:pb-0">
                <a href="#" @click="storeData(job)"><h3 class="font-bold pb-1 underline group-hover:text-blue-800 transition-colors duration-900"><i class="fa text-[14px] fa-briefcase mr-[6px]"></i>{{ job.job_title }} </h3></a>
                <div class="text-sm pr-2 space-y-1 md:pr-0 md:mt-1 mt-0">
                    <div class="flex items-center text-gray-800 font-semibold "><i class="text-[14px] fa fa-building mr-2"></i>{{ job.company_name }}</div>
                    <div class="flex items-center text-sm font-semibold"><i class="text-[15px] fa fa-map-marker mr-3" ></i>{{ job.location }}</div>
                    <div class="flex items-center text-sm font-semibold"><i class="text-[13px] fa fa-list mr-2"></i>{{ job.employment_type }}</div>
                </div>
            </div>
            <div class="basis-1/2 text-sm">
                <div class="flex justify-center px-2 mb-3">
                    <img class="w-[80px] h-[80px]" :src="logo" alt="">
                </div>
            </div>
        </div>
        <div class=" flex-auto border-t border-gray-300 mt-2 pt-2">
            <p class="text-justify text-xs tracking-widest" v-text="job.summary.replace(/(<([^>]+)>)/ig, '').substring(0, 100)"></p>
        </div>
    </div>
    
</template>
