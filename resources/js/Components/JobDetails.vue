<script setup>
defineProps({
    job: {
        type: Object,
        required: true,
    },
    search:{
        type: String,
    }
})
</script>
<template>
    <div v-if="job" class="p-5 w-full border m-3 border-gray-400 rounded">
        <h2 class="mt-2 text-xl text-black">{{ job.job_title }}</h2>
        <h5 class="mt-2 underline text-md text-gray-700 underline-offset-2">{{ job.company_name }}</h5>
        <p class="mt-1 text-md text-gray-700 ">{{ job.location }} - {{ job.employment_type }}</p>
        <p class="mt-1 text-md text-gray-700 ">{{ job.salary_min }}</p>
        <div class="">
            <button class="bg-blue-500 rounded-md px-3 py-2 mt-3 text-white font-bold">Apply now</button>
        </div>
        <div class="overflow-y-scroll">
            <div v-if="job.summary" class="mt-5" >
                <span class="text-lg text-gray-800">Summary</span>
                <p class="text-sm text-gray-600" v-html="job.summary"></p>
            </div>
            <div v-if="job.description" class="mt-5" >
                <span class="text-lg text-gray-800">Description</span>
                <p class="text-sm text-gray-600" v-html="job.description"></p>
            </div>
            <div v-if="job.requirement" class="mt-5" >
                <span class="text-lg text-gray-800">Requirements</span>
                <p class="text-sm text-gray-600" v-html="job.requirement"></p>
            </div>
        </div>
    </div>
    <div v-else class="p-5 w-full border m-3 border-gray-400 rounded">
        <p>Not Found Something in <b>"{{ search }}"</b></p>
    </div>
</template>