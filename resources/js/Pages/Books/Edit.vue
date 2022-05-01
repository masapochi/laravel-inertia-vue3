<template>
    <h1 class="text-3xl mb-6">{{ book.title }}</h1>

    <form @submit.prevent="submit">
        <div class="mb-3 flex items-center gap-3">
            <label for="title">Title</label>
            <input
                id="title"
                class="border ml-3r"
                type="text"
                v-model="form.title"
                name="title"
            />
        </div>
        <div class="mb-3 flex items-center gap-3">
            <label for="author">Author</label>
            <input
                id="author"
                class="border ml-3"
                type="text"
                v-model="form.author"
                name="author"
            />
        </div>
        <div class="inline-flex gap-3">
            <button
                type="submit"
                :disabled="form.processing"
                class="py-2 px-4 text-white bg-blue-400 hover:bg-blue-500"
            >
                Submit
            </button>
            <button
                type="button"
                class="py-2 px-4 text-white bg-red-400 hover:bg-red-500"
                @click="destroy"
            >
                Delete
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    book: { type: Object },
});

let form = useForm({
    title: props.book.title,
    author: props.book.author,
});

let submit = () => {
    form.patch(`/books/${props.book.id}`);
};

let destroy = () => {
    form.delete(`/books/${props.book.id}`, {
        onBefore: () => confirm("delete?"),
    });
};
</script>
