<script setup lang="ts">
import { ExclamationTriangleIcon } from "@heroicons/vue/24/outline";

const auth = useAuth();
</script>

<template>
    <Alert type="error" class="gap-3">
        <h2 class="flex gap-2 font-bold">
            <ExclamationTriangleIcon class="size-6 text-red-300" />

            You Have No Usernames Linked
        </h2>

        <p>
            You have no RN04 accounts imported. You will not be able to post
            listings until your RN04 accounts are imported.
        </p>

        <hr class="border-red-700" />

        <p>
            There was an error retrieving your RN04 accounts. You can try to
            retrieve them again by
            <button
                type="button"
                class="text-[#90c040] hover:underline"
                @click="
                    router.patch(
                        route('usernames.update', {
                            preserveScroll: true,
                        }),
                    )
                "
            >
                clicking here</button
            >.
        </p>
    </Alert>
</template>
