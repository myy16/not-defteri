<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var TitleElements = document.querySelectorAll('[title]');
        for (var TitleElement of TitleElements) {

            var tooltip = new bootstrap.Tooltip(TitleElement);
        }

        <?php if (isset($showSuccessModal) && $showSuccessModal): ?>
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        <?php endif; ?>

    });
</script>