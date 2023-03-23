<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['report'])

const reportT = '/storage/report/' + props.report.report + '#toolbar=0'
</script>

<template>
    <Head title="Dashboard" />

    <MainLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ report.title }}</div>

                    <embed :src="reportT" height="700px" width="500">
                </div>
            </div>
        </div>
    </MainLayout>
</template>
