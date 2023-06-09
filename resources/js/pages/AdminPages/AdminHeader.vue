<template>
    <header class="bg-white flex justify-between items-center border-b border-gray-300">
        <div class="flex justify-between items-center">
            <span class="text-xl font-semibold text-gray-600">
                Uchquduq24
            </span>
            <router-link :to="{name: 'main'}" class="ml-5 inline-flex items-center text-gray-600">
                Saytga o'tish <i class="fa-light fa-sidebar-flip ml-3 text-teal-600"></i>
            </router-link>
        </div>
        <div>
            <button @click="$emit('addPost')" class="text-xl ml-1 inline-flex items-center text-teal-600 h-12 px-6 border-b border-teal-600 bg-gray-50 hover:bg-gray-100 active:bg-white" >
                <i class="fa-light fa-plus"></i>
            </button>

            <button @click="authStore.logout" class="text-xl ml-8 inline-flex items-center text-teal-600 h-12 px-6 border-b border-teal-600 ">
                <i class="fa-light fa-right-from-bracket"></i>
            </button>
        </div>
    </header>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/store/useAuthStore';
const authStore = useAuthStore()
</script>