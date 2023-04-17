const contenedorQR = document.getElementById('contenedorQR');
const formulario = document.getElementById('formulario');

const QR = new QRCode(contenedorQR);

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
	var nombre = "Nombre: " + document.getElementById('nombre').value + "\n";
	var apellido = "Apellido: " + document.getElementById('apellido').value + "\n";
	var alias = "Alias: " + document.getElementById('alias').value + "\n";
	var celular = "Celular: " + document.getElementById('celular').value + "\n";
	var correo = "Correo: " + document.getElementById('correo').value + "\n";
	var dirrecion = "Dirrecion: " + document.getElementById('dirrecion').value + "\n";

	var totalText = nombre + apellido + alias + celular + correo + dirrecion;
	QR.makeCode(totalText);
});
