document.addEventListener('click', function (event) {
    if (event.target.matches('.delete-btn')) {
        event.preventDefault();

        var route = event.target.getAttribute('data-route');
        var message = event.target.getAttribute('data-message');

        document.getElementById('message-modal').textContent = message;
        document.getElementById('delete-form').setAttribute('action', route);
    }
});

document.getElementById('delete-form').addEventListener('submit', function (e) {
    e.preventDefault();

    this.submit();

    setTimeout(() => {
        location.reload();
    }, 200);
});
