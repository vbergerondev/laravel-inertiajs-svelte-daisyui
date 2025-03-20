<script>
    import Layout from "../../Layout.svelte";
    import { useForm, router } from "@inertiajs/svelte";

    const { token, email } = $props();

    let form = useForm({
        password: "",
        password_confirmation: "",
        token,
        email,
    });

    function submit(e) {
        e.preventDefault();
        $form.post("/reset-password", {
            onSuccess: () => router.get("/login"),
        });
    }
</script>

<svelte:head>
    <title>Reset password</title>
</svelte:head>

<Layout>
    <div class="h-screen flex justify-center items-center">
        <div class="card md:min-w-lg">
            <div class="card-body space-y-8">
                <h1 class="text-xl font-semibold text-center">
                    Reset password
                </h1>
                <form onsubmit={submit}>
                    <div class="space-y-4">
                        <div>
                            <label for="password" class="fieldset-label"
                                >Password</label
                            >
                            <!-- svelte-ignore a11y_autofocus -->
                            <input
                                type="password"
                                id="password"
                                class="input w-full"
                                class:input-error={$form.errors.password}
                                bind:value={$form.password}
                                autofocus
                                required
                            />

                            {#if $form.errors.password}
                                <p class="text-error">
                                    {$form.errors.password}
                                </p>
                            {/if}
                        </div>

                        <div>
                            <label
                                for="password_confirmation"
                                class="fieldset-label"
                                >Password confirmation</label
                            >
                            <!-- svelte-ignore a11y_autofocus -->
                            <input
                                type="password"
                                id="password_confirmation"
                                class="input w-full"
                                class:input-error={$form.errors
                                    .password_confirmation}
                                bind:value={$form.password_confirmation}
                                autofocus
                                required
                            />

                            {#if $form.errors.password_confirmation}
                                <p class="text-error">
                                    {$form.errors.password_confirmation}
                                </p>
                            {/if}
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-soft btn-primary mt-4 w-full"
                        disabled={$form.processing}>Submit</button
                    >

                    <div class="divider max-w-sm mx-auto">OR</div>

                    <div class="text-center">
                        <a href="/login" class="link">Back to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</Layout>
