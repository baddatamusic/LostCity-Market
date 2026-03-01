<script setup lang="ts">
const props = defineProps<{ token: string; email: string }>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <LayoutMain>
        <Head title="Reset Password" />

        <div class="mx-auto max-w-sm">
            <h1 class="mb-6 text-2xl font-semibold">Reset Password</h1>

            <form
                class="flex flex-col gap-4 border-2 border-[#382418] bg-black p-4"
                @submit.prevent="submit"
            >
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

                <div class="flex flex-col gap-2">
                    <label for="password">New Password</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="border border-stone-700 bg-stone-900 p-2"
                        autocomplete="new-password"
                        required
                    />
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="border border-stone-700 bg-stone-900 p-2"
                        autocomplete="new-password"
                        required
                    />
                </div>

                <BaseButton
                    type="submit"
                    variant="success"
                    :disabled="form.processing"
                    class="!px-6 !py-2"
                >
                    Reset Password
                </BaseButton>
            </form>
        </div>
    </LayoutMain>
</template>
