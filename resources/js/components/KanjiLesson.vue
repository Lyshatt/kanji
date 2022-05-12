<template>
    <div>
        <div class="text-sky-900">Progress</div>
        <div class="flex mb-2">
            <div class="flex flex-1">
                <div class="bg-sky-900" :style="{height: '20px', width: getProgressPercentage() + '%'}"></div>
                <div class="bg-gray-300" :style="{height: '20px', width: 100 -getProgressPercentage() + '%'}"></div>
            </div>
            <div class="pl-1">{{this.initialKanjiAmount - this.kanjiStack.length}}/{{this.initialKanjiAmount}}</div>
        </div>

        <div class="bg-white rounded shadow p-3 mb-4">
            <div class="flex">
                <div class="w-1/3">
                    <div class="text-9xl">{{activeKanji.symbol}}</div>
                </div>
                <div class="w-2/3">
                    <div>
                        <div>Kun Readings</div>
                        <div>
                            <span class="mr-1 my-1 p-1 bg-gray-100" v-for="kunReading in activeKanji.kun_readings">
                                {{kunReading.reading}}
                            </span>
                        </div>
                    </div>

                    <div>
                        <div>On Readings</div>
                        <div>
                            <span class="mr-1 my-1 p-1 bg-gray-100" v-for="onReading in activeKanji.on_readings">
                                {{onReading.reading}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                {{activeKanji}}
            </div>
            <div>
                <button @click="putOnStackAndNextKanji">again later</button>
                <button @click="nextKanji">i knew it!</button>
            </div>
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
                initialKanjiAmount: 0
            }
        },

        mounted() {
            this.activeKanji = this.kanjiStack[0];
            this.initialKanjiAmount = this.kanjiStack.length;
        },

        computed: {

        },

        methods: {
            putOnStackAndNextKanji() {
                this.kanjiStack.shift();
                this.kanjiStack.push(this.activeKanji);
                this.activeKanji = this.kanjiStack[0];

            },

            nextKanji() {
                this.kanjiStack.shift();
                this.activeKanji = this.kanjiStack[0];
            },

            getProgressPercentage() {
                return 100 - (this.kanjiStack.length / this.initialKanjiAmount * 100);
            }
        }
    }
</script>
