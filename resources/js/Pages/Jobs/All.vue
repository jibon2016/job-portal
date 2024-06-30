<script setup>
import BackendLayout from '@/Layouts/BackendLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';


defineProps({
    jobs: {
        type: Object,
        required: true,
    },
})

const handleClick = (job) => {
    router.get('/jobs/' + job.id + "/edit");
}

</script>
<template>
    <Head title="All Jobs" />

    <BackendLayout>
        <template #header >
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Jobs</h2>
                <Link class="bg-kore text-gray-100 py-2 px-3 rounded-md" :href="route('jobs.create')">Create New Job</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead class="bg-gray-500 text-white font-semibold">
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Job Title
                            </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Publish Date
                            </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Deadline
                            </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Action</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="job in jobs" :key="job.id">
                            <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ job.job_title }}
                            </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ new Date(job.created_at).toDateString() }}
                            </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                               {{ new Date(job.deadline).toDateString() }}
                            </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                            <Link @click="handleClick(job)" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                Edit
                            </Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>


                </div>
            </div>
        </div>
    </BackendLayout>
</template>
