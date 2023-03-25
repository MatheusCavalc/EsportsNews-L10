<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6 py-2.5">
                    <Link :href="route('index')" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </Link>
                    <div class="flex items-center">
                    </div>
                </div>
            </nav>
            <nav class="bg-gray-50 dark:bg-gray-700">
                <div class="max-w-screen-xl px-12 py-3 mx-auto">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <ul class="flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                                <li>
                                    <Link :href="route('index')" class="text-gray-900 dark:text-white hover:underline"
                                        aria-current="page">News</Link>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Games</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Comunity</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Bets</a>
                                </li>
                            </ul>
                        </div>

                        <div class="flex">
                            <Link :href="route('login')">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Log in
                            </button></Link>
                        </div>
                    </div>

                </div>
            </nav>


            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
