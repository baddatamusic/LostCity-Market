<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import { PlusCircleIcon } from "@heroicons/vue/24/outline";

const props = defineProps<Pages.Admin.ItemsCreatePage>();

const form = useForm({
    ...props.itemForm,
});

const submit = (close: () => void) => {
    form.post(route("admin.items.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            close();
        },
    });
};
</script>

<template>
    <BaseModal>
        <template #default="{ close }">
            <Head title="Create Item" />

            <div class="flex items-center gap-2">
                <PlusCircleIcon class="size-7 text-amber-500" />

                <h1 class="text-xl font-semibold">Create Item</h1>
            </div>

            <p class="text-stone-300">
                Fill in the item details below and submit the form.
            </p>

            <form class="flex flex-col gap-6" @submit.prevent="submit(close)">
                <div
                    class="flex flex-col gap-4 border-2 border-[#382418] bg-black p-3"
                >
                    <div
                        v-if="Object.keys(form.errors).length !== 0"
                        class="text-red-500"
                    >
                        <p v-for="(error, key) in form.errors" :key="key">
                            {{ error }}
                        </p>
                    </div>

                    <div>
                        <label
                            for="game_id"
                            class="font-semibold text-stone-300"
                        >
                            Game ID
                        </label>

                        <input
                            id="game_id"
                            v-model="form.game_id"
                            type="number"
                            class="w-32 border-slate-900 bg-stone-700 py-0 pl-1"
                        />
                    </div>

                    <div>
                        <label for="name" class="font-semibold text-stone-300">
                            Name
                        </label>

                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="w-full border-slate-900 bg-stone-700 py-0 pl-1"
                            placeholder="Name"
                        />
                    </div>

                    <div>
                        <label for="slug" class="font-semibold text-stone-300">
                            Slug
                        </label>

                        <input
                            id="slug"
                            v-model="form.slug"
                            type="text"
                            class="w-full border-slate-900 bg-stone-700 py-0 pl-1"
                            placeholder="Slug"
                        />
                    </div>

                    <div>
                        <label for="cost" class="font-semibold text-stone-300">
                            Cost
                        </label>

                        <input
                            id="cost"
                            v-model="form.cost"
                            type="number"
                            class="w-32 border-slate-900 bg-stone-700 py-0 pl-1"
                        />
                    </div>

                    <div>
                        <label
                            for="description"
                            class="font-semibold text-stone-300"
                        >
                            Description
                        </label>

                        <input
                            id="description"
                            v-model="form.description"
                            type="text"
                            class="w-full border-slate-900 bg-stone-700 py-0 pl-1"
                            placeholder="Description (optional)"
                        />
                    </div>

                    <div>
                        <label
                            for="is_active"
                            class="font-semibold text-stone-300"
                        >
                            Is Active
                        </label>

                        <input
                            id="is_active"
                            v-model="form.is_active"
                            type="checkbox"
                            class="size-4 border-slate-900 bg-stone-700 py-0 pl-1"
                        />
                    </div>

                    <div>
                        <label
                            for="is_listable"
                            class="font-semibold text-stone-300"
                        >
                            Is Listable
                        </label>

                        <input
                            id="is_listable"
                            v-model="form.is_listable"
                            type="checkbox"
                            class="size-4 border-slate-900 bg-stone-700 py-0 pl-1"
                        />
                    </div>
                </div>

                <div class="flex flex-wrap justify-end gap-3">
                    <BaseButton type="submit" variant="success">
                        Submit
                    </BaseButton>

                    <BaseButton
                        type="button"
                        variant="secondary"
                        @click="close()"
                    >
                        Cancel
                    </BaseButton>
                </div>
            </form>
        </template>
    </BaseModal>
</template>
