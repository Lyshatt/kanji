<template>
    <div>
        <div class="text-sky-900">Progress</div>
        <div class="flex mb-2">
            <div class="flex flex-1">
                <div class="bg-sky-900" :style="{height: '20px', width: getProgressPercentage() + '%'}"></div>
                <div class="bg-gray-300" :style="{height: '20px', width: 100 -getProgressPercentage() + '%'}"></div>
            </div>
            <div class="pl-1">{{ initialKanjiAmount - kanjiStack.length }}/{{ initialKanjiAmount }}</div>
        </div>


        <div v-if="kanjiStack.length > 0">
            <div class="bg-white rounded shadow p-3 mb-4">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0">
                        <div class="text-9xl text-center my-5">{{ activeKanji.symbol }}</div>
                    </div>
                    <div class="w-full md:w-2/3 md:pl-3">
                        <div class="mb-3">
                            <div class="flex justify-between">
                                <div class="text-xl mb-1">Meaning</div>
                                <button class="bg-sky-900 text-white text-xs rounded my-1 px-2" @click="revealAll">reveal all</button>
                            </div>
                            <div class="relative">
                                <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                                <div v-if="activeKanji.kun_meaning && activeKanji.kun_meaning !== '-'">
                                    <span class="font-bold">Kun:</span> {{ activeKanji.kun_meaning }}
                                </div>
                                <div v-if="activeKanji.on_meaning && activeKanji.on_meaning !== '-'">
                                    <span class="font-bold">On:</span> {{ activeKanji.on_meaning }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" v-if="activeKanji.readings.length > 0">
                            <div class="text-xl mb-1">Readings</div>
                            <div class="relative">
                                <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                                <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100" v-for="reading in activeKanji.readings">
                                    {{ reading.reading }}
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"  v-if="activeKanji.common_words.length > 0 || activeKanji.uncommon_words.length > 0">
                            <div class="text-xl mb-1">Words</div>
                            <div class="relative">
                                <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                                <div class="words">
                                    <div v-if="activeKanji.common_words.length > 0">
                                        <div class="text-sm">Common: </div>
                                        <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1" v-for="commonWord in activeKanji.common_words">
                                            <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + commonWord.id" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center" v-if="commonWord.reading || commonWord.meaning">
                                                <div>{{commonWord.reading}}</div>
                                                <div>{{commonWord.meaning}}</div>
                                            </div>

                                            <div class="word" @click="toggleWordData(commonWord.id)" :class="{'cursor-pointer': commonWord.reading || commonWord.meaning}">{{ commonWord.word }}</div>
                                        </div>
                                    </div>
                                    <div v-if="activeKanji.uncommon_words.length > 0">
                                        <div class="text-sm">Uncommon: </div>
                                        <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1" v-for="uncommonWord in activeKanji.uncommon_words">
                                            <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + uncommonWord.id" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center" v-if="uncommonWord.reading || uncommonWord.meaning">
                                                <div>{{uncommonWord.reading}}</div>
                                                <div>{{uncommonWord.meaning}}</div>
                                            </div>

                                            <div class="word" @click="toggleWordData(uncommonWord.id)" :class="{'cursor-pointer': uncommonWord.reading || uncommonWord.meaning}">{{ uncommonWord.word }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="activeKanji.mnemonic && activeKanji.mnemonic.length > 0">
                            <div class="text-xl mb-1">Mnemonic</div>
                            <div class="relative">
                                <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                                <div>
                                    {{ activeKanji.mnemonic }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button class="bg-sky-900 text-white px-2 py-1 mr-1 rounded" @click="putOnStackAndNextKanji">again later</button>
                <button class="bg-sky-900 text-white px-2 py-1 ml-1 rounded" @click="nextKanji">I knew it!</button>
            </div>
        </div>

        <div v-else>
            <div class="bg-white rounded shadow p-3 mb-4">
            You finished the lesson. How was it? You can start a new lesson from <a class="font-bold text-sky-900 hover:text-sky-700" href="/">here</a>.
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
                activeKanji: {
                    readings: [],
                    common_words: [],
                    uncommon_words: [],
                    mnemonic: ''
                },
                initialKanjiAmount: 0
            }
        },

        mounted() {
            this.activeKanji = this.kanjiStack[0];
            this.initialKanjiAmount = this.kanjiStack.length;
        },

        updated() {
            // this.registerWordContainerListener();
        },

        computed: {},

        methods: {
            putOnStackAndNextKanji() {
                this.closeOpenedWordData();

                document.querySelectorAll('.hider-box').forEach(function (element) {
                    if(element.classList.contains("hidden")) {
                        element.classList.remove("hidden");
                    }
                });

                this.kanjiStack.shift();
                this.kanjiStack.push(this.activeKanji);
                this.activeKanji = this.kanjiStack[0];

            },

            nextKanji() {
                this.closeOpenedWordData();

                document.querySelectorAll('.hider-box').forEach(function (element) {
                    if(element.classList.contains("hidden")) {
                        element.classList.remove("hidden");
                    }
                });

                this.kanjiStack.shift();
                this.activeKanji = this.kanjiStack[0];
            },

            getProgressPercentage() {
                return 100 - (this.kanjiStack.length / this.initialKanjiAmount * 100);
            },

            removeSelf(e) {
                if(!e.target.classList.contains("hidden")) {
                    e.target.classList.add("hidden");
                }
            },

            revealAll() {
                document.querySelectorAll('.hider-box').forEach(function (element) {
                    if(!element.classList.contains("hidden")) {
                        element.classList.add("hidden");
                    }
                });
            },

           toggleWordData(id) {

               this.closeOpenedWordData('word-data-' + id);
               let wordData = document.querySelector('#word-data-' + id);

               if(wordData) {
                   if(wordData.classList.contains("hidden")) {
                       wordData.classList.remove("hidden");
                   } else if (!wordData.classList.contains("hidden")) {
                       wordData.classList.add("hidden");
                   }
               }
           },

            closeOpenedWordData(except = null) {
                let containerOfAllWords = document.querySelector('.words');

                if(containerOfAllWords) {
                    let allContainersOfSingleWords = containerOfAllWords.querySelectorAll('.word-container');

                    allContainersOfSingleWords.forEach(function (element) {
                        let wordData;

                        if(except) {
                            wordData = element.querySelector('.word-data:not(#' + except + ')');
                        } else {
                            wordData = element.querySelector('.word-data');
                        }

                        if(wordData) {
                            if (!wordData.classList.contains("hidden")) {
                                wordData.classList.add("hidden");
                            }
                        }
                    });
                }
            },

        }
    }
</script>
