<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <p class="text-center my-3">
        You need login to comment
    </p>
    <div class="flex mb-3">
        <div class="mx-auto">
            <Link :href="route('login')">
            <button
                class="inline-flex items-center mr-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Log in
            </button>
            </Link>
            <Link :href="route('register')">
            <button
                class="inline-flex items-center ml-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Register
            </button>
            </Link>
        </div>
    </div>
</template>
