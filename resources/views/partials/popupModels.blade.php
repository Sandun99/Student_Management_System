<!DOCTYPE html>
<html lang="en">
<body class="bg-light">


<div class="modal fade" id="universalEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg rounded-4 overflow-hidden border-0">

            <div class="border-bottom px-4 py-3 d-flex justify-content-between align-items-center bg-white">
                <h5 class="modal-title fw-semibold text-dark mb-0" id="modalTitle">
                    Update Teacher
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4" id="modalBodyContent">
                <div class="text-center py-5 text-muted">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading form...</p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalEl = document.getElementById('universalEditModal');
        const modal   = new bootstrap.Modal(modalEl);
        const titleEl = document.getElementById('modalTitle');
        const bodyEl  = document.getElementById('modalBodyContent');

        document.body.addEventListener('click', e => {
            const link = e.target.closest('a[href*="/edit/"]');
            if (!link) return;

            e.preventDefault();
            const url = link.href;

            // Smart title from URL
            const segment = url.split('/').slice(-2, -1)[0];
            const niceTitle = segment
                ? segment.charAt(0).toUpperCase() + segment.slice(1) + ' Details'
                : 'Edit Record';

            titleEl.textContent = niceTitle;

            // Show loading + open modal
            bodyEl.innerHTML = `
            <div class="text-center py-5 text-muted">
                <div class="spinner-border text-primary"></div>
                <p class="mt-3">Loading form...</p>
            </div>`;
            modal.show();

            fetch(url)
                .then(r => r.text())
                .then(html => {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    const content = doc.querySelector('form, .tab-pane, .card, .container') || doc.body;
                    bodyEl.innerHTML = content.innerHTML;

                    // Re-init TomSelect
                    const select = document.getElementById('subjects-select');
                    if (select && !select.tomselect) {
                        new TomSelect(select, {
                            plugins: ['remove_button'],
                            placeholder: 'Search and select subjects...'
                        });
                    }
                })
                .catch(() => {
                    bodyEl.innerHTML = `<div class="text-center py-5 text-danger">Failed to load form.</div>`;
                });
        });
    });
</script>

</body>
</html>
