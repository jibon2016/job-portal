<script setup>

    const randomNumber = Math.random(1, 100000);
    const imageLInk = `https://picsum.photos/seed/${randomNumber}/100/100`;

    const props = defineProps({
        job: {
            type: Object,
            required: true,
        },
        active:{
            type: Boolean,
            default: false,
        }
    })

    
    function getImageUrl(name) {
        return new URL(`/public/storage/${name}`, import.meta.url + '/public/').href
    }
    const logo = getImageUrl(props.job.company_image);


    const storeData = (job) => {
        localStorage.setItem('job', JSON.stringify(job))
        location.reload()
    };

</script>
<template>
    <div class="flex md:flex-row flex-col justify-between bg-gray-500/10 p-4 m-2 rounded-md border  hover:bg-gray-700/20 mt-3 hover:border-blue-800 group" :class="active ? 'border-blue-600': 'border-gray-400'">
        <div class="basis-2/3 pb-2 md:pb-0">
            <a href="#" @click="storeData(job)"><h3 class="font-bold pb-1 underline group-hover:text-blue-800 transition-colors duration-900">{{ job.job_title }}</h3></a>
            <div class="text-sm font-semibold pr-2 md:pr-0">
                <div class="flex items-center text-gray-800 font-semibold "><i class="text-[14px] fa fa-building mr-2"></i>{{ job.company_name }}</div>
                    <div class="flex items-center text-sm font-semibold"><i class="text-[15px] fa fa-map-marker mr-3" ></i>{{ job.location }}</div>
                    <div class="flex items-center text-sm font-semibold"><i class="text-[13px] fa fa-list mr-2"></i>{{ job.employment_type }}</div>
            </div>
        </div>
        <div class="basis-1/3 px-2 mb-3">
            <img class="w-[140px] h-[100px]" :src="logo" alt="">
        </div>
    </div>
</template>
