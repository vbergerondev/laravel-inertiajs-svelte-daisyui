<script>
    import Layout from "../../Layout.svelte";
    import { useForm } from "@inertiajs/svelte";

    let form = useForm({
        email: "",
    });

    function submit(e) {
        e.preventDefault();
        $form.post("/forgot-password", {
            onSuccess: () => $form.reset("email"),
        });
    }
</script>

<svelte:head>
    <title>Forgot password</title>
</svelte:head>

<Layout>
    <div class="h-screen flex justify-center items-center">
        <div class="card md:min-w-lg">
            <div class="card-body space-y-8">
                <h1 class="text-xl font-semibold text-center">
                    Forgot password
                </h1>
                <form onsubmit={submit}>
                    <div>
                        <label for="email" class="fieldset-label">Email</label>
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
