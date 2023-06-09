<template>
    <section class="mb-12">
        <header class="font-semibold text-[18px] flex justify-between py-3 border-b border-gray-500 mb-4">
            <router-link :to="{ name: 'main' }">
                Uchquduq24
            </router-link>
            <main class="flex items-center text-gray-500">
                <div v-if="authStore.user" class="mr-6 font-normal text-pink-600">
                    <router-link :to="{name: 'admin', params: {id: 1}}"><i class="fa-solid fa-screwdriver-wrench mr-2"></i> Admin panel </router-link>
                </div>

                <i class="fa-light fa-clouds "></i>
                <span class="text-xs ml-1 text-gray-700">{{ weather?.current_weather?.temperature }}</span>
                <sup class="relative top-[-2px]">&deg;</sup>
                <div class="ml-5 flex items-center">
                    <i class="fa-light fa-location-dot text-sm "></i>
                    <span
                        class="border-b border-gray-600 border-dashed uppercase ml-2 font-bold text-[9px] text-gray-700 leading-3">Uchquduq</span>
                </div>
            </main>
        </header>
        <nav class="flex my-1.5 justify-between items-center">
            <main class="text-gray-600 font-semibold">
                <router-link to="/" class="mr-6 nav py-1.5 px-3 bg-gray-100">Bosh sahifa</router-link>
                <router-link to="/about" class="mr-6 nav py-1.5 px-3 bg-gray-100">Biz Haqimizda</router-link>
                <router-link to="/contacts" class="mr-6 nav py-1.5 px-3 bg-gray-100">Kontaktlar</router-link>
            </main>
            <form>
                <main class="border rounded-sm pr-3">
                    <input type="text" class="px-3 py-0.5 outline-none" placeholder="Qidiruv">
                    <button>
                        <i class="fa-duotone fa-magnifying-glass fa-beat-fade"></i>
                    </button>
                </main>
            </form>
        </nav>
    </section>
</template>
<script lang="ts" setup>
import { useAuthStore } from '@/store/useAuthStore';
import axios from 'axios'
import { ref } from 'vue'
const authStore = useAuthStore()
const weather = ref()
const instance = axios.create({})
instance.defaults.headers.common['Authorization'] = null
instance.get('https://api.open-meteo.com/v1/forecast?latitude=42.08&longitude=63.45&hourly=temperature_2m&current_weather=true&windspeed_unit=ms&forecast_days=1').then(({ data }) => {
    weather.value = data
})
</script>