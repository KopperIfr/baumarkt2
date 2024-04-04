<?php 
    if($versandAddresseData !== null && $userLoged === true && $change === 'false') {
?>

<div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black pb-[4.5rem]">
    <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
        <b>1.</b><h2> Versandaddresse</h2>
    </div>
    <div class="text-[#595959] flex flex-col gap-[.4rem] w-[20rem]">
        <p><?php echo $versandAddresseData['vers_name'] ?></p>
        <p><?php echo $versandAddresseData['vers_strasse'] ?></p>
        <p><?php echo $versandAddresseData['vers_ort'] ?></p>
        <p>PLZ <?php echo $versandAddresseData['vers_postl'] ?></p>
        <p><?php echo $versandAddresseData['staat'] ?></p>
        
        <div class="mt-[1rem]">
            <a href="/baumarkt2/addressen?back=true" 
            class="text-white bg-[#6999c9] py-[.3rem] px-[1.4rem] rounded-[.3rem]">
                Andere versandaddresse wählen
            </a>
        </div>
    </div>
</div>

<?php 
    } elseif($versandAddresseData === null && $userLoged === true && $change = 'false') {
?>


<div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black pb-[4.5rem]">
    <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
        <b>1.</b><h2> Versandaddresse</h2>
    </div>
    <div class="text-[#595959] flex flex-col gap-[.4rem] w-[20rem]">
        <div class="mt-[1rem]">
            <a href="/baumarkt2/addressen?back=true" 
            class="text-white bg-[#6999c9] py-[.3rem] px-[1.4rem] rounded-[.3rem]">
                Versandaddresse erstellen
            </a>
        </div>
    </div>
</div>

<?php 
    } elseif($versandAddresseData !== null && $change === 'false') {
?>


<div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black pb-[4.5rem]">
    <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
        <b>1.</b><h2> Versandaddresse</h2>
    </div>
    <div class="text-[#595959] flex flex-col gap-[.4rem] w-[20rem]">
        <p><?php echo $versandAddresseData['vers_name'] ?></p>
        <p><?php echo $versandAddresseData['vers_strasse'] ?></p>
        <p><?php echo $versandAddresseData['vers_ort'] ?></p>
        <p>PLZ <?php echo $versandAddresseData['vers_postl'] ?></p>
        <p><?php echo $versandAddresseData['staat'] ?></p>
        
        <div class="mt-[1rem]">
            <a href="/baumarkt2/bestellungen?action=showCreateBestellung&change=true" 
            class="text-white bg-[#6999c9] py-[.3rem] px-[1.4rem] rounded-[.3rem]">
                Verändern
            </a>
        </div>
    </div>
</div>

<?php } else { ?>


    <div class="w-[70rem] flex gap-x-[8rem] border-b-[.1rem] border-black pb-[4.5rem]">
        <div class="text-[1.6rem] font-medium flex gap-x-[1rem] w-[20rem]">
            <b>1.</b><h2> Versandaddresse</h2>
        </div>
        <form method="POST" action="/baumarkt2/bestellungen" class="text-[#595959] flex flex-col gap-[.7rem] w-[30rem]">
            <input type="hidden" name="action" value="showCreateBestellung" />
            <input type="hidden" name="change" value="false" />
            <p class="italic mb-[.3rem]">Tragen Sie bitte Ihre Versanddaten ein</p>
            <div>
                <p class="text-[.85rem]">NAME UND VORNAME EINGEBEN</p>
                <input class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" 
                id="vers_name" 
                type="text" 
                name="versandAddresse[vers_name]" 
                placeholder="Vor-/Nachname.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['vers_name']."'"; ?>>
            </div>
            <div>
                <p class="text-[.85rem]">EMAIL EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="email" 
                type="email" 
                name="versandAddresse[email]" 
                placeholder="Email.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['email']."'"; ?>>
            </div>

            
            <div>
                <p class="text-[.85rem]">TELEFON EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="telefon" 
                type="text" 
                name="versandAddresse[telefon]" 
                placeholder="Telefon.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['telefon']."'"; ?>> 
            </div>


            <div>
                <p class="text-[.85rem]">STRASSE EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="vers_strasse" 
                type="text" 
                name="versandAddresse[vers_strasse]" 
                placeholder="Strasse.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['vers_strasse']."'"; ?>> 
            </div>

            <div>
                <p class="text-[.85rem]">STADT EINGEBEN</p>
                <input 
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]"
                id="vers_ort" 
                type="text" 
                name="versandAddresse[vers_ort]" 
                placeholder="Stadt.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['vers_ort']."'"; ?>>
            </div> 

            <div>
                <p class="text-[.85rem]">PLZ EINGEBEN</p>
                <input
                class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" 
                id="vers_postl" 
                type="text" 
                name="versandAddresse[vers_postl]"
                placeholder="PLZ.."
                <?php if($versandAddresseData) echo "value='".$versandAddresseData['vers_postl']."'"; ?>> 
            </div>

            <div>
                <p class="text-[.85rem]">STAAT EINGEBEN</p>
                <select  class="w-full border-[.1rem] border-[#dedede] py-[.3rem] px-[.3rem]" name="versandAddresse[staat]">
                    <?php
                        if($versandAddresseData) echo "<option value='".$versandAddresseData['staat']."'>". $versandAddresseData['staat'] ."</option>";
                        foreach($stateName as $index => $state) {
                            if($state !== $versandAddresseData['staat']) {
                    ?>
                        <option value="<?php echo $state ?>"><?php echo $state ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <button class="mt-[1rem] text-white bg-[#6999c9] py-[.1rem] px-[1.4rem] rounded-[.3rem] w-[10rem]">
                Speichern
            </button>
        </form>
    </div>
<?php 
}
?>