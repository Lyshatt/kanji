<template>
    <div>
        <div>Remaining: {{kanjiStack.length}}</div>
        <div>
            {{activeKanji}}
        </div>
        <div>
            <button @click="putOnStackAndNextKanji">again later</button>
            <button @click="nextKanji">i knew it!</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            kanjiStack: Array
        },

        data() {
            return {
                activeKanji: '',

            }
        },

        mounted() {
            this.activeKanji = this.kanjiStack[0];
            this.kanjiStack.shift();
        },

        computed: {

        },

        methods: {
            putOnStackAndNextKanji() {
                this.kanjiStack.push(this.activeKanji);
                this.activeKanji = this.kanjiStack[0];
                this.kanjiStack.shift();
            },

            nextKanji() {
                this.activeKanji = this.kanjiStack[0];
                this.kanjiStack.shift();
            }
        }
    }
</script>
