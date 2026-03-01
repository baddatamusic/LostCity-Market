<script setup lang="ts">
const form = useForm({
    name: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login.store"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <LayoutMain>
        <Head title="Login" />

        <div class="mx-auto max-w-sm">
            <h1 class="mb-6 text-2xl font-semibold">Login</h1>

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
                    <label for="password">Password</label>

                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="border border-stone-700 bg-stone-900 p-2"
                        autocomplete="current-password"
                        required
                    />
                </div>

                <div class="flex items-center gap-2">
                    <input
                        id="remember"
                        v-model="form.remember"
                        type="checkbox"
                        class="cursor-pointer"
                    />

                    <label for="remember" class="cursor-pointer"
                        >Remember me</label
                    >
                </div>

                <BaseButton
                    type="submit"
                    variant="success"
                    :disabled="form.processing"
                    class="!px-6 !py-2"
                >
                    Login
                </BaseButton>

                <div class="flex justify-between text-sm text-stone-400">
                    <Link
                        :href="route('password.request')"
                        class="text-[#90c040] hover:underline"
                    >
                        Forgot password?
                    </Link>

                    <Link
                        :href="route('register')"
                        class="text-[#90c040] hover:underline"
                    >
                        Register
                    </Link>
                </div>
            </form>
        </div>
    </LayoutMain>
</template>
