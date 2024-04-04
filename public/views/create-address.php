<div class="w-full flex justify-center py-[4.5rem]">
        <form method="POST" action="/baumarkt2/addressen" class="text-[#595959] flex flex-col gap-[.7rem] w-[30rem]">
            <input type="hidden" name="action" value="createAddress" />
            <p class="italic mb-[.3rem]">Tragen Sie bitte Ihre Versanddaten ein</p>
            <div>
                <p class="text-[.85rem]">NAME UND VORNAME EINGEBEN</p>
                <input class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" 
                id="vers_name" 
                type="text" 
                name="new_address[vers_name]" 
                placeholder="Vor-/Nachname..">
            </div>
            <div>
                <p class="text-[.85rem]">EMAIL EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="email" 
                type="email" 
                name="new_address[email]" 
                placeholder="Email..">
            </div>

            
            <div>
                <p class="text-[.85rem]">TELEFON EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="telefon" 
                type="text" 
                name="new_address[telefon]" 
                placeholder="Telefon.."> 
            </div>


            <div>
                <p class="text-[.85rem]">STRASSE EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="vers_strasse" 
                type="text" 
                name="new_address[vers_strasse]" 
                placeholder="Strasse.."> 
            </div>

            <div>
                <p class="text-[.85rem]">STADT EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="vers_ort" 
                type="text" 
                name="new_address[vers_ort]" 
                placeholder="Stadt..">
            </div> 

            <div>
                <p class="text-[.85rem]">PLZ EINGEBEN</p>
                <input
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" 
                id="vers_postl" 
                type="text" 
                name="new_address[vers_postl]"
                placeholder="PLZ.."> 
            </div>

            <div>
                <p class="text-[.85rem]">STAAT EINGEBEN</p>
                <select  class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" name="new_address[staat]">
                    <?php
                        foreach($stateName as $index => $state) {
                            echo '1';
                    ?>
                    
                        <option value="<?php echo $state ?>"><?php echo $state ?></option>
                    <?php
                            }
                    ?>
                </select>
            </div>
            <button class="mt-[1rem] text-white bg-[#6999c9] py-[.1rem] px-[1.4rem] rounded-[.3rem] w-[10rem]">
                Speichern
            </button>
        </form>
    </div>