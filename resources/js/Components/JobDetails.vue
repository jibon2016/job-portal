<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { reactive, computed } from 'vue';

const props = defineProps({
    job: {
        type: Object,
        required: true,
    },
    search:{
        type: String,
    }
})

const TempJob = reactive({});
if (localStorage.getItem('job')) {
    TempJob.value = JSON.parse(localStorage.getItem('job'));
} else{
    TempJob.value = props.job;
}

function getImageUrl(name) {
        return new URL(`/public/storage/${name}`, import.meta.url + '/public/').href
    }
    
    const logo = getImageUrl(TempJob.value.company_image);



const isLogin = computed(() => {
    if(usePage().props.auth.user){
        return true;
    }
    return false;
})

const handleApply = () => {
    if (isLogin) {
        router.get('https://koresearch.net/public/' + usePage().props.auth.user.id + '/' + TempJob.value.id );
    }
}


</script>
<template>
    <div v-if="TempJob.value" class="p-5 w-full border m-3 border-gray-400 rounded">
        <div class="flex">
            <div class="basis-[70%] space-y-2">
                <h2 class="mt-2 text-xl text-black">{{ TempJob.value.job_title }}</h2>
                <h5 class="flex items-center mt-2 text-md text-gray-700 underline-offset-2"><span class="material-symbols-outlined mr-2 text-md">apartment</span><span class="underline">{{ TempJob.value.company_name }}</span></h5>
                <p class="flex items-center mt-1 text-md text-gray-700 "><span class="material-symbols-outlined mr-2 text-md">location_on</span>{{ TempJob.value.location }} </p>
                <p class="flex items-center mt-1 text-md text-gray-700 "><span class="material-symbols-outlined  mr-2 text-md">checklist</span>{{ TempJob.value.employment_type }} - {{ TempJob.value.salary }}</p>
                <p class="flex items-center mt-1 text-md text-gray-700 "><span class="material-symbols-outlined mr-2">school</span> {{ TempJob.value.experience   }}</p>
            </div>
            <div class="basis-[30%]">
                <img class="w-[140px] h-[100px]" :src="logo" alt="">
            </div>
        </div>
        <div class="mt-5">
            <a @click="handleApply" class="bg-kore rounded-md cursor-pointer px-3 py-2 mt-3 text-white font-bold">{{ isLogin ? 'Apply Now' : 'login' }}</a>
        </div>
        <div class="overflow-y-scroll h-[400px] mt-5">
            <div v-if="TempJob.value.summary" class="mt-5" >
                <span class="text-lg text-gray-800">Summary</span>
                <p class="text-sm text-gray-600" v-html="TempJob.value.summary"></p>
            </div>
            <div v-if="TempJob.value.description" class="mt-5" >
                <span class="text-lg text-gray-800">Description</span>
                <p class="text-sm text-gray-600" v-html="TempJob.value.description"></p>
            </div>
            <div v-if="TempJob.value.requirement" class="mt-5" >
                <span class="text-lg text-gray-800">Requirements</span>
                <p class="text-sm text-gray-600" v-html="TempJob.value.requirement"></p>
            </div>
        </div>
    </div>
    <div v-else class="p-5 w-full border m-3 border-gray-400 rounded">
        <p>Not Found Something in <b>"{{ search }}"</b></p>
    </div>
</template>
