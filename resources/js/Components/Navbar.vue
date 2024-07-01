<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const menuBar = ref(false);

const toggleButton = () => {
    menuBar.value = ! menuBar.value;
}
</script>
<template>
    <nav class="flex justify-between items-center border-b-2 border-white/50 py-4 " :class="{'mb-32' : menuBar}">
            <div>
                <ApplicationLogo />
            </div>
            <span class="material-symbols-outlined md:hidden block mt-4 cursor-pointer"
                @click="toggleButton"
                >menu</span>
            <div v-if="menuBar" class="md:hidden absolute flex flex-col items-center top-20 w-[90%] text-lg ">
                <a class="hover:text-blue-800" href="">Jobs</a>
                <a class="hover:text-blue-800" href="">Careers</a>
                <a class="hover:text-blue-800" href="">Companies</a>
                <a class="hover:text-blue-800" href="/register">Signup</a>
                <a class="hover:text-blue-800" href="/login">Post a Job</a>
            </div>
            <div class="space-x-6 font-bold md:block hidden">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Companies</a>
            </div>
            <div class="space-x-4 md:block hidden text-kore">
                <a class="hover:text-gray-500 cursor-pointer" href="/register">Signup</a>
                <a class="hover:text-gray-500 cursor-pointer" href="/login">Post a Job</a>
            </div>
        </nav>
</template>
