<script setup>
import { reactive, watch } from 'vue';

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


</script>
<template>
    <div v-if="TempJob.value" class="p-5 w-full border m-3 border-gray-400 rounded">
        <div class="flex">
            <div class="basis-[70%]">
                <h2 class="mt-2 text-xl text-black">{{ TempJob.value.job_title }}</h2>
                <h5 class="mt-2 underline text-md text-gray-700 underline-offset-2">{{ TempJob.value.company_name }}</h5>
                <p class="mt-1 text-md text-gray-700 ">{{ TempJob.value.location }} - {{ TempJob.value.employment_type }}</p>
                <p class="mt-1 text-md text-gray-700 ">{{ TempJob.value.salary }}</p>
                <p class="mt-1 text-md text-gray-700 ">Experience: {{ TempJob.value.experience   }} Year</p>
            </div>
            <div class="basis-[30%]">
                <img class="w-[140px] h-[100px]" :src="logo" alt="">
            </div>
        </div>
        <div class="">
            <button class="bg-kore rounded-md px-3 py-2 mt-3 text-white font-bold">Apply now</button>
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
