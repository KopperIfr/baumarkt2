<div>
    <h1 class="home_title"><?php echo $page['top'] ?></h1>
    <p class="home_choose"><?php echo $page['top2'] ?></p>
</div>
<div class="home_cont_kategorien">
    <div class="kateins_cont">
        <?php 
            foreach ($kategorien as $kateins) {
                echo "<div class='kateins'>";
                echo "<h3>". $kateins['name']. "</h3>";
                echo "<div class='katzwei'>";
                echo "<div class='bg-gradient'></div>";
                echo "<div class='slider'>";
                foreach ($kateins['sub_categories'] as $katzwei) {
                    echo "<div class='link_cont'>";
                    echo "<div class='bg'></div>";
                    echo "<img src='". $katzwei['img'] ."' />";
                    echo "<a class='link' href='/baumarkt2/products/categories/". 
                    strtolower($katzwei['name'] ). "/". $katzwei['id'] ."'>". $katzwei['name'] ."</a>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>