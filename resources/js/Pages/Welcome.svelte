<script>
    import Layout from '../Layout.svelte'
</script>

<svelte:head>
    <title>Welcome</title>
</svelte:head>

<Layout>
    <div class="h-screen flex flex-col items-center justify-center space-y-6">
        <h1 class="text-3xl">Laravel + InertiaJs + Svelte + DaisyUI starter kit</h1>
        <a href="/login" class="btn btn-soft btn-primary">Login</a>
    </div>
</Layout>
