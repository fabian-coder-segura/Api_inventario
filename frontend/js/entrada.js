const urlApi = "http://localhost/API_INVENTARIO/Api_inventario/backend/entradas";
let ListaEntrada = [];
let idEntrada = 0;
let Entrada = null;

function indexApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            ListaEntrada  = response.data;
            asignarDatosTablaHtml();
        }
    };
    xhttp.open("GET", urlApi, true);
    xhttp.send();
}
indexApi();

function asignarDatosTablaHtml() {
    let html = '';
    for (let item of ListaEntrada) {
        console.log(item);
        html += '<tr>';
        html += '    <td>' + item.id + '</td>';
        html += '    <td>' + item.fecha + '</td>';
        html += '    <td>' + item.cantidad + '</td>';
        html += '    <td>' + item.persona_id + '</td>';
        html += '    <td>' + item.objecto_inventario_id + '</td>';
        html += '    <td>';
        html += '        <div class="contentButtons">';
        html += '            <button type="button" class="btn btn-light" onclick="ver(' + item.id + ')">Ver detalle</button>';
        html += '            <button type="button" class="btn btn-primary" onclick="modificar(' + item.id + ')">Modificar</button>';
        html += '            <button type="button" class="btn btn-danger" onclick="eliminar(' + item.id + ')">Eliminar</button>';
        html += '        <div>';
        html += '    </td>';
        html += '</tr>';
    }
    if (html == '') {
        html += '<tr>';
        html += '    <td class="3">No hay datos registrados</td>';
        html += '</tr>';
    }
    const element = document.getElementById('ListaEntrada').getElementsByTagName('tbody')[0];
    element.innerHTML = html;
}

function datailApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            Entrada = response.data;
        }
    };
    xhttp.open("GET", urlApi + '/' + idEntrada, false);
    xhttp.send();
}


function saveDataForm(event) {
    event.preventDefault();
    let data = 'id=' + document.getElementById('id').value;
    data += '&fecha=' + document.getElementById('fecha').value;
    data += '&cantidad=' + document.getElementById('cantidad').value;
    data += '&persona_id=' + document.getElementById('persona_id').value;
    data += '&objecto_inventario_id=' + document.getElementById('objecto_inventario_id').value;
    save(data);
}

function save(data) {
    let reponse = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            reponse = JSON.parse(this.response);
            console.log(reponse);
            indexApi();
        }
    };
    let param = idEntrada > 0 ? '/' + idEntrada : '';
    let metodo = idEntrada > 0 ? 'PUT' : 'POST';
    xhttp.open(metodo, urlApi + param, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}

function crear() {
    idEntrada = 0;
    Entrada = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Registrar datos Entrada';
    document.getElementById('id').value;
    document.getElementById('fecha').value;
    document.getElementById('cantidad').value;
    document.getElementById('persona_id').value;
    document.getElementById('objecto_inventario_id').value;
}



function modificar(id) {
    console.log(id);
    idEntrada = id;
    Entrada = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Modificar datos Entrada';
    datailApi();
    if (Entrada != null) {
        document.getElementById('id').value = Entrada.id;
        document.getElementById('fecha').value = Entrada.fecha;
        document.getElementById('cantidad').value = Entrada.cantidad;
        document.getElementById('persona_id').value = Entrada.persona_id;
        document.getElementById('objecto_inventario_id').value = Entrada.objecto_inventario_id;
    }
}

function eliminar(id) {
    console.log(id);
    idEntrada = id;
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            idEntrada = 0;
            Entrada = null;
            indexApi();
        }
    };
    xhttp.open("DELETE", urlApi + '/' + idEntrada, false);
    xhttp.send();
}

function ver(id) {
    console.log(id);
    idEntrada = id;
    Entrada = null;
    datailApi();
    if (Entrada != null) {
        document.getElementById('idLb').innerText = Entrada.id;
        document.getElementById('fechaLb').innerText = Entrada.fecha;
        document.getElementById('cantidadLb').innerText = Entrada.cantidad;
        document.getElementById('personaLb').innerText = Entrada.persona_id;
        document.getElementById('objecto_inventario_idLb').innerText = Entrada.objecto_inventario_id;
    }
}
