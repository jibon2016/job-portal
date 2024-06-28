<script setup>
// import logo from '/resources/images/logo.png';
const logo = getImageUrl("logo.png");
</script>

<template>
    <a href="">
        <img class="h-[30px] " :src="logo" alt="Logo">
    </a>
</template>
