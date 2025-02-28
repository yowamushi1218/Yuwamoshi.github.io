<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#projectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('title');
        var category = button.data('category');
        var imageUrl = button.css('background-image').replace('url("', '').replace('")', '');

        var modal = $(this);
        modal.find('.modal-title').text(title);
        modal.find('#modalCategory').text(category);
        modal.find('#modalImage').attr('src', imageUrl);
    });
</script>
