<script setup lang="ts">
const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <LayoutMain>
        <Head title="Forgot Password" />

        <div class="mx-auto max-w-sm">
            <h1 class="mb-6 text-2xl font-semibold">Forgot Password</h1>

            <form
                class="flex flex-col gap-4 border-2 border-[#382418] bg-black p-4"
                @submit.prevent="submit"
            >
                <p class="text-sm text-stone-400">
                    Enter your email address and we'll send you a link to reset your password.
                </p>

                <div
                    v-if="Object.keys(form.errors).length !== 0"
                    class="text-red-500"
                >
                    <p v-for="(error, key) in form.errors" :key="key">
                        {{ error }}
                    </p>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="border border-stone-700 bg-stone-900 p-2"
                        autocomplete="email"
                        required
                    />
                </div>

                <BaseButton
                    type="submit"
                    variant="success"
                    :disabled="form.processing"
                    class="!px-6 !py-2"
                >
                    Send Reset Link
                </BaseButton>

                <p class="text-center text-sm text-stone-400">
                    <Link :href="route('login')" class="text-[#90c040] hover:underline">
                        Back to Login
                    </Link>
                </p>
            </form>
        </div>
    </LayoutMain>
</template>
