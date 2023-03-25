<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import EditorJS from '@editorjs/editorjs';
import Header from "@editorjs/header";
import List from "@editorjs/list";
import ImageTool from '@editorjs/image';
import Link from '@editorjs/link';
import Paragraph from "@editorjs/paragraph";
import { Head } from '@inertiajs/vue3';

const props = defineProps(['report'])

const editor = new EditorJS({
    holder: "editorjs",
    readOnly: true,
    minHeight : 30,
    tools: {
        header: Header,
        list: List,
        linkTool: Link,
        paragraph: Paragraph,
        image: ImageTool,
    },
    data: props.report.report
});
</script>

<template>
    <Head :title="report.title" />

    <MainLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white w-4/5">
                        <div class="" id="editorjs" :readonly="true" />
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style>
h1 {
    font-size: 56px;
    font-weight: 700;
    margin: inherit;
}

h3 {
    font-size: 24px;
    font-weight: 700;
    color: #5d6165;
    margin: 16px 0 8px 0;
}
</style>
