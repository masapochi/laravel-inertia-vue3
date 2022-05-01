<template>
    <h1 class="text-3xl mb-6">Create</h1>

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
        <div>
            <button class="py-2 px-4 text-white bg-blue-400 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    title: "",
    author: "",
});

let submit = () => {
    form.post("/books");
};
</script>
