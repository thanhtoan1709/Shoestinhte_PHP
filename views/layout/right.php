<section>
    <form action="">
        <input type="hidden" name="option" value="showproducts">
        <input type="range" name="range" min="500000" max="10000000" step="500000"
            oninput="document.getElementById('max').innerHTML=this.value"
            value="<?=isset($_GET['range'])?$_GET['range']:""?>">
        <br>
        <span id="max"><?=isset($_GET['range'])?$_GET['range']:""?></span>
        <input type="submit" value="Find">
    </form>
</section>