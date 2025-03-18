<script>
    import { useForm } from '@inertiajs/svelte'

    let form = useForm({
        email: null,
    })

    function submit(e) {
        e.preventDefault()
        $form.post('/forgot-password', {

        })
    }
</script>

<div class="h-screen flex justify-center items-center">
    <div class="card md:min-w-lg">
        <div class="card-body">
            <form onsubmit={submit}>
                <div>
                    <label for="email" class="fieldset-label">Email</label>
                    <!-- svelte-ignore a11y_autofocus -->
                    <input type="email" id="email" class="input w-full" class:input-error={$form.errors.email} placeholder="john@doe.com" bind:value={$form.email} autofocus required />

                    {#if $form.errors.email}
                        <p class="text-error">{$form.errors.email}</p>
                    {/if}
                </div>

                <button type="submit" class="btn btn-neutral mt-4 w-full" disabled={$form.processing}>Submit</button>
            </form>
        </div>
    </div>
</div>
