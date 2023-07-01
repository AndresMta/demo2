
let pedidos = [];
let setPedidos = [];

console.log(pedidos)

const botonSubmit = (idBoton, idSpiner) => {
    document.getElementById(idBoton).classList.add('d-none');
    document.getElementById(idSpiner).classList.remove('d-none');
}

function agregarPedido(idPedido) {
    if(!pedidos.includes(idPedido)) {
        pedidos.push(idPedido);
    }

    let tr = ''

    pedidos.forEach(pedido => {
        tr += `<tr>
                    <td class="w-100">
                        <p class='d-flex justify-content-between mb-1'>
                            <span>Pedido ${pedido}</span>
                            <span class='fw-bold text-danger' onclick='eliminarPedido(${pedido})'>X</span>
                        </p>
                        <input form='nuevaDistribucion' type='hidden' name='pedidos[]' value='${pedido}' />
                    </td>
                </tr>`;
    });

    document.getElementById('pedidosTabla').innerHTML = tr;
    console.log('agregarPedido');
    console.log(pedidos);
}

function eliminarPedido(idPedido) {
    pedidos = pedidos.filter(pedido => pedido != idPedido);
    let tr = '';


    pedidos.forEach(pedido => {
        tr += `<tr>
                    <td class="w-100">
                        <p class='d-flex justify-content-between mb-1'>
                            <span>Pedido ${pedido}</span>
                            <span class='fw-bold text-danger' onclick='eliminarPedido(${pedido})'>X</span>
                        </p>
                        <input form='nuevaDistribucion' type='hidden' name='pedidos[]' value='${pedido}' />
                    </td>
                </tr>`;
    });

    document.getElementById('pedidosTabla').innerHTML = tr;
    console.log('eliminarPedido');
    console.log(pedidos);
}

function editarPedidos() {
    let tr = '';

    pedidos.forEach(pedido => {
        tr += `<tr>
                    <td class="w-100">
                        <p class='d-flex justify-content-between mb-1'>
                            <span>Pedido ${pedido}</span>
                            <span class='fw-bold text-danger' onclick='eliminarPedido(${pedido})'>X</span>
                        </p>
                        <input form='nuevaDistribucion' type='hidden' name='pedidos[]' value='${pedido}' />
                    </td>
                </tr>`;
    });

    document.getElementById('pedidosTabla').innerHTML = tr;
    console.log('editarPedidos');
    console.log(pedidos);
}
