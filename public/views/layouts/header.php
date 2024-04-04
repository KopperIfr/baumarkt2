<!-- <header class="header">
    <nav>
        <a href="/baumarkt2/">Home</a>
        <a href="/baumarkt2/bestellungen">Bestellungen</a>
        <a href="/baumarkt2/warenkorb">Warenkorb (<?php
                                                    if (isset($_SESSION['warenkorb'])) {
                                                        echo count($_SESSION['warenkorb']);
                                                    } else {
                                                        echo number_format(0, 0);
                                                    }
                                                    ?>)</a>
        <a href="/baumarkt2/login">Login</a>
    </nav>
</header> -->



<header class='shadow-lg py-12 px-4 sm:px-10 bg-white font-[sans-serif] min-h-[70px] relative'>
    <div class='flex flex-wrap items-center justify-center gap-5'>
        <a href="/baumarkt2/" 
        class="lg:absolute max-lg:top-4 max-lg:left-10 max-sm:left-4 lg:top-2/4 lg:left-10 lg:-translate-y-1/2 relative w-[10rem] h-[6rem]">
            <img class="object-contain w-full h-full" src="/baumarkt2/public/imgs/logo2.png" />
        </a>
        <ul id="collapseMenu" class='lg:!flex lg:space-x-5 max-lg:space-y-2 max-lg:hidden max-lg:py-4 max-lg:w-full'>
            <li class='max-lg:border-b max-lg:bg-[#007bff] max-lg:py-2 px-3 max-lg:rounded'>
                <a href='/baumarkt2/' 
                class='lg:hover:text-[#007bff] text-[#007bff] max-lg:text-white block font-semibold text-[1rem]'>
                Home
                </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'>
                <a href='/baumarkt2/bestellungen' 
                class='lg:hover:text-[#007bff] text-[#333] block font-semibold text-[1rem]'>
                Bestellungen
                </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'>
                <a href='/baumarkt2/warenkorb' 
                class='lg:hover:text-[#007bff] text-[#333] block font-semibold text-[1rem]'>
                Warenkorb(<?php
                            if (isset($_SESSION['warenkorb'])) {
                                echo count($_SESSION['warenkorb']);
                            } else {
                                echo number_format(0, 0);
                            }
                            ?>)
                </a>
            </li>
        </ul>
        <div class='flex items-center absolute right-10'>
            <button class='mr-6 font-semibold text-[1rem] border-none outline-none'>
                <?php 
                    if(isset($_SESSION['userId'])) {?>
                <div
                onclick="handleDropUser()"
                class="flex gap-x-[.5rem] items-center mr-[1rem] relative">
                    <div
                    class='flex justify-center items-center text-white bg-gradient-to-r from-violet-400 to-teal-300 
                    rounded-[50%] p-[.5rem] w-[2.5rem] h-[2.5rem]'>
                        <?php echo ucfirst($_SESSION['userName'][0])?>
                    </div>
                    <i class="fa-solid fa-angle-down text-black/75"></i>
                    <ul
                    id="drop_user"
                    class="hidden absolute left-[-5rem] top-[4rem] w-[10rem] shadow-lg flex flex-col 
                    text-[.9rem] text-start bg-white rounded-[.3rem] border-black/10 border-[.01rem]
                    text-black/75">
                        <li class="hover:bg-black/5 p-[1rem] pr-[1.4rem] border-b-[.01rem] border-black/10">
                            <a class="" 
                            href="/baumarkt/login?action=logout">
                            <i class="fa-solid fa-user text-black/75 mr-[.34rem]"></i>
                            Profile
                            </a>
                        </li>
                        <li class="hover:bg-black/5 p-[1rem]  pr-[1.4rem] border-b-[.01rem] border-black/10">
                            <a href="/baumarkt2/addressen">
                            <i class="fa-regular fa-address-book text-black/75 mr-[.34rem]"></i>
                                Addressen
                            </a>
                        </li>
                        <li class="hover:bg-red-500/5 p-[1rem] pr-[1.4rem] text-red-500">
                            <a href="/baumarkt2/login?action=logout">
                                <i class="fa-solid fa-right-from-bracket mr-[.34rem]"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

                <?php
                    } else {
                ?>
                <a href='/baumarkt2/login' class='text-[#007bff] hover:underline'>
                    Login
                </a>
                <?php }?>
            </button>
            <?php 
                if(!isset($_SESSION['userId'])) {?>
            <button class='px-4 py-2 text-sm rounded-sm font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>

                <a href='/baumarkt2/register' class=''>
                    Sign up
                </a>
            </button>
            <?php
                    }
                ?>
            <button id="toggle" class='lg:hidden ml-7'>
                <svg class="w-7 h-7" fill="#333" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</header>


<script>
    function handleDropUser() {
        console.log('sabe');
        const dropUser = document.querySelector('#drop_user');
        if(dropUser.classList.contains('hidden')) {
            dropUser.classList.remove('hidden');
        } else {
            dropUser.classList.add('hidden');
        }
    }
</script>