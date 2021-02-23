$(document).ready(function () {
//Dependency dropdown Brand name
    $('#for_Brand').on('change', function () {
        let id = $(this).val();
        console.log(id);
        $('#Brand_dropdown').empty();
        $('#Brand_dropdown').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
            type: 'GET',
            url: 'GetBrandAgainstCatagoryEdit/' + id,
            success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#Brand_dropdown').empty();
                $('#Brand_dropdown').append(`<option value="0" disabled selected>Chose Brand Name...</option>`);
                response.forEach(element => {
                    $('#Brand_dropdown').append(`<option value="${element['brId']}">${element['brName']}</option>`);
                });
            }
        });
    });
//Dependency dropdown Brand name
});