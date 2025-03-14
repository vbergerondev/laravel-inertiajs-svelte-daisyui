<script>
    import { page } from '@inertiajs/svelte'
</script>

<div class="h-screen flex items-center justify-center">
    <h1 class="text-3xl">Hello {$page.props.auth.user.name}</h1>
</div>
