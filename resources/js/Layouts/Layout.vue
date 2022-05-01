<template>
    <header class="p-4 mb-4 bg-gray-200">
        <div class="flex gap-8 items-center max-w-5xl mx-auto">
            <h1 class="text-lg font-bold">My App</h1>
            <ul class="flex gap-3">
                <li>
                    <Link href="/">Home</Link>
                </li>
                <li>
                    <Link href="/books">Books</Link>
                </li>
            </ul>
        </div>
    </header>
    <main class="max-w-5xl mx-auto">
        <slot />
    </main>
</template>
