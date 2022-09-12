 var valorTotal = 10;
function definirValor(_valor) {
    valorTotal = _valor;
    document.querySelector('#totalDeCompra').innerHTML = 'Total de compra: $' + _valor;
    document.querySelector('.paypal-btn-container').style.display = 'block';
    document.getElementById("precio_item").value = _valor;
}

//  paypal.Button.render({
//      env: 'sandbox',
//      style:{
//          color: 'blue',
//          //size: 'small',
//          shape: 'rect'
//      },
//      commit: true,
//      locale:"es_ES",
//      client: {
//          sandbox: 'AY9LOzb0f1aU_5Xz7NkW-Bwz5JRrDdPV_6ossVtqzbPrqvjb3jAZc8jEp-lsv17Q0FlQfGqpLKs4GCkO',    
//      },
//      payment: function () {
//          return paypal.rest.payment.create(this.props.env, this.props.client, {
//              transactions: [{
//                  amount: {
//                      total: valorTotal,
//                      currency: 'USD'
//                  }
//              }]
//          });
//      },
//      onAuthorize: function (data, actions) {
//          return actions.payment.execute().then(function(){
//             document.querySelector('#confirmacion').style.display = 'block';
//             document.querySelector('#compra').style.display = 'none';
//             document.querySelector('.paypal-btn-container').style.display = 'none';
//          })
//      }
//  }, "#mi-boton-paypal")


