<template>
    <section>
        <main v-if="posts == null" class="flex">
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-200"></div>
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-50"></div>
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-50"></div>
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-50"></div>
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-50"></div>
            <div class="w-12 h-[38px] inline-blockmr-1.5 mr-1.5 border skeleton bg-gray-200"></div>
        </main>
        <main v-else>
            <router-link :to="{name: 'posts', params: {id: posts.current_page - 1}}" class="w-12 inline-block text-center bg-teal-600 text-white py-1.5 hover:bg-teal-500 active:bg-teal-700 mr-1.5 border border-teal-500">
                <i class="fa-light fa-chevron-left"></i>
            </router-link>
            <router-link v-if="posts.current_page > 2" :to="{name: 'posts', params: {id: 1}}" class="w-12 inline-block text-center py-1.5 mr-1.5 hover:border-teal-500 hover:text-teal-600 active:border-teal-700 border">
                1
            </router-link>
            <button v-if="posts.current_page > 3" class="w-12 inline-block text-center py-1.5 mr-1.5 outline-none border">
                ...
            </button>
    
    
            <router-link v-if="posts.current_page > 1" :to="{name: 'posts', params: {id: posts.current_page - 1}}" class="w-12 inline-block text-center py-1.5 mr-1.5 hover:border-teal-500 hover:text-teal-600 active:border-teal-700 border">
                {{ posts.current_page - 1 }}
            </router-link>
    
            <router-link :to="{name: 'posts', params: {id: posts.current_page}}" class="w-12 inline-block text-center text-teal-500 border-teal-500 py-1.5 mr-1.5 hover:border-teal-500 hover:text-teal-600 active:border-teal-700 border">
                {{ posts.current_page }}
            </router-link>
    
            <router-link v-if="posts.current_page != posts.last_page" :to="{name: 'posts', params: {id: posts.current_page + 1}}" class="w-12 inline-block text-center py-1.5 mr-1.5 hover:border-teal-500 hover:text-teal-600 active:border-teal-700 border">
                {{ posts.current_page + 1 }}
            </router-link>
    
    
            <button v-if="posts.current_page < posts.last_page - 2" class="w-12 inline-block text-center py-1.5 mr-1.5 outline-none border">
                ...
            </button>
            <router-link v-if="posts.current_page < posts.last_page - 1" :to="{name: 'posts', params: {id: posts.last_page}}" class="w-12 inline-block text-center py-1.5 mr-1.5 hover:border-teal-500 hover:text-teal-600 active:border-teal-700 border">
                {{ posts.last_page }}
            </router-link>
            <router-link :to="{name: 'posts', params: {id: posts.current_page + 1}}" class="w-12 inline-block text-center bg-teal-600 text-white py-1.5 hover:bg-teal-500 active:bg-teal-700 mr-1.5 border border-teal-500">
                <i class="fa-light fa-chevron-right"></i>
            </router-link>
        </main>
    </section>
</template>

<script setup lang="ts">
const { posts } = defineProps(['posts'])
</script>