<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocLink - Espace Patient</title>
    <link rel="icon" href="../../../public/assets/img/cabinet.png">
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="px-5 py-3 bg-white shadow-md fixed w-full">
        <nav class="flex items-center justify-between gap-5">
            <div class="flex items-center gap-6">
                <div id="burger-menu">
                    <i class="fa-solid fa-bars text-2xl cursor-pointer"></i>
                </div>
                <div class="flex items-center gap-1">
                    <img class="w-10" src="../../../public/assets/img/cabinet.png" alt="Logo de DocLink">
                    <h1 class="text-xl font-semibold">Doc<span class="text-blue-800">Link</span></h1>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="#"><img class="w-14 rounded-full border-4 border-blue-500" src="../../../public/assets/img/user.png" alt=""></a>
            </div>
        </nav>

        <section id="links" style="height: calc(100vh - 80px);" class="z-10 absolute top-[80px] left-[-500px] transition-all ease-in duration-500 w-64 bg-white shadow-md py-8 flex flex-col justify-between">
            <div class="flex flex-col items-center justify-center gap-2">
                <img class="w-1/3 rounded-full border-4 border-white" src="../../../public/assets/img/user.png" alt="">
                <h1 class="font-semibold mt-2">Nom Complet</h1>
                <p class="text-xs">Espace Patient</p>
            </div>
            <div class="flex flex-col items-center justify-center gap-2">
                <a href="#" class="flex items-center gap-3 duration-300 hover:bg-gray-200 w-full pl-5 hover:border-r-4 hover:border-gray-400 py-3">
                    <i class="fa-solid fa-chart-simple"></i>
                    <p>RendezVous</p>
                </a>
                <a href="#" class="flex items-center gap-3 duration-300 hover:bg-gray-200 w-full pl-5 hover:border-r-4 hover:border-gray-400 py-3">
                    <i class="fa-solid fa-book-open "></i>
                    <p>Historiques</p>
                </a>
            </div>
            <form method="POST" action="">
                <button name="disconnect" class="flex items-center gap-3 duration-300 hover:bg-gray-200 w-full pl-5 hover:border-r-4 hover:border-gray-400 py-3">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Déconnexion
                </button>
            </form>
        </section>
    </header>

    <main class="bg-gray-100 pt-24 pb-12 px-5">
        
    </main>


    <script src="../../assets/js/main.js"></script>
    <script>
            let list = document.querySelector('#links');
            const menu = document.querySelector('#burger-menu');

            menu.addEventListener('click',function(){
                list.classList.toggle('left-0');
                list.classList.toggle('left-[-500px]');
            });
    </script>
</body>
</html>