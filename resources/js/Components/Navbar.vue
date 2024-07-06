<script setup>
import { ref, computed } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { reactive } from 'vue';
import { usePage } from '@inertiajs/vue3';

const menuBar = ref(false);

const toggleButton = () => {
    menuBar.value = ! menuBar.value;
}
const user = reactive({});

const isLogin = computed(() => {
    if(usePage().props.auth.user){
        user.value = usePage().props.auth.user
        return true;
    }
    return false;
})
</script>
<template>
    <nav class="flex justify-between items-center border-b-2 border-white/50 py-4 " :class="{'mb-48' : menuBar}">
            <div>
                <ApplicationLogo />
            </div>
            <span class="material-symbols-outlined md:hidden block mt-4 cursor-pointer"
                @click="toggleButton"
                >menu</span>
            <div v-if="menuBar" class="md:hidden absolute flex flex-col items-center top-20 w-[90%] text-lg ">
                <a class="bg-kore text-white py-2 px-3 rounded-md" href="https://koresearch.net/public">Back to Main</a>
                <a class="hover:text-blue-800" href="">Jobs</a>
                <a class="hover:text-blue-800" href="">Careers</a>
                <a class="hover:text-blue-800" href="">Companies</a>
                <a class="hover:text-blue-800" href="/login">Login</a>
                <a class="hover:text-blue-800" href="/jobs/create">Post a Job</a>
            </div>
            <div class="space-x-6 font-bold md:block hidden">
                <a class="bg-kore text-white p-2 rounded-md" href="https://koresearch.net/public">Back to Courses</a>
                <a class="hover:text-blue-800" href="">Jobs</a>
                <a class="hover:text-blue-800" href="">Careers</a>
                <a class="hover:text-blue-800" href="">Companies</a>
            </div>
            <div class="space-x-4 md:block hidden text-kore">
                <a class="hover:text-gray-500 cursor-pointer font-semibold" href="/login">{{ isLogin ? user.value.fname : 'Login'}}</a>
                <a class="hover:text-gray-500 cursor-pointer" href="/jobs/create">Post a Job</a>
            </div>
        </nav>
</template>
