<script>
    import { page, router } from "@inertiajs/svelte";
    import Layout from "../Layout.svelte";

    const logout = () => router.post("/logout");
</script>

<svelte:head>
    <title>Home</title>
</svelte:head>

<Layout>
    <div class="h-screen flex flex-col items-center justify-center space-y-6">
        <h1 class="text-3xl">Hello, {$page.props.auth.user.name}</h1>
        <button class="btn btn-lg btn-primary" onclick={logout}>Logout</button>
    </div>
</Layout>
