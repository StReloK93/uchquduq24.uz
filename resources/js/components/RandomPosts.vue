<template>
    <div class="w-1/4 px-3">
        <h3 class="text-sm mb-3 font-semibold">
            Taxminiy postlar
        </h3>
        <div v-if="pageData.randomPosts == null" class="bg-gray-50 shadow-sm px-4 py-4 rounded-sm">
            <CardMini v-for="number in 5" :post="null" :class="{'mb-0': number == 5}" class="mb-4"/>
        </div>
        <div v-else class="bg-gray-50 shadow-sm px-4 py-4 rounded-sm">
            <CardMini v-for="(post,index) in pageData.randomPosts" :post="post" :class="{'mb-0': index == 4}" class="mb-4"/>
        </div>
    </div>
</template>
<script setup lang="ts">
import CardMini from '@/components/CardMini.vue'
import axios from 'axios'
import { reactive } from 'vue';

const pageData = reactive({
    randomPosts: null
})

axios.get('/api/postsrandom').then(({data}) => {
    pageData.randomPosts = data
})
</script>