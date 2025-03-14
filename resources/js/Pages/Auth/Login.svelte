<script>
    import { useForm } from '@inertiajs/svelte'

    let form = useForm({
        email: null,
        password: null,
    })

    function submit(e) {
        e.preventDefault()
        $form.post('/login', {
            onError: () => $form.reset('password'),
        })
    }

</script>

<div class="h-screen flex justify-center items-center">
    <div class="card md:min-w-lg">
        <div class="card-body">
            <form onsubmit={submit}>
                <div class="space-y-4">
                    <div>
                        <label for="email" class="fieldset-label">Email</label>
                        <input type="email" id="email" class="input w-full" class:input-error={$form.errors.email} placeholder="Email" bind:value={$form.email} autofocus />

                        {#if $form.errors.email}
                            <p class="text-error">{$form.errors.email}</p>
                        {/if}
                    </div>

                    <div>
                        <label for="password" class="fieldset-label">Password</label>
                        <input type="password" id="password" class="input w-full" placeholder="Password" bind:value={$form.password} />
                    </div>
                </div>

                <button type="submit" class="btn btn-neutral mt-4" disabled={$form.processing}>Login</button>

            </form>
        </div>
    </div>
</div>
