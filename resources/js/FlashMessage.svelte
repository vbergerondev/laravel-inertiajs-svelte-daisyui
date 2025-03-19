<script>
    import { page } from '@inertiajs/svelte'
    import { fade } from 'svelte/transition';

    let isVisible = $state($page.props.flash !== null);

    $effect(() => {
        if ($page.props.flash !== null) {
            isVisible = true;

            const timer = setTimeout(() => {
                isVisible = false;
            }, 3000);

            return () => clearTimeout(timer);
        }
    });
</script>

{#if isVisible}
    <div class="toast toast-top toast-center" out:fade={{ duration: 300 }}>
        <div class="alert alert-success">
            <span>
                {$page.props.flash}
            </span>
        </div>
    </div>
{/if}
