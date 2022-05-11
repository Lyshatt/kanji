<template>
    <div>
        example component
    </div>
</template>

<script>
    export default {
        props: {
            kanji: Array
        },

        mounted() {
            console.log(this.kanji)
        }
    }
</script>
