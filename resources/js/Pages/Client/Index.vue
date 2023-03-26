<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment';

const props = defineProps(['reports'])
</script>

<template>
    <Head title="Dashboard" />

    <MainLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-for="report in reports" :id="report.id">
                        <Link :href="route('show.report', [report.id, report.slug])">
                        <div class="flex justify-between w-4/5 mx-auto my-7 border border-gray-100 rounded-md">
                            <div class="ml-4 my-auto">
                                <p class="text-3xl font-bold">{{ report.title }}</p>
                                <p>{{ moment(report.created_at).format('MMM D, YYYY [at] h:mm') }}</p>
                            </div>

                            <div>
                                <img :src="'storage/image/' + report.image" alt=""
                                    class="object-cover rounded-md mr-4 my-3 h-24 w-24">
                            </div>
                        </div>
                        </Link>

                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
