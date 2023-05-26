<template>
    <footer class="bg-stone-200 text-gray-700">
        <section class="container mx-auto p-10">
            <main class="border-b border-gray-400 pb-5 mb-5 flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-semibold mb-1">Uchquduq24</h3>
                    <p class="leading-none text-sm text-gray-500">
                        Uchquduq shahridagi<br>
                        eng so'ngi yangiliklar
                    </p>
                </div>
                <main class="font-semibold">
                    <router-link to="/" class="mr-6 hover:underline">Bosh sahifa</router-link>
                    <router-link to="/about" class="mr-6 hover:underline">Biz Haqimizda</router-link>
                    <router-link to="/contacts" class="mr-6 hover:underline">Kontaktlar</router-link>
                </main>
            </main>
            <main class="flex justify-between items-center">
                <div class="text-sm">
                    <p class="leading-none mb-1">
                        Uchquduq24 saytida faqat uchquduq shahri so'ngi malumotlari yoritib boriladi. <br>
                        Reklama yoki boshqa malumotlarga hech qanday aloqasi yoq
                    </p>
                    <p>
                        Bog'lanish uchun +998 (93) 310-51-48
                    </p>
                </div>
                <main class="font-semibold">
                    <div class="flex justify-end mb-2">
                        <a target="_blank" href="https://www.youtube.com/channel/UCvei-CmL8NITu25tMkjglxw" class="transition-all group mr-5 border border-red-500 hover:border-gray-500 w-8 h-8 rounded-full flex justify-center items-center">
                            <i class="fa-brands fa-youtube text-red-500 group-hover:text-gray-500 group-hover:scale-110"></i>
                        </a>
                        <a target="_blank" href="https://t.me/Uchquduq_24" class="transition-all group border border-blue-500 hover:border-gray-500 w-8 h-8 rounded-full flex justify-center items-center">
                            <i class="fa-brands fa-telegram text-blue-500 group-hover:text-gray-500 group-hover:scale-110"></i>
                        </a>
                    </div>
                    <p>
                        Uchquduq24 ©  2020-{{ new Date().getFullYear() }}
                    </p>
                </main>
            </main>
        </section>
    </footer>
</template>

<script setup lang="ts">

</script>