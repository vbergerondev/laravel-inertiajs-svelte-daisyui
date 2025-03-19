<script>
    import FlashMessage from "./FlashMessage.svelte";
    let { children } = $props()
</script>

<FlashMessage />

<main>
    {@render children()}
</main>
