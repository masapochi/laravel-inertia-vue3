<template>
    <h1 class="text-3xl mb-6">Book List</h1>

    <div class="mb-6">
        <Link
            class="py-2 px-4 text-white bg-cyan-500 hover:bg-cyan-700"
            href="books/create"
        >
            Create
        </Link>
    </div>

    <ul>
        <li v-for="book in books.data" :key="book.id">
            <Link class="text-blue-600" :href="`/books/${book.id}`">
                {{ book.title }}
            </Link>
        </li>
    </ul>

    <div>
        <ul>
            <li v-for="link in books.links">
                <Component
                    :is="link.url ? 'Link' : 'span'"
                    :href="link.url"
                    v-html="link.label"
                />
            </li>
        </ul>
    </div>
</template>

<script setup>
const props = defineProps({
    books: Object,
});
</script>

<style lang="scss" scoped></style>
