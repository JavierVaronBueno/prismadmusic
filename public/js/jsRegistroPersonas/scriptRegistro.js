$(document).ready(function () {
    $('.tipoDeCuentaBanco').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: "Selecciona un Tipo de Cuenta"
        },
    });
    $('.tipoDeCuentaBanco').val('-1').trigger('change');

    $('.tipoDNI').select2({
        allowClear: true,
        placeholder: {
            id: -1,
            text: "Selecciona un Tipo de documento de identificación"
        },
    });
    $('.tipoDNI').val('-1').trigger('change');

    $(".departamento").select2();
    $(".ciudad").select2();

    var paisSelect;
    var depSelect;
    var headers = new Headers();
    headers.append("X-CSCAPI-KEY", "V1hzYnZMbFpPbGtuYnpNSFJsazJGcXhLYVplcEF3Y1ZmZnhwUm5jNg==");

    var requestOptions = {
        method: 'GET',
        headers: headers,
        redirect: 'follow'
    };

    fetch("https://api.countrystatecity.in/v1/countries", requestOptions)
        .then(response => response.json())
        .then(data => datos = data)
        .then(() => setPaises(datos))
        .catch(error => console.log('error', error));

    $('.pais').on('select2:select', async function (e) {
        $('.departamento').val(null).empty().select2('destroy');
        $('.ciudad').val(null).empty().select2('destroy');
        $(".ciudad").select2();
        paisSelect = e.params.data;
        let nonas;
        await fetch("https://api.countrystatecity.in/v1/countries/" + e.params.data.iso2 + "/states", requestOptions)
            .then(response => response.json())
            .then(data => { datos = data; nonas = data })
            .then(() => setDepartamentos(datos))
            .catch(error => console.log('error', error));
    });
    $('.departamento').on('select2:select', async function (e) {
        $('.ciudad').val(null).empty().select2('destroy');
        depSelect = e.params.data;
        await fetch("https://api.countrystatecity.in/v1/countries/" + paisSelect.iso2 + "/states/" + e.params.data.iso2 + "/cities", requestOptions)
            .then(response => response.json())
            .then(data => datos = data)
            .then(() => setCiudades(datos))
            .catch(error => console.log('error', error));

    });
    function setPaises(text) {
        var data2 = $.map(text, function (obj) {
            obj.text = obj.text || obj.name; // replace name with the property used for the text
            obj.id = obj.text;
            return obj;
        });
        $(".pais").select2({
            allowClear: true,
            placeholder: {
                id: -1,
                text: "Selecciona un país"
            },
            data: data2
        });

        $('.pais').val('-1').trigger('change');
    }
    function setDepartamentos(text) {
        var data2 = $.map(text, function (obj) {
            obj.text = obj.text || obj.name; // replace name with the property used for the text
            obj.id = obj.text;
            return obj;
        });
        $(".departamento").select2({
            allowClear: true,
            placeholder: {
                id: -1,
                text: "Selecciona un departamento"
            },
            data: data2
        });
        $('.departamento').val('-1').trigger('change');
    }
    function setCiudades(text) {
        var data2 = $.map(text, function (obj) {
            obj.text = obj.text || obj.name; // replace name with the property used for the text
            obj.id = obj.text;
            return obj;
        });
        $(".ciudad").select2({
            allowClear: true,
            placeholder: {
                id: -1,
                text: "Selecciona una ciudad"
            },
            data: data2
        });
        $('.ciudad').val('-1').trigger('change');
    }

    const limpiar = () => {
        $select.empty();
    };
});