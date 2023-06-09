<template>
    <section @mousedown="close" class="absolute inset-0 bg-black/50 z-50">
        <form
            @mousedown.stop @submit.prevent="addPost"
            :class="{'translate-x-0': modal}"
            class="w-[650px] h-full -translate-x-full bg-white p-4 shadow-md shadow-gray-400 border-r border-gray-500 transition-all"
        >
            <h3 class="text-xl text-gray-600 text-center -m-4 mb-4 px-4 py-2  bg-gray-100">
                Yangi post qo'shish
            </h3>
            <div class="mb-4">
                <label for="name" class="text-gray-500 text-sm">Post sarlavhasi</label>
                <input id="name" type="text" v-model="formData.name" class="text-input w-full">
            </div>
            <div class="mb-4">
                <label for="date" class="text-gray-500 text-sm">Kiritilgan sana</label>
                <input id="date" type="date" v-model="formData.created_at" class="text-input w-full">
            </div>
            <UploadImage :formData="formData" />
            <QuillEditor ref="editor" theme="snow" class="h-64" />
            <button class="bg-teal-500 hover:bg-teal-600 active:bg-teal-400 w-full py-1 text-white shadow rounded-sm">
                Qo'shish
            </button>
        </form>
    </section>
</template>

<script setup lang="ts">
import { onMounted, reactive , ref } from 'vue'
import axios from 'axios'
import UploadImage from '@/components/UploadImage.vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
const emit = defineEmits(['close', 'edit'])
const { post } = defineProps(['post'])
const modal = ref(false)
const editor = ref()



const formData = reactive({
    name: post.post_name,
    images: post.images,
    created_at: post.created_at,
})

function addPost(){
    const Form = new FormData()

    Form.append('name', formData.name)
    Form.append('description', editor.value.getHTML())
    Form.append('created_at', formData.created_at)

    formData.images.forEach(image => {
        if(image.type) Form.append('imgs[]', image)
        else Form.append('images[]', image.id)
    })


    axios.post(`posts/${post.id}`, Form).then(({data}) => {
        emit('edit', data)
        close()
    })
}
onMounted(() => {
    setTimeout(() => {
        modal.value = true
    })

    editor.value.setHTML(post.post_desc)
})

async function close(){
    function timeout(ms) {
        modal.value = false
        new Promise(resolve => setTimeout(resolve, ms));
    }
    await timeout(1000)
    emit('close')
}
</script>