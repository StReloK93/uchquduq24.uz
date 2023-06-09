<template>
    <section class="h-screen px-2 pb-0 flex flex-col">
        <TransitionGroup name="fade">
            <AddPost @close="pageData.addPostModal = false" v-if="pageData.addPostModal" @add="getData(id)" />
            <EditPost 
                v-if="pageData.editable"
                @close="pageData.editable = false" 
                :post="pageData.editable"
                @edit="editPost"
            />
        </TransitionGroup>
        <AdminHeader @addPost="pageData.addPostModal = true" />
        <main class="flex-grow">
            <aside v-if="pageData.posts" class="w-full pt-3 flex flex-wrap">
                <AdminCard v-for="post in pageData.posts?.data" :post="post" @edit="(post) =>pageData.editable = post" @deleted="getData(id)" class="w-1/3 px-2 mb-2"/>
            </aside>
            <aside class="w-full pt-3 flex flex-wrap" v-else>
                <AdminCard v-for="post in 9" :post="null" class="w-1/3 px-2 mb-2"/>
            </aside>
        </main>
        <Pagination :posts="pageData.posts" class="py-3 px-2" />
    </section>
</template>

<script setup lang="ts">
import AdminHeader from './AdminHeader.vue'
import { reactive, watch } from 'vue'
import { useRoute } from 'vue-router'
import AdminCard from './AdminCard.vue'
import AddPost from './AddPost.vue'
import EditPost from './EditPost.vue'
import Pagination from '@/components/Pagination.vue'
import axios from 'axios'
const { id } = defineProps(['id'])
const route = useRoute()
const pageData:any = reactive({
    posts: null,
    addPostModal: false,
    editable: null
})

function getData(id){
    pageData.posts = null
    const routeLink = id == undefined ? 'posts?page=1': `posts?page=${ id }`
    axios.get(routeLink).then(({data}) => {
        pageData.posts = data
    })
}
getData(id)


function editPost(editpost){
    const post = pageData.posts.data.find((post) => post.id = editpost.id)
    post.post_name = editpost.post_name
    post.post_desc = editpost.post_desc
    post.created_at = editpost.created_at
    post.images = editpost.images
}

watch(route, (current, prev) => {
    getData(current.params.id)
})
</script>