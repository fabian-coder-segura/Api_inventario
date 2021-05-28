const urlApi = "http://localhost/API_INVENTARIO/Api_inventario/backend/objectos_inventario";
let ListaInventario = [];
let idInventario = 0;
let Inventario = null;

function indexApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            ListaInventario  = response.data;
            asignarDatosTablaHtml();
        }
    };
    xhttp.open("GET", urlApi, true);
    xhttp.send();
}
indexApi();

function asignarDatosTablaHtml() {
    let html = '';
    for (let item of ListaInventario) {
        console.log(item);
        html += '<tr>';
        html += '    <td>' + item.id + '</td>';
        html += '    <td>' + item.nombre + '</td>';
        html += '    <td>' + item.descripcion + '</td>';
        html += '    <td>' + item.disponibilidad + '</td>';
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
    const element = document.getElementById('ListaInventario').getElementsByTagName('tbody')[0];
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
    xhttp.open("GET", urlApi + '/' + idInventario, false);
    xhttp.send();
}


function saveDataForm(event) {
    event.preventDefault();
    let data = 'id=' + document.getElementById('id').value;
    data += '&nombre=' + document.getElementById('nombre').value;
    data += '&descripcion=' + document.getElementById('descripcion').value;
    data += '&disponibilidad=' + document.getElementById('disponibilidad').value;
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
    let param = idInventario > 0 ? '/' + idInventario : '';
    let metodo = idInventario > 0 ? 'PUT' : 'POST';
    xhttp.open(metodo, urlApi + param, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}

function crear() {
    idInventario = 0;
    Inventario = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Registrar datos Inventario';
    document.getElementById('id').value;
    document.getElementById('nombre').value;
    document.getElementById('descripcion').value;


}



function modificar(id) {
    console.log(id);
    idInventario = id;
    Inventario = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Modificar datos Inventario';
    datailApi();
    if (Inventario != null) {
        document.getElementById('id').value = Inventario.id;
        document.getElementById('nombre').value = Inventario.nombre;
        document.getElementById('descripcion').value = Inventario.descripcion;
    }
}

function eliminar(id) {
    console.log(id);
    idInventario = id;
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            idInventario = 0;
            Inventario = null;
            indexApi();
        }
    };
    xhttp.open("DELETE", urlApi + '/' + idInventario, false);
    xhttp.send();
}

function ver(id) {
    console.log(id);
    idInventario = id;
    Inventario = null;
    datailApi();
    if (Inventario != null) {
        document.getElementById('idLb').innerText = Inventario.id;
        document.getElementById('nombreLb').innerText = Inventario.nombre;
        document.getElementById('descripcionLb').innerText = Inventario.descripcion;
        document.getElementById('disponibilidadLb').innerText = Inventario.disponibilidad;

    }
}
