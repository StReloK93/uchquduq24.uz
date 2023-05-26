<template>
    <section>
        <header class="relative">
            <div v-if="post == null" class="h-[600px] w-full skeleton bg-gray-200 flex justify-center items-center flex-col">
                <h3 class="bg-gray-300 h-5 skeleton w-[420px] mb-4"></h3>
                <h3 class="bg-gray-300 h-4 skeleton w-80"></h3>
            </div>
            <img v-if="post" :src="`https://uchquduq24.uz/img/${post?.post_img}`" class="w-full h-[600px] object-cover">
            <div v-if="post" class="absolute inset-0 bg-gradient-to-t from-stone-900/50 via-stone-900/40 to-stone-900/30 flex justify-center items-center">
                <h3 class="text-white font-bold text-3xl">
                    {{ post?.post_name }}
                </h3>
            </div>
        </header>
        <main class="flex -mx-3 mt-6 flex-wrap">
            <h3 v-if="post == null" class="px-3 bg-gray-200 h-7 skeleton w-[420px] mb-5 ml-3"></h3>
            <h3 v-else class="w-full px-3 text-xl mb-5 font-semibold text-gray-700">{{ post?.post_name }}</h3>
            
            <div class="px-3 w-3/4" v-if="post == null">
                <main class="bg-gray-200 skeleton h-80"></main>
            </div>
            <div v-else v-html="post?.post_desc" class="w-3/4 px-3"></div>
            <RandomPosts/>
        </main>
    </section>
</template>

<script setup lang="ts">
import RandomPosts from '@/components/RandomPosts.vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import { ref , watch} from 'vue'

const route = useRoute()
const { id } = defineProps(['id'])
const post = ref(null)

function getPost(id){
    post.value = null
    axios.get(`/api/posts/${id}`).then(({data}) => {
        post.value = data
    })
}
getPost(id)

watch(route, (current:any, prev) => {
    getPost(current.params.id)
})
</script>