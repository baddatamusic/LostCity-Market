<script setup lang="ts">
const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <LayoutMain>
        <Head title="Register" />

        <div class="mx-auto max-w-sm">
            <h1 class="mb-6 text-2xl font-semibold">Register</h1>

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
                    <label for="name">Username</label>

                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="border border-stone-700 bg-stone-900 p-2"
                        autocomplete="username"
                        required
                    />
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
                    <label for="password">Password</label>

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
                    <label for="password_confirmation">Confirm Password</label>

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
                    Register
                </BaseButton>

                <p class="text-center text-sm text-stone-400">
                    Already have an account?
                    <Link
                        :href="route('login')"
                        class="text-[#90c040] hover:underline"
                    >
                        Login
                    </Link>
                </p>
            </form>
        </div>
    </LayoutMain>
</template>
