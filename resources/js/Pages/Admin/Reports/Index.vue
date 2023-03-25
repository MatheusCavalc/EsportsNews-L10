<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps(['reports'])
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between">
                        <div class="text-3xl font-bold p-6 text-gray-900">All Reports</div>

                        <Link :href="route('reports.create')" class="p-6">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            New Report
                        </button>
                        </Link>
                    </div>

                    <div v-for="report in reports" :id="report.id">
                        <div class="flex justify-between w-2/3 mx-auto my-7 border border-gray-400 rounded-md">
                            <div class="ml-4 my-auto">
                                <p class="text-xl font-bold">{{ report.title }}</p>
                                <p>{{ report.created_at }}</p>
                            </div>

                            <div>
                                <img :src="'storage/image/' + report.image" alt="" class="mr-4 my-3 h-16 w-16">
                            </div>

                            <div>
                                <div class="flex">
                                    <div>
                                        <Link :href="route('reports.edit', report.id)">
                                        <button
                                            class="inline-flex items-center px-4 py-2 my-7 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Edit
                                        </button>
                                        </Link>
                                    </div>

                                    <div class="mx-3">
                                        <Link :href="route('reports.destroy', report.id)">
                                        <button
                                            class="inline-flex items-center px-4 py-2 my-7 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                        </Link>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
