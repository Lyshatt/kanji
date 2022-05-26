<template>
    <div>
        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">商</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                Handel treiben, handeln
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    ショウ
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    あきな.う
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 0" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>あきなう</div>
                                            <div>Handel mit (Handelswaren)</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(0)" >商う</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 1" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ショウニン</div>
                                            <div>Kaufmann, Händler</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(1)" >商人</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 2" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ショウヒン</div>
                                            <div>Ware</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(2)" >商品</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 3" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ショウギョウ</div>
                                            <div>Handel, Geschäft</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(3)" >商業</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 4" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>カイショウ</div>
                                            <div>Verhandlungen</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(4)" >会商</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 5" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ショウムショウ</div>
                                            <div>Handelsabteilung</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(5)" >商務省</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">産</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                Geburt; Produktion; Vermögen <br>
                                gebären; erzeugen
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    サン
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    う.む
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    う.まれる
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    うぶ
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 11" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュッサン</div>
                                            <div>Entbindung, Geburt</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(11)" >出産</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 12" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>セイサン</div>
                                            <div>Herstellung, Produktion</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(12)" >生産</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 13" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>サンブツ</div>
                                            <div>Produkt, Erzeugnis</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(13)" >産物</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 14" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>コクサン</div>
                                            <div>einheimische Produktion</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(14)" >国産</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 15" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>フドウサン</div>
                                            <div>Immobilien; Grundstück</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(15)" >不動産</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Anmerkungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                - "gebären" normalerweise als 生む geschrieben <br>
                                - "geborden werden" normalerweise als 生まれる geschrieben <br>
                                - nicht zu verwechseln mit 埋まる
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">示</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                zeigen
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    ジ
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    シ
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    しめ.す
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 20" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>しめす</div>
                                            <div>zeigen</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(20)" >示す</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 21" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>コウジ</div>
                                            <div>amtliche Bekanntmachung</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(21)" >公示</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 22" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>アンジ</div>
                                            <div>Andeutung; Suggestion</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(22)" >暗示</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 23" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>メイジ</div>
                                            <div>deutlich zeigen, klare Darlegung</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(23)" >明示</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 24" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>キョウジ</div>
                                            <div>Belehrung, Unterricht</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(24)" >教示</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 25" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ヒョウジ</div>
                                            <div>Ausdruck, Anzeige</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(25)" >表示</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">祝</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                feiern, gratulieren
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    シュク
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    [シュウ]
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    いわ.う
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 30" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>いわう</div>
                                            <div>feiern</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(30)" >祝う</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 31" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュクジツ</div>
                                            <div>Feiertag; Festtag</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(31)" >祝日</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 32" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュクショウ</div>
                                            <div>Siegesfeier</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(32)" >祝勝</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 33" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュクブン</div>
                                            <div>Glückwünsche, Gratulationsschreiben</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(33)" >祝文</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 34" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュウギ</div>
                                            <div>(Hochzeits-)Feier, Geschenk (zum besonderen Anlass)</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(34)" >祝儀</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 35" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>いわいごと</div>
                                            <div>freudiger Anlass; Anlass zum Feiern</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(35)" >祝い事</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">祭</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                anbeten, verehren <br>
                                Feier, Fest
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    サイ
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    まつ.る
                                </span>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    まつ.り
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 40" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>まつる</div>
                                            <div>anbeten</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(40)" >祭る</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 47" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>まつり</div>
                                            <div>Fest</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(47)" >祭り</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 41" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>サイジツ</div>
                                            <div>Feiertag; Festtag</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(41)" >祭日</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 42" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ヒャクネンサイ</div>
                                            <div>Hundertjahrfeier</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(42)" >百年祭</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 43" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>シュクサイ</div>
                                            <div>Fest, Festival, Feier</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(43)" >祝祭</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 44" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>サイシ</div>
                                            <div>Priester</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(44)" >祭司</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 45" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>あきまつり</div>
                                            <div>Herbstfest</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(45)" >秋祭り</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 46" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ドクリツサイ</div>
                                            <div>Unabhängigkeitstag (USA)</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(46)" >独立祭</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 400px;" class="bg-white rounded shadow p-3 mb-4">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 flex items-center justify-center bg-sky-900 rounded text-white mb-3 md:mb-0 relative">
                    <div class="hider-box absolute w-full h-full bg-sky-900 rounded cursor-pointer" @click="removeSelf"></div>
                    <div class="text-9xl text-center my-5">禁</div>
                </div>
                <div class="w-full md:w-2/3 md:pl-3">
                    <div class="mb-3">
                        <div class="text-xl mb-1">Bedeutung</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                Verbot
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Lesungen</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer" @click="removeSelf"></div>
                            <div>
                                <span class="mr-1 my-1 p-1 bg-gray-100">
                                    キン
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-xl mb-1">Wörter</div>
                        <div class="relative">
                            <div class="hider-box absolute w-full h-full bg-gray-300 cursor-pointer z-10" @click="removeSelf"></div>
                            <div class="Wörter">

                                <div>
                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 51" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>キンシ</div>
                                            <div>Verbot (auch als する-Verb)</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(51)" >禁止</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 52" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>たちいりキンシ</div>
                                            <div>„Betreten verboten!“</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(52)" >立ちいり禁止</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 53" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>キンモツ</div>
                                            <div>verbotene Sache, Tabu</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(53)" >禁物</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 54" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>ハッキン</div>
                                            <div>Verkaufsverbot (Abkürzung für 発売禁止 / ハツバイキンシ)</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(54)" >発禁</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 55" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>キンじる</div>
                                            <div>verbieten, untersagen</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(55)" >禁じる</div>
                                    </div>

                                    <div class="word-container inline-block mr-1 my-1 p-1 bg-gray-100 relative z-0 outline-1">
                                        <div style="transform: translate(-50%, -100%); top: -5px; left: 50%; width: max-content;" :id="'word-data-' + 56" class="word-data absolute bg-white z-20 rounded p-1 text-xs border-2 border-gray-500 hidden text-center">
                                            <div>キンずる</div>
                                            <div>verbieten; (Gefühle) unterdrücken</div>
                                        </div>

                                        <div class="word cursor-pointer" @click="toggleWordData(56)" >禁ずる</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            return { }
        },

        mounted() {
        },

        updated() {

        },

        computed: {},

        methods: {
            removeSelf(e) {
                if(!e.target.classList.contains("hidden")) {
                    e.target.classList.add("hidden");
                }
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
                let containersOfAllWörter = document.querySelectorAll('.Wörter');

                if(containersOfAllWörter) {
                    containersOfAllWörter.forEach(function (containerOfAllWörter) {
                        let allContainersOfSingleWörter = containerOfAllWörter.querySelectorAll('.word-container');

                        allContainersOfSingleWörter.forEach(function (element) {
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
                    });

                }
            },

        }
    }
</script>
