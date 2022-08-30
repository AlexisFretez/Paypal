 var valorTotal = 10;
function definirValor(_valor) {
    valorTotal = _valor;
    document.querySelector('#totalDeCompra').innerHTML = 'Total de compra: $' + valorTotal;
    // document.querySelector('.paypal-btn-container').style.display = 'block';
    // document.getElementById("precio_item").value = _valor;
}

 paypal.Button.render({
     env: 'sandbox' ,
     client: {
         sandbox: 'AY9LOzb0f1aU_5Xz7NkW-Bwz5JRrDdPV_6ossVtqzbPrqvjb3jAZc8jEp-lsv17Q0FlQfGqpLKs4GCkO',    
     },
     payment: function () {
         return paypal.rest.payment.create(this.props.env, this.props.client, {
             transactions: [{
                 amount: {
                     total: valorTotal,
                     currency: 'USD'
                 }
             }]
         });
     },
     onAuthorize: function (data, actions) {
         
     }
 }, "#mi-boton-paypal")


