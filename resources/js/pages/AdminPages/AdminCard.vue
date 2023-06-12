<template>
    <section>
        <main v-if="post == null">
            <div class="h-52 skeleton bg-gray-100 flex justify-center items-center">
                <i class="fa-duotone fa-image text-gray-400 text-7xl"></i>
            </div>
            <h3 class="h-10 skeleton bg-gray-200 px-3 flex items-center justify-between">
                <div class="w-40 bg-gray-300 skeleton h-4"></div>
                <div class="w-6 bg-gray-300 skeleton h-4"></div>
            </h3>
        </main>
        <main v-else class="bg-gray-100 rounded shadow overflow-hidden relative">
            <article class="absolute inset-0 bg-black/50 z-10 flex justify-center items-center opacity-0 hover:opacity-100 transition-all">
                <main class="px-2 py-1.5 bg-white rounded-sm">
                    <button @click="eye" class="px-3 h-8 shadow rounded-sm bg-teal-400 hover:bg-teal-500  active:bg-teal-300">
                        <i class="fa-solid fa-eye text-white"></i>
                    </button>
                    <router-link :to="{name: 'post' , params: {id: post.id}}" class="px-3 h-8 inline-flex justify-center items-center shadow rounded-sm ml-2 bg-blue-400 hover:bg-blue-500 active:bg-blue-300">
                        <i class="fa-duotone fa-sidebar text-white"></i>
                    </router-link >
                    <button @click="emit('edit' , post)" class="px-3 h-8 shadow rounded-sm mx-2 bg-teal-400 hover:bg-teal-500  active:bg-teal-300">
                        <i class="fa-duotone fa-pen-nib text-white"></i>
                    </button>
                    <button @click="deletePost(post.id)" class="px-3 h-8 shadow rounded-sm bg-red-400  hover:bg-red-500 active:bg-red-300">
                        <i class="fa-duotone fa-trash text-white"></i>
                    </button>
                </main>
            </article>
            <div>
                <swiper
                :slides-per-view="1"
                :space-between="10"
            >
                <swiper-slide v-for="image in post?.images">
                    <img v-if="post" :src="`/img/${image.src}`" class="w-full h-52 object-cover">
                </swiper-slide>
            </swiper>
            </div>
            <aside class="px-3 py-2 flex justify-between">
                <span class="flex-grow">
                    {{ textDots(post.post_name) }}
                </span>
                <span class="text-sm">
                    <i class="fa-duotone fa-eye text-teal-600"></i> {{ post.counter }}
                </span>
            </aside>
        </main>
    </section>
</template>

<script setup lang="ts">
import Swal from 'sweetalert2' 
const { post } = defineProps(['post'])
const emit = defineEmits(['deleted', 'edit'])
import { Swiper, SwiperSlide } from 'swiper/vue'
import axios from 'axios'
import 'swiper/css';
function textDots(text){
    if(text.length > 40){
        return text.substring(0, 40).concat('...')
    }
    else{
        return text
    }
}


function eye(){
    axios.get(`posts/${post.id}`).then(({data}) => {
        post.counter = data.counter
    })
}

function deletePost(id){
    const swal = Swal.mixin({
        customClass: {
            confirmButton: 'w-32 bg-pink-500 text-white rounded-sm shadow py-1 hover:bg-pink-600',
            cancelButton: 'w-32 bg-gray-200 rounded-sm shadow py-1 hover:bg-gray-300 mr-2'
        },
        buttonsStyling: false,
        reverseButtons: true,
        showCancelButton: true,
        confirmButtonText: 'Ha',
        cancelButtonText: 'Yoq',
    })
    swal.fire({
        title: 'Aniq o`chirmoqchimisiz?',
        text: "O'chirilgan postni qayta tiklab bo'lmaydi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ha!',
        cancelButtonText: 'Yoq!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`posts/${id}`).then(()=>{
                Swal.fire(
                    "Muvaffaqiyatli O'chirildi",
                    "Post malumotlar bazasidan o'chirildi",
                    'success'
                )
                emit('deleted', id)
            })

        }
    })

}
</script>