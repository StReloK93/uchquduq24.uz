<template>
<section
    class="text-gray-200 group w-full relative after:content-[''] after:float-left after:pt-[56%] bg-teal-200 flex rounded overflow-hidden shadow-md">
    <aside v-if="post == undefined" class="w-full bg-gray-100 skeleton relative flex px-4 py-3 flex-col justify-end shadow-sm">
        <h3 class="h-4 bg-gray-300 skeleton w-1/2 mb-2"></h3>
        <div>
            <span class="h-4 bg-gray-300 skeleton w-16 mr-3 inline-block rounded-sm shadow-sm"></span>
            <span class="h-4 bg-gray-300 skeleton w-16 inline-block rounded-sm shadow-sm"></span>
        </div>
    </aside>

    <aside v-else>
        <img v-if="imgFail" :src="`/img/${post.images[0]?.src}`" @error="imgFail = false" class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-110 transition-all">
        <div v-else class="w-full h-full absolute top-0 left-0 bg-gray-200">

        </div>
        <div
            class="absolute inset-0 bg-gradient-to-t group-hover:opacity-0 transition-all from-30% from-black/80 via-transparent to-transparent flex flex-col justify-end px-4 py-3">
            <h3 class="font-semibold mb-2 w-3/4 leading-none">{{ post.post_name }}
            </h3>
            <aside class="text-sm text-gray-400">
                <span class="mr-5">
                    {{ post.created_at }}
                </span>
                <span>
                    <i class="fa-regular fa-eye text-xs mr-0.5"></i> {{ post.counter }}
                </span>
            </aside>
        </div>
        <main
            class="absolute opacity-0 group-hover:opacity-100 transition-all inset-0 flex flex-col justify-between px-4 pb-3 pt-12 bg-gray-900/70">
            <div>
                <h3 class="font-semibold mb-2 w-3/4 leading-none">{{ post.post_name }}</h3>
                <aside class="text-sm text-gray-400 mb-4">
                    <span class="mr-5">
                        {{ post.created_at }}
                    </span>
                    <span>
                        <i class="fa-regular fa-eye text-xs mr-0.5"></i> {{ post.counter }}
                    </span>
                </aside>

                <p v-if="mini" v-html="post.post_desc" class="text-gray-100 text-ellipsis line-clamp-5 spanian"></p>
            </div>
            <div class="text-right">
                <router-link :to="{name: 'post' , params: {id: post.id}}"
                    class="uppercase text-gray-300 text-sm px-5 font-semibold inline-flex items-center hover:text-teal-500">
                    To'liq o'qish <i class="fa-sharp fa-light fa-angle-right fa-fade ml-3 text-xl"></i>
                </router-link>
            </div>
        </main>
    </aside>

</section>
</template>
<script setup lang="ts">
import { ref } from 'vue';

const { mini, post } = defineProps(['mini', 'post'])
const imgFail = ref(true)
</script>
<style>
.spanian span,
.spanian strong {
    color: white !important;
    font-weight: normal !important;
}
</style>