<template>
    <section class="fixed inset-0 bg-slate-200 grid place-content-center">
        <router-link to="/" class="absolute top-4 left-4 bg-gray-100 text-gray-600 hover:bg-gray-200 px-3 py-1 shadow rounded-sm">
            <i class="fa-duotone fa-house text-teal-500"></i>
            Saytga o'tish
        </router-link>
        <form class="flex" @submit.prevent="login">
            <div class="w-72 h-96 bg-slate-100 rounded-l shadow relative overflow-hidden">
                <img src="/images/login.jpg" class="h-full w-full object-cover absolute inset-0">
                <div class="absolute inset-0 bg-black/20">

                </div>
            </div>
            <div class="w-72 h-96 bg-white  rounded-r shadow p-4">
                <h3 class="text-gray-600 text-2xl mb-4 text-center">
                    Kirish
                </h3>
                <p class="text-red-600">
                    {{errorMessage}}
                </p>
                <div class="flex flex-col mb-2">
                    <label for="login" class="text-gray-400 text-xs">Login</label>
                    <input v-model="formData.email" id="login" type="text" autocomplete="off" required class="text-input"/>
                </div>
                <div class="flex flex-col">
                    <label for="password" class="text-gray-400 text-xs">Parol</label>
                    <input v-model="formData.password" id="password" type="password" autocomplete="off" required class="text-input"/>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-2 py-1 bg-teal-500 hover:bg-teal-600 active:bg-teal-400 text-white w-full rounded-sm shadow">
                        <i class="fal fa-sign-in mr-4"></i> Kirish
                    </button>
                </div>
            </div>
        </form>
    </section>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/store/useAuthStore';
import { reactive, ref } from 'vue';
const errorMessage = ref("")
const store = useAuthStore()

const formData = reactive({
    email: null,
    password: null,
})

async function login(){
    const data = await store.login(formData)

    if(data != null && data.message) {
        errorMessage.value = data.message
    }
    else {
        errorMessage.value = ""
    }

    setTimeout(() => errorMessage.value = null,  5000)
}
</script>