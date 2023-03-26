<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['report_id', 'user_id', 'report_slug'])

const form = useForm({
    report_id: props.report_id,
    comment: null,
    user_id: props.user_id,

    slug: props.report_slug
})

function submit() {
    form.post('/comments', {
        preserveScroll: true,
    })
}
</script>

<template>
    <div class="">
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your comment
                </label>
                <input type="text" id="default-input" v-model="form.comment"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                type="submit">
                Submit
            </button>
        </form>
    </div>
</template>
