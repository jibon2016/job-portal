<script setup>
import JobCard from '@/Components/JobCard.vue'
import SectionHeading from '@/Components/SectionHeading.vue'

defineProps({
    jobs: {
        type: Object,
        required: true,
    },
    featuredJobs: {
        type: Object,
        required: true,
    }
})

</script>

<template>
    <main class="mt-10 max-w-[1080px] m-auto space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
            <form action="" class="mt-6">
                <input type="text" placeholder="Web Developer.." class="rounded-xl bg-white px-5 py-4 w-full max-w-xl">
            </form>
        </section>
        <div class="flex mt-10">
            <section class="basis-1/2">
                <SectionHeading>Top Jobs</SectionHeading>
                <JobCard v-for="job in jobs " :key="job.id" :job="job"/>
            </section>
            <section class="basis-1/2">
                <SectionHeading>New Jobs</SectionHeading>
                <JobCard v-for="job in featuredJobs " :key="job.id" :job="job"/>
            </section>
        </div>
    </main>
</template>
