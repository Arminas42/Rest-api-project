<?php
    include 'header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

<div class="ml-5"><p id="currency"></p><p id="lastPrice"></p><p id="newPrice"></p>
    <form action="includes/buycrypto.inc.php" method="POST" class="justify-content-center">
        <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="givenId" />
        <label for="bp">By price</label>
        <input id="bp" type="text" name="price">
        <label for="bv">By volume</label>
        <input id="bv" type="text" name="volume">
        <button type="submit" class="btn btn-primary" name="buy">Buy KCE</button>
    </form>
    <form action="includes/sell.inc.php" method="POST" class="justify-content-center">
        <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="givenId" />
        <label for="sp">By price</label>
        <input id="sp" type="text" name="price">
        <label for="sv">By volume</label>
        <input id="sv" type="text" name="volume">
        <button type="submit" class="btn btn-primary" name="sell">Sell KCE</button>
    </form>
    <form action="includes/buyusd.inc.php" method="POST" class="justify-content-center">
        <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="givenId" />
        <label for="sd">Money</label>
        <input id="sd" type="text" name="money">
        <button type="submit" class="btn btn-success" name="buyUsd">Buy USD</button>
    </form>
    <form action="includes/transfer.inc.php" method="POST" class="justify-content-center">
        <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" name="idofuser" />
        <label for="d">KCE to transfer</label>
        <input id="d" type="text" name="kce">
        <label for="a">To (user name)</label>
        <input id="a" type="text" name="name">
        <button type="submit" class="btn btn-warning" name="transfer">Transfer KCE</button>
    </form>
    </div>
</body>
<script>
var price = document.getElementById('lastPrice');
var newPriceDiv = document.getElementById('newPrice');
var Data = [];
var newPrice;
//var newPrice = Data[0].price + (Data[0].price + (getRndInteger(-5,5)/100));
//newPriceDiv.innerText = String(getRndInteger(-5,5));
var id = <?php if(isset($_SESSION['userId'])){echo $_SESSION['userId'];}?>;
var currency = document.getElementById('currency');
//pasiimt reiksme paskutines kainos, 
window.addEventListener('load', function(){
        var xml = new XMLHttpRequest();
        var url = "includes/getLastPrice.inc.php";
        
        xml.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                Data = JSON.parse(this.responseText);
                console.log(Data[0].price);
                price.innerText = String(Data[0].price) + " was the last price";
                newPrice = calcPrice(Data[0].price);
                console.log(newPrice);
                newPriceDiv.innerText = String(newPrice) + " is the new price";
                //price.innerText = "last price";
            }
        };
        xml.open("GET", url, true);
        xml.send();
        var ajax = new XMLHttpRequest();
        var url = "includes/getUserCurrency.inc.php";
        var vars = "input="+ id;
        var wholeData = [];
        //nusiunciame
        ajax.open("POST", url, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200){
                    wholeData = JSON.parse(this.responseText);
                    currency.innerText = "Your " + String(wholeData[0].KCE) + " KCE Your " +String(wholeData[0].USD) +" USD";
                    console.log(wholeData);
                    
                }
            }
        ajax.send(vars);
        
    })
var priceBuyInput = document.getElementById('bp');
var volumeBuyInput = document.getElementById('bv');
var priceSellInput = document.getElementById('sp');
var volumeSellInput = document.getElementById('sv');
priceBuyInput.addEventListener('input', function(){
    volumeBuyInput.value = priceBuyInput.value/newPrice;
})
volumeBuyInput.addEventListener('input', function(){
    priceBuyInput.value = volumeBuyInput.value*newPrice;
})
priceSellInput.addEventListener('input', function(){
    volumeSellInput.value = priceSellInput.value/newPrice;
})
volumeSellInput.addEventListener('input', function(){
    priceSellInput.value = volumeSellInput.value*newPrice;
})

function calcPrice (data){
    var d = parseFloat(data);
    var x = getRndInteger(-5,5)/100;
    x = x * data;
    x = x + d;
    return x;
}
function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}
</script>
</html>