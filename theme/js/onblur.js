//Fixes Contact Form 7 to replace default values

function restoreText(field) {
	if (field.value == '') field.value = field.defaultValue;
}
function clearText(field) {
	if (field.defaultValue == field.value) field.value = '';
}