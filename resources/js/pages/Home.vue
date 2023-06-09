<template>
    <section>
        <h3 class="text-sm mb-3 font-semibold ">
            Bosh sahifa
        </h3>
        <main class="mb-10">
            <aside class="flex mb-6 -mx-3">
                <div class="w-2/3 px-3">
                    <Card :mini="true" :post="pageData.posts?.data[0]"/>
                </div>
                <div class="w-1/3 px-3">
                    <Card :mini="true" :post="pageData.posts?.data[1]" class="h-full" />
                </div>
            </aside>
            <aside class="flex -mx-3">
                <div class="w-1/3 px-3">
                    <Card :mini="false" :post="pageData.posts?.data[2]" />
                </div>
                <div class="w-1/3 px-3">
                    <Card :mini="false" :post="pageData.posts?.data[3]" />
                </div>
                <div class="w-1/3 px-3">
                    <Card :mini="false" :post="pageData.posts?.data[4]" />
                </div>
            </aside>
        </main>

        <main  class="flex -mx-3">
            <div class="w-3/4 px-3">
                <h3 class="text-sm mb-3 font-semibold">
                    Postlar
                </h3>
                <aside v-if="pageData.posts == null">
                    <CardPost v-for="number in 10" :post="null" class="mb-8"/>
                </aside>
                <aside v-else>
                    <CardPost v-for="post in pageData.posts.data" :post="post" class="mb-8"/>
                </aside>

                <Pagination :posts="pageData.posts" route-name="posts" />
            </div>
            <RandomPosts />
        </main>
    </section>
</template>

<script setup lang="ts">
import { reactive, watch } from 'vue'
import { useRoute } from 'vue-router'
import Pagination from '@/components/Pagination.vue'
import CardPost from '@/components/CardPost.vue'
import RandomPosts from '@/components/RandomPosts.vue'
import axios from 'axios'
import Card from '@/components/Card.vue'
const { id } = defineProps(['id'])
const route = useRoute()
const pageData:any = reactive({
    posts: null,
})

function getData(id){
    pageData.posts = null
    const routeLink = id == undefined ? 'posts?page=1': `posts?page=${ id }`
    axios.get(routeLink).then(({data}) => {
        pageData.posts = data
    })
}
getData(id)

watch(route, (current, prev) => {
    getData(current.params.id)
})
</script>