const urlApi = "http://localhost/API_INVENTARIO/Api_inventario/backend/salidas";
let ListaSalida = [];
let idSalida = 0;
let Salida = null;

function indexApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            ListaSalida  = response.data;
            asignarDatosTablaHtml();
        }
    };
    xhttp.open("GET", urlApi, true);
    xhttp.send();
}
indexApi();

function asignarDatosTablaHtml() {
    let html = '';
    for (let item of ListaSalida) {
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
    const element = document.getElementById('ListaSalida').getElementsByTagName('tbody')[0];
    element.innerHTML = html;
}

function datailApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            Salida = response.data;
        }
    };
    xhttp.open("GET", urlApi + '/' + idSalida, false);
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
    let param = idSalida > 0 ? '/' + idSalida : '';
    let metodo = idSalida > 0 ? 'PUT' : 'POST';
    xhttp.open(metodo, urlApi + param, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}

function crear() {
    idSalida = 0;
    Salida = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Registrar datos Salida';
    document.getElementById('id').value;
    document.getElementById('fecha').value;
    document.getElementById('cantidad').value;
    document.getElementById('persona_id').value;
    document.getElementById('objecto_inventario_id').value;
}



function modificar(id) {
    console.log(id);
    idSalida = id;
    Salida = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Modificar datos Salida';
    datailApi();
    if (Salida != null) {
        document.getElementById('id').value = Salida.id;
        document.getElementById('fecha').value = Salida.fecha;
        document.getElementById('cantidad').value = Salida.cantidad;
        document.getElementById('persona_id').value = Salida.persona_id;
        document.getElementById('objecto_inventario_id').value = Salida.objecto_inventario_id;
    }
}

function eliminar(id) {
    console.log(id);
    idSalida = id;
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            idSalida = 0;
            Salida = null;
            indexApi();
        }
    };
    xhttp.open("DELETE", urlApi + '/' + idSalida, false);
    xhttp.send();
}

function ver(id) {
    console.log(id);
    idSalida = id;
    Salida = null;
    datailApi();
    if (Salida != null) {
        document.getElementById('idLb').innerText = Salida.id;
        document.getElementById('fechaLb').innerText = Salida.fecha;
        document.getElementById('cantidadLb').innerText = Salida.cantidad;
        document.getElementById('personaLb').innerText = Salida.persona_id;
        document.getElementById('objecto_inventario_idLb').innerText = Salida.objecto_inventario_id;
    }
}
