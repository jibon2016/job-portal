<script setup>
// import logo from '/resources/images/logo.png';
function getImageUrl(name) {
    return new URL(`/resources/images/${name}`, import.meta.url).href
}
const logo = getImageUrl("logo.png");
</script>

<template>
    <a href="">
        <img class="h-[30px] " :src="logo" alt="Logo">
    </a>
</template>
