<template>
	<section :class="{ '!pb-0': $route.meta.adminPage }" class="container mx-auto pb-10 px-10">
		<Header v-if="$route.meta.adminPage == null" />
		<Router-view></Router-view>
	</section>
	<Footer v-if="$route.meta.adminPage == null" />
</template>

<script setup lang="ts">
import Header from './Header.vue'
import Footer from './Footer.vue'
</script>
<style>
.skeleton {
	background-image: linear-gradient(90deg, #ffffff00, #ffffff6e, #ffffff00);
	background-size: 40px 100%;
	background-repeat: no-repeat;
	background-position: left -40px top 0;
	animation: shine 1s ease infinite;
}

@keyframes shine {
	to {
		background-position: right -40px top 0;
	}
}

.fade-enter {
	opacity: 0;
}

.fade-enter-active {
	transition: opacity .5s;
}

.fade-leave-active {
	transition: opacity .5s;
	opacity: 0;
}</style>