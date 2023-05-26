<template>
    <section>
        <main v-if="post == null" class="flex">
            <div class="w-16 h-16 rounded mr-2 bg-gray-200 skeleton"></div>
            <div class="flex-grow relative">
                <main class="absolute top-0 left-0 w-full">
                    <aside>
                        <div class="flex justify-between">
                            <span class="inline-block h-4 bg-gray-200 skeleton w-16"></span>
                            <span class="inline-block h-2 bg-gray-200 skeleton w-12"></span>
                        </div>
                        <div class="mt-1.5">
                            <span class="inline-block h-4 bg-gray-200 skeleton w-60"></span>
                        </div>
                    </aside>
                </main>
            </div>
        </main>
        <main v-else class="flex">
            <div v-if="fail" class="w-16 h-16 object-cover rounded mr-2 bg-gray-200"></div>
            <img v-else :src="`https://uchquduq24.uz/img/${post.post_img}`" @error="fail = true" class="w-16 h-16 object-cover rounded mr-2">
            <div class="flex-grow relative">
                <main class="absolute top-0 left-0 w-full">
                    <aside class="text-[11px] text-gray-400 flex justify-between items-center">
                        <span class="mr-5 leading-none">{{post.created_at}}</span>
                        <span>
                            <i class="fa-regular fa-eye text-xs mr-0.5"></i> {{post.counter}}
                        </span>
                    </aside>
                    <router-link :to="{name: 'post' , params: {id: post.id}}" class="text-gray-600 font-semibold hover:text-teal-500 text-xs leading-1 block text-ellipsis line-clamp-1">
                        {{post.post_name}}
                    </router-link>
                </main>
            </div>
        </main>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';
const { post } = defineProps(['post'])
const fail = ref(false)
</script>