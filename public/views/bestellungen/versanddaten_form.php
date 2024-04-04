<form class="bestellung cont" method="POST" action="/baumarkt2/bestellung">
        <input type="hidden" name="action" value="showSummary" />
        <div class="row name_email">
            <div>
                <label for="vers_name"><p>Name</p></label>
                <input id="vers_name" type="text" name="bestellung[vers_name]" placeholder="Vor-/Nachname..">
            </div> 
            <div>
                <label for="email"><p>Email Adresse</p></label>
                <input id="email" type="email" name="bestellung[email]" placeholder="Email.."> 
            </div>
        </div>
        <div class="row">
            <label for="vers_strasse"><p>Strasse</p></label>
            <input id="vers_strasse" type="text" name="bestellung[vers_strasse]" placeholder="Strasse.."> 
        </div>
        <div class="row stadt_plz">
            <div>
                <label for="vers_ort"><p>Stadt</p></label>
                <input id="vers_ort" type="text" name="bestellung[vers_ort]" placeholder="Stadt.."> 
            </div>
            <div>
                <label for="vers_ort"><p>Postleitzahl</p></label>
                <input id="vers_postl" type="text" name="bestellung[vers_postl]" placeholder="PLZ.."> 
            </div>
        </div>
        <div class="row">
            <label for="Staat"><p>Staat</p></label>
            <select name="staat">
                <?php
                    foreach($stateName as $index => $state) {
                ?>
                    <option value="<?php echo $stateCode[$index] ?>"><?php echo $state ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="row">
            <label for="telefon"><p>Telelefon</p></label>
            <input id="telefon" type="text" name="bestellung[telefon]" placeholder="Telefon.."> 
        </div>
        <div class="row">
            <label for="cc_type"><p>Kardentyp</p></label>
            <select id="cc_type" name="bestellung[cc_type]" placeholder="Strasse..">
                        <?php
                            foreach($cc_types as $type) {
                        ?>
                            <option value="<?php echo $type ?>"><?php echo $type ?></option>
                        <?php
                            }
                        ?>
            </select>
        </div>
        <div class="row">
            <label for="cc_number"><p>Kreditkartennummer</p></label>
            <input id="cc_number" type="text" name="bestellung[cc_number]" placeholder="Kreditkartennummer.."> 
        </div>
        <div class="row gultig">
            <label for="gultig"><p>Gultig bis</p></label>
            <div class="selects">
                <select id="gultig" name="bestellung[cc_exp_mo]">
                        <?php
                            foreach($months as $month) {
                        ?>
                            <option value="<?php echo $month ?>"><?php echo $month ?></option>
                        <?php
                            }
                        ?>
                </select>
                <select id="gultig" name="bestellung[cc_exp_da]">
                        <?php
                            for($i = 0; $i <=31; $i++) {
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                        ?>
                </select>
                <select id="gultig" name="bestellung[cc_exp_yr]">
                        <?php
                            $start_yr = date("Y", strtotime($today));
                            for($i = $start_yr; $i <= $start_yr + 7; $i++)  {
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                        ?>
                </select>
            </div>
        </div>
        <button type="submit">
            Speichern
        </button>
    </form>