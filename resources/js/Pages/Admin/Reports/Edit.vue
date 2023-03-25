<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import EditorJS from '@editorjs/editorjs';
import Header from "@editorjs/header";
import List from "@editorjs/list";
import ImageTool from '@editorjs/image';
import Link from '@editorjs/link';
import Paragraph from "@editorjs/paragraph";
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'

const props = defineProps(['report']);

let show_form = ref(false)

const showForm = () => {
    show_form.value = true
}

const form = useForm({
    title: props.report.title,
    user_id: props.report.user_id,
    description: props.report.description,
    image: props.report.image,
    report: null,
    tags: props.report.tags,
    game: props.report.game,
})

const editor = new EditorJS({
    holder: "editorjs",
    autofocus: true,
    initialBlock: "paragraph",
    minHeight : 30,
    tools: {
        header: {
            class: Header,
            config: {
                placeholder: 'Enter a header',
                levels: [1, 3],
                defaultLevel: 1
            }
        },
        list: {
            class: List
        },
        linkTool: {
            class: Link,
        },
        paragraph: {
            class: Paragraph,
            config: {
                placeholder: "."
            }
        },
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://localhost/upload-image', // Your backend file uploader endpoint
                    byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
                }
            }
        }
    },
    data: props.report.report
});

function submit() {
    editor.save().then((outputData) => {
        router.post(`/reports/${props.report.id}`, {
            _method: 'put',
            title: form.title,
            user_id: form.user_id,
            description: form.description,
            image: form.image,
            report: outputData,
            tags: form.tags,
            game: form.game,
        })
    }).catch((error) => {
        console.log('Saving failed: ', error)
    });
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6 text-gray-900">Edit Report</div>

                    <div class="bg-white">
                        <div class="" id="editorjs" />
                    </div>

                    <button @click="showForm"
                        class="inline-flex items-center mt-3 ml-3 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Next Infos
                    </button>

                    <div class="mt-16" v-if="show_form">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title
                                </label>
                                <input type="text" id="default-input" v-model="form.title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                                </label>
                                <input type="text" id="default-input" v-model="form.description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="default_size">Thumb Image</label>
                                <input @input="form.image = $event.target.files[0]"
                                    class="block w-2/3 mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="default_size" type="file">
                            </div>

                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags
                                </label>
                                <input type="text" id="default-input" v-model="form.tags"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Game
                                </label>
                                <input type="text" id="default-input" v-model="form.game"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>

                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                type="submit">
                                Submit
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
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
