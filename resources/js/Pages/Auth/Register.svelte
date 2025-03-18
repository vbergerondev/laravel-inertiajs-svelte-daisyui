<script>
    import { useForm } from '@inertiajs/svelte'

    let form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
    })

    function submit(e) {
        e.preventDefault()
        $form.post('/register', {
            onError: () => $form.reset('password', 'password_confirmation'),
        })
    }

</script>

<div class="h-screen flex justify-center items-center">
    <div class="card md:min-w-lg">
        <div class="card-body">
            <form onsubmit={submit}>
                <div class="space-y-4">
                    <div>
                        <label for="name" class="fieldset-label">Name</label>
                        <!-- svelte-ignore a11y_autofocus -->
                        <input type="text" id="name" class="input w-full" class:input-error={$form.errors.name} bind:value={$form.name} autofocus required />
                        {#if $form.errors.name}
                            <p class="text-error">{$form.errors.name}</p>
                        {/if}
                    </div>

                    <div>
                        <label for="email" class="fieldset-label">Email</label>
                        <input type="email" id="email" class="input w-full" class:input-error={$form.errors.email} bind:value={$form.email} required />
                        {#if $form.errors.email}
                            <p class="text-error">{$form.errors.email}</p>
                        {/if}
                    </div>

                    <div>
                        <label for="password" class="fieldset-label">Password</label>
                        <input type="password" id="password" class="input w-full" class:input-error={$form.errors.password} bind:value={$form.password} required />
                        {#if $form.errors.password}
                            <p class="text-error">{$form.errors.password}</p>
                        {/if}
                    </div>

                    <div>
                        <label for="password_confirmation" class="fieldset-label">Password confirmation</label>
                        <input type="password" id="password_confirmation" class="input w-full" bind:value={$form.password_confirmation} required />
                    </div>
                </div>

                <button type="submit" class="btn btn-neutral mt-4 w-full" disabled={$form.processing}>Login</button>

            </form>
        </div>
    </div>
</div>
