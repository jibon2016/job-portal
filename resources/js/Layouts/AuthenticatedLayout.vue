<script setup>
import { Head, Link} from '@inertiajs/vue3';
import MainContent from '@/Components/MainContent.vue'
import Navbar from '@/Components/Navbar.vue'


</script>

<template>
    <Head title="Welcome" />
    <div class=" text-black/90 px-10 ">
        <Navbar />
        <main class="mt-10 max-w-[1080px] m-auto space-y-10">
            <section class="text-center pt-6">
                <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
                <form action="/search" method="GET" class="mt-6">
                    <input type="text" name="q" placeholder="Web Developer.." class="rounded-xl bg-white px-5 py-4 w-full max-w-xl">
                </form>
            </section>
            <slot/>
        </main>
    </div>
</template>
