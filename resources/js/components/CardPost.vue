<template>
    <section class="flex">
        <aside v-if="post == null" class="w-full bg-gray-50 skeleton shadow-sm flex">
            <div  class="bg-gray-200 h-48 shadow-sm w-48 skeleton rounded"></div>
            <main class="flex-grow pl-4 pr-1.5 pt-1.5 flex flex-col justify-between">
                <div>
                    <h3 class="h-5 w-64 skeleton bg-gray-200 mb-2"></h3>
                    <p class="h-24 w-full skeleton bg-gray-200 mb-2"></p>
                    <div class="h-4 w-32  skeleton bg-gray-200"></div>
                </div>
            </main>
        </aside>
        <aside v-else class="flex">
            <main class="w-48">
                <img v-if="imgFail" :src="`/img/${post.images[0]?.src}`" @error="imgFail = false" class="w-full h-48 object-cover rounded block">
                <div v-else class="bg-gray-200 h-48 shadow-sm">
                
                </div>
            </main>
            <main class="pl-4 flex flex-col w-[calc(100%-192px)] justify-between">
                <div>
                    <h3 class="text-gray-900 font-bold text-justify leading-5">
                        {{ post.post_name }}
                    </h3>
                    <aside class="flex justify-end items-center text-sm text-gray-400 my-1.5">
                        <span>
                            {{ post.created_at }}
                        </span>
                    </aside>
                    <p class="text-gray-500 text-justify text-ellipsis line-clamp-3 cardpost" v-html="post.post_desc"></p>
                </div>
                <div class="text-right">
                    <router-link :to="{name: 'post' , params: {id: post.id}}"
                        class="uppercase hover:text-gray-300 font-semibold text-sm px-5 inline-flex items-center text-teal-500">
                        To'liq o'qish <i class="fa-sharp fa-light fa-angle-right fa-fade ml-3 text-xl"></i>
                    </router-link>
                </div>
            </main>
        </aside>

    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const { post } = defineProps(['post'])

const imgFail = ref(true)
</script>
<style>
.cardpost span,
.cardpost strong {
    font-weight: normal !important;
}
</style>