document.addEventListener('DOMContentLoaded', function() {
    var priceInput = document.querySelector('#choose_dateand_price_Price');
    var priceValueDisplay = document.querySelector('#priceValue');

   
    priceInput.addEventListener('input', function() {
        priceValueDisplay.textContent = priceInput.value;
    });
});