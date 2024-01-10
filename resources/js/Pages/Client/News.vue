<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import FormComments from '@/Components/FormComment.vue'
import CanNotComment from '@/Components/CanNotComment.vue'
import EditorJS from '@editorjs/editorjs';
import Header from "@editorjs/header";
import List from "@editorjs/list";
import ImageTool from '@editorjs/image';
import Link from '@editorjs/link';
import Paragraph from "@editorjs/paragraph";
import { Head } from '@inertiajs/vue3';
import moment from 'moment';

const props = defineProps(['report', 'comments'])

const editor = new EditorJS({
    holder: "editorjs",
    readOnly: true,
    minHeight: 30,
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
                <div class="bg-gray-100 overflow-hidden shadow-sm rounded-lg pb-5">
                    <div class="bg-white w-full border rounded-lg lg:w-4/5 md:ml-10">
                        <div>
                            <img :src="'/storage/image/' + report.image" alt=""
                                class="object-cover h-80 lg:h-[430px] w-full rounded-t-lg">
                        </div>

                        <div class="flex ml-3 md:ml-10 mt-6">
                            <p>
                                {{ moment(report.created_at).format('MMM D, YYYY [at] h:mm') }}
                            </p>

                            <p class="text-gray-500 mx-2">
                                |
                            </p>

                            <p>
                                Write for {{ report.author.name }}
                            </p>
                        </div>

                        <div class="md:w-4/5 mx-2 md:mx-0">
                            <div class="bg-white rounded-lg" id="editorjs" :readonly="true" />
                        </div>
                    </div>

                    <div class="mt-5 lg:ml-12 ml-0">
                        <div class="mx-2 lg:mx-0 ">
                            <p class="text-2xl font-bold">Comments</p>

                            <div v-if="$page.props.auth.user">
                                <FormComments :report_id="props.report.id" :user_id="$page.props.auth.user.id"
                                    :report_slug="props.report.slug" />
                            </div>

                            <div v-else class="border rounded-lg w-full md:w-3/5 bg-white">
                                <CanNotComment />
                            </div>

                            <div v-for="comment in comments" :key="comment.id" class="w-full lg:w-3/5 mt-8">
                                <div class="flex justify-between border rounded-t-lg bg-white">
                                    <div class="ml-3 my-3">
                                        #{{ comment.id }}
                                    </div>

                                    <div class="mr-3 my-3 flex">
                                        <p>
                                            {{ moment(comment.created_at).format('MMM D, YYYY [at] h:mm') }}
                                        </p>

                                        <p class="text-gray-500 mx-2">
                                            |
                                        </p>

                                        <p>
                                            {{ comment.user.name }}
                                        </p>
                                    </div>
                                </div>

                                <div class="border-r border-b border-l rounded-b-lg bg-white">
                                    <p class="pl-3 py-3">{{ comment.comment }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style>
h1 {
    font-size: 50px;
    font-weight: 700;
    margin: inherit;
}

@media only screen and (max-width: 767px) {
    h1 {
        font-size: 36px;
    }
}

h3 {
    font-size: 24px;
    font-weight: 700;
    color: #5d6165;
    margin: 16px 0 8px 0;
}
</style>
