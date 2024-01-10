<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment';

const props = defineProps(['reports'])

console.log(props.reports)
</script>

<template>
    <Head title="E-newS - Home" />

    <MainLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="rounded-lg bg-white mx-5 my-5 pb-5">
                        <Link :href="route('show.report', [reports[0].id, reports[0].slug])">
                        <img :src="'/storage/image/' + reports[0].image" :alt="reports[0].description"
                            class="rounded-t-lg object-cover h-[430px] w-full">
                        <p class="text-3xl lg:text-5xl font-bold ml-3 mt-3">{{ reports[0].title }}</p>
                        <p class="ml-3 mt-3">{{ moment(reports[0].created_at).format('MMM D, YYYY [at] h:mm') }}</p>
                        </Link>
                    </div>

                    <div v-for="report, index in reports" :id="index" class="mx-3">
                        <div v-if="index > 0" class="mb-2 md:ml-2">
                            <Link :href="route('show.report', [report.id, report.slug])">
                            <div
                                class="flex justify-between md:w-4/5 p-2 w-full bg-white border border-gray-100 rounded-md">
                                <div class="md:ml-4 my-auto w-4/5">
                                    <p class="text-xl md:text-3xl font-bold">{{ report.title }}</p>
                                    <p>{{ moment(report.created_at).format('MMM D, YYYY [at] h:mm') }}</p>
                                </div>

                                <div class="grid grid-cols-1 content-center">
                                    <img :src="'storage/image/' + report.image" :alt="report.description"
                                        class="object-cover rounded-md md:mr-4 md:my-3 h-20 w-20 md:h-24 md:w-24">
                                </div>
                            </div>
                            </Link>
                        </div>
                    </div>

                    <div class="flex justify-center mx-3 lg:mx-20">
                        <button type="button"
                            class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-2 w-full me-2 mb-2">Mais
                            Noticias</button>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
