<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <title>Donkeyquiz - boilerplate</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap');
    </style>

</head>


<body class="font-poppins">
    <div class="container h-screen">





        <div class="whiteDonkey relative" id="whiteDonkey">
            <div class="absolute flex items-right flex-col text-center font-semibold pl-4 pt-4 text-10 2xl:text-24 2xl:pl-12 2xl:pt-10 xl:text-20 xl:pl-12 xl:pt-10 md:text-16 md:pl-12 md:pt-10">
                <img class="w-16 2xl:w-auto xl:w-auto md:w-20 " src="/images/Logo-2.svg">
                <div>donkeyquiz</div>
            </div>


            <div class="flex justify-end 2xl:pt-32 2xl:mb-241 xl:pt-30 md:pt-16">
                <svg viewBox="0 0 70 280" class="w-16 md:w-48 xl:w-64 2xl:w-64 absolute">
                    <path id="blobright" d="" fill="#7678ED"></path>
                </svg>

            </div>
        </div>






        <div class="answerView h-full hidden transition-scale duration-300 scale-0 ease-in" id="answerView">
            <div class="absolute flex items-right flex-col text-center font-semibold pl-12 pt-10 text-white text-10 2xl:text-24 xl:text-20">
                <img class="w-16 2xl:w-auto xl:w-auto md:w-20 " src="/images/Logo-3.svg">

                <div>donkeyquiz</div>
            </div>

            <div class="flex justify-end 2xl:pt-32 xl:pt-20 md:pt-16">


                <svg viewBox="0 0 70 280" class="absolute top-[20px] w-16 md:w-48 xl:w-64 2xl:w-64 ">
                    <path id="blobrightwhite" d="" fill="#ffffff"></path>
                </svg>


            </div>

            <div class="flex items-center flex-col text-center justify-center h-full pt-10 xl:pt-20 md:pt-20">
                <p class="text-10 pt-20 pb-5 text-white 2xl:text-14 xl:text-14 xl:pt-0 md:pt-0 md:text-14">
                    Rätt svar:
                </p>

                <h1 class="text-32 font-semibold w-62 text-lightGreen md:w-1/2 xl:w-1/2 2xl:text-48 xl:text-48 2xl:w-1/2" id="rightAnswer">
                </h1>

                <p class="text-10 pt-2 pb-2 text-white 2xl:text-14 2xl:pt-10 2xl:pb-5 xl:text-14 xl:pt-10 md:text-14 md:pt-10">
                    Svarade du rätt?</p>


                <div class="flex flex-row space-x-4 2xl:mb-48 xl:mb-32 md:mb-20">
                    <button class="border-white border-2 rounded-full px-5 py-2 text-white font-semibold mt-6 mb-10 text-12" id="yesBtn">Ja</button>
                    <button class="border-white border-2 rounded-full px-5 py-2 text-white font-semibold mt-6 mb-10 text-12" id="noBtn">Nej</button>
                </div>

                <div class="bg-white relative w-1/2 border-10 h rounded-full h-0.5  mb-4 dark:bg-white">
                    <div class="bg-white absolute h-2.5 rounded-full dark:bg-white center-y" id="progressBar2"></div>
                </div>


                <p class="text-12 pt-10 text-white 2xl:text-16 xl:text-14 xl:pt-0 mb:pt-0" id="counter">
                </p>

            </div>



            <div class="whiteVector">
                <div class="flex justify-start w-12">
                    <svg viewBox="120 0 70 200" class="w-16 md:w-32 2xl:w-48 xl:w-48 absolute top-[550px]  md:top-[200px] xl:top-[200px] 2xl:top-[200px]">
                        <path id="blobleftwhite" d="" fill="#ffffff"></path>
                    </svg>
                </div>
            </div>

        </div>








        <div class="questionView h-full hidden transition-scale duration-300 scale-0" id="questionView">

            <div class="flex items-center flex-col text-center justify-center h-full">
                <p class="text-14 pt-20 pb-5 text-lightBlue 2xl:pb-0 xl:text-16" id="category">
                </p>

                <h1 class="text-20 font-semibold text-darkBlue 2xl:text-48 2xl:w-[45%] xl:text-32 xl:w-[40%] md:text-24 md:w-[40%]" id="question">
                    <p></p>
                </h1>


                <button class="border-lightBlue border-2 rounded-full px-8 py-3.5 text-lightBlue font-semibold mt-6 mb-10 2xl:mb-48 xl:mb-28" id="getAnswerBtn">Se svaret</button>


                <div class="bg-darkBlue relative w-1/2 rounded-full h-0.5 mb-4 dark:bg-lightBlue">
                    <div class="bg-darkBlue absolute h-2.5 rounded-full dark:bg-darkBlue center-y" id="progressBar"></div>
                </div>



                <p class="text-12 pt-10 text-black 2xl:text-16 xl:text-14 xl:pt-0 mb:pt-0" id="counter2">
                </p>




            </div>
        </div>







        <div class="startView h-full transition-scale duration-300 scale-100 2xl:pb-20" id="startView">
            <div class="flex items-center flex-col text-center justify-center h-full -mt-20">
                <h1 class="text-24 font-semibold text-darkBlue 2xl:text-48 xl:text-32">
                    Svensk mästare i TP?</h1>



                <p class="text-14 mt-8 mb-10 2xl:text-20  2xl:mb-0 2xl:pl-8 2xl:pr-8 2xl:w-1/2 xl:text-20">
                    Utmana vänner, kollegor och familj på frågesport.<br>
                    Svara på 35 samtida frågor i 7 olika kategorier.
                </p>


                <button class="border-lightBlue border-2 rounded-full px-8 py-3.5 text-lightBlue font-semibold 2xl:mt-10 xl:text-16" id="startButton">Klicka här för att starta</button>
            </div>
        </div>



        <div class="vector" id="vector">    
        <svg viewBox="120 0 70 200" class="w-16 top-[550px] md:w-32 md:top-[200px] xl:w-48  2xl:w-48 absolute xl:top-[200px] 2xl:top-[200px]">
            <path id="blobleft" d="" fill="#7678ED"></path>
        </svg>
        </div>





        <div id="scoreView" class="h-full hidden">

            <div class="flex items-center flex-col text-center justify-center h-full 2xl:-m-16 xl:-m-6 ">

                <p class="text-10 pb-3 text-darkBlue 2xl:text-14 2xl:pt-0  xl:text-14 xl:pt-0 md:text-14 md:pt-0">
                    Ditt resultat:
                </p>

                <h1 class="text-24 font-semibold text-darkBlue 2xl:text-48 xl:text-32" id="score">
                    <p></p>
                </h1>




                <div class="allBoxes flex flex-col text-black 2xl:font-semibold 2xl:flex-nowrap 2xl:flex-row 2xl:gap-x-12 2xl:pt-10 text-12 2xl:text-14
        xl:flex-wrap xl:flex-row xl:gap-x-4 xl:pt-10 xl:text-14
        md:flex-wrap md:flex-row md:gap-x-4 md:pt-10 md:text-14">

                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center 2xl:justify-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">

                        <p class="mt-4">Film och tv</p>
                        <div class="movies flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="movies">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>




                    <div class="pointBox flex flex-col
                    2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Geografi</p>
                        <div class="geograph flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="geograph">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>



                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Historia</p>
                        <div class="history flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="history">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>





                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Musik</p>
                        <div class="music flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="music">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>



                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Övrigt</p>
                        <div class="other flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="other">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>


                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Vetenskap</p>
                        <div class="science flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="science">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>

                    <div class="pointBox flex flex-col 2xl:flex-col-reverse 2xl:items-center
        xl:flex-col-reverse xl:items-center xl:justify-center
        md:flex-col-reverse md:items-center md:justify-center">
                        <p class="mt-4">Sport</p>
                        <div class="sports flex space-x-2 2xl:flex-col-reverse 2xl:space-x-0 xl:flex-col-reverse xl:space-x-0
                    md:flex-col-reverse md:space-x-0" id="sports">
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                            <div class="button bg-lightGrey"></div>
                        </div>
                    </div>
                </div>
                <button class="border-lightBlue border-2 rounded-full px-5 py-2 text-lightBlue font-semibold text-14 mt-4 2xl:mt-16 md:mt-14" id="oneMoreTimeBtn">En runda till</button>
            </div>

            <div class="vector" id="vector">
                <div class="flex justify-start">
                <svg viewBox="120 0 70 200" class="absolute md:w-48 xl:w-64 2xl:w-64 ">
            <path id="blobleft" d="" fill="#7678ED"></path></svg>

                </div>
            </div>

        </div>

    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script type="text/javascript" src=>
        "http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    </script>


    <script type="module" crossorigin src="http://localhost:3000/@@vite/client"></script>
    <script type="module" crossorigin src="http://localhost:3000/resources/js/app.js"></script>
</body>

</html>