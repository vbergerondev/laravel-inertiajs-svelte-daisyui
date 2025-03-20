<script>
    import { useForm } from "@inertiajs/svelte";
    import Layout from "../../Layout.svelte";

    let form = useForm({
        email: null,
        password: null,
    });

    function submit(e) {
        e.preventDefault();
        $form.post("/login", {
            onError: () => $form.reset("password"),
        });
    }
</script>

<svelte:head>
    <title>Login</title>
</svelte:head>

<Layout>
    <div class="h-screen flex justify-center items-center">
        <div class="card md:min-w-lg">
            <div class="card-body space-y-8">
                <h1 class="text-xl font-semibold text-center">Login</h1>
                <form onsubmit={submit}>
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="fieldset-label"
                                >Email</label
                            >
                            <!-- svelte-ignore a11y_autofocus -->
                            <input
                                type="email"
                                id="email"
                                class="input w-full"
                                class:input-error={$form.errors.email}
                                bind:value={$form.email}
                                autofocus
                                required
                            />

                            {#if $form.errors.email}
                                <p class="text-error">{$form.errors.email}</p>
                            {/if}
                        </div>

                        <div>
                            <div class="flex justify-between">
                                <label for="password" class="fieldset-label"
                                    >Password</label
                                >
                                <a href="/forgot-password" class="link"
                                    >Forgot password?</a
                                >
                            </div>
                            <input
                                type="password"
                                id="password"
                                class="input w-full"
                                bind:value={$form.password}
                                required
                            />
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-soft btn-primary mt-4 w-full"
                        disabled={$form.processing}>Login</button
                    >

                    <div class="divider max-w-sm mx-auto">OR</div>

                    <div class="text-center">
                        If you don't have an account yet, <a
                            href="/register"
                            class="link">create an account</a
                        >.
                    </div>
                </form>
            </div>
        </div>
    </div>
</Layout>
