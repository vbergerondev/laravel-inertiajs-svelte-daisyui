<script>
    import { useForm } from "@inertiajs/svelte";
    import Layout from "../../Layout.svelte";

    let form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    function submit(e) {
        e.preventDefault();
        $form.post("/register", {
            onError: () => $form.reset("password", "password_confirmation"),
        });
    }
</script>

<svelte:head>
    <title>Register</title>
</svelte:head>

<Layout>
    <div class="h-screen flex justify-center items-center">
        <div class="card md:min-w-lg">
            <div class="card-body space-y-8">
                <h1 class="text-xl font-semibold text-center">Register</h1>
                <form onsubmit={submit}>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="fieldset-label">Name</label
                            >
                            <!-- svelte-ignore a11y_autofocus -->
                            <input
                                type="text"
                                id="name"
                                class="input w-full"
                                class:input-error={$form.errors.name}
                                bind:value={$form.name}
                                autofocus
                                required
                            />
                            {#if $form.errors.name}
                                <p class="text-error">{$form.errors.name}</p>
                            {/if}
                        </div>

                        <div>
                            <label for="email" class="fieldset-label"
                                >Email</label
                            >
                            <input
                                type="email"
                                id="email"
                                class="input w-full"
                                class:input-error={$form.errors.email}
                                bind:value={$form.email}
                                required
                            />
                            {#if $form.errors.email}
                                <p class="text-error">{$form.errors.email}</p>
                            {/if}
                        </div>

                        <div>
                            <label for="password" class="fieldset-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                id="password"
                                class="input w-full"
                                class:input-error={$form.errors.password}
                                bind:value={$form.password}
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
                            <input
                                type="password"
                                id="password_confirmation"
                                class="input w-full"
                                bind:value={$form.password_confirmation}
                                required
                            />
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-soft btn-primary mt-4 w-full"
                        disabled={$form.processing}>Create my account</button
                    >

                    <div class="divider max-w-sm mx-auto">OR</div>

                    <div class="text-center">
                        If you already have an account, <a
                            href="/login"
                            class="link">click here to login</a
                        >.
                    </div>
                </form>
            </div>
        </div>
    </div>
</Layout>
