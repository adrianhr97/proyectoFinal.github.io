// Table
const updateTable = (data) => {
    var text = '<table class="table table-dark table-hover">';
    let emptyRows = 10;
    text += '<tr><td>Matricula</td><td>Fecha</td><td>Titular</td><td>Tipo</td><td>Averia</td><td>Mecanico</td></tr>';
    for (let i = 0; i < data.length; i++) {
        text += `<tr><td>${data[i][0]}</td><td>${formatDate(data[i][1])}</td><td>${data[i][2]}</td><td>${data[i][3]}</td><td>${data[i][4]}</td><td>${data[i][5]}</td></tr>`;
        emptyRows--;
    }
    for (let i = 0; i < emptyRows; i++) {
        text += `<tr><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td><td>---</td></tr>`;
    }
    text += '</table>';
    document.getElementById('panel').innerHTML = text;
}

// Date
const formatDate = (date) => {
    let fdate = new Date(date);
    return `${fdate.getDate()}-${fdate.getMonth() + 1}-${fdate.getFullYear()}`;
}

// Buscar vehiculos
const searchVehicle = () => {
    let matricula = document.getElementById('matricula').value;
    console.log(matricula);
    let data = `matricula=${matricula}`;
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = () => {
        if (ajx.readyState == 4 && ajx.status == 200) {
            //console.log(JSON.parse(ajx.responseText));
            updateTable(JSON.parse(ajx.responseText));
        }
    };
    ajx.open("POST", "database/search.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(data);
}

// Autocomplete
const updateAuto = (data) => {
    document.getElementById('titular').value = data[0][1];
    document.getElementById('tipo').value = data[0][2];
}

const autocompleteVehicle = () => {
    let matricula = document.getElementById('matriculaParte').value;
    console.log(matricula);
    let data = `matricula=${matricula}`;

    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = () => {
        if (ajx.readyState == 4 && ajx.status == 200) {
            //console.log(ajx.responseText);
            updateAuto(JSON.parse(ajx.responseText));
        }
    };
    ajx.open("POST", "database/autocomplete.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(data);
}

window.onload = searchVehicle();