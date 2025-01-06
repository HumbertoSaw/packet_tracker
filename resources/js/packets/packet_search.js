document.getElementById('form-search').addEventListener('submit', function(e) {
    e.preventDefault();

    let packetTN = document.getElementById('tracking_number').value;

    if (!/^\d{8}$/.test(packetTN)) {
        document.getElementById('error-message').classList.remove('d-none');
        return;
    }

    document.getElementById('error-message').classList.add('d-none');

    document.getElementById('error-message').classList.add('d-none');
    document.getElementById('result-search').classList.add('d-none');
    document.getElementById('result-search-na').classList.add('d-none');

    $.ajax({
        url: '/packet/index/' + packetTN,
        type: 'GET',
        dataType: 'json',
    }).done(function (response) {
        console.log('Respuesta:', response);

        document.getElementById('result-id').textContent = response.id;
        document.getElementById('result-tracking-number').textContent = response.tracking_number;
        document.getElementById('result-description').textContent = response.description;
        document.getElementById('result-size').textContent = response.size;
        document.getElementById('result-weight').textContent = response.weight;
        document.getElementById('result-destination').textContent = response.destination;
        document.getElementById('result-status').textContent = response.status;

        document.getElementById('result-search').classList.remove('d-none');
    }).fail(function () {
        document.getElementById('result-search-na').classList.remove('d-none');
    });
});
