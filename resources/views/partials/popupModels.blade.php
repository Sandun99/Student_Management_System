<!DOCTYPE html>
<html lang="en">
<body class="bg-light">

{{--edit model--}}
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

{{--view model--}}
<div class="modal fade" id="universalViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg rounded-4 overflow-hidden border-0">

            <div class="border-bottom px-4 py-3 d-flex justify-content-between align-items-center bg-white">
                <h5 class="modal-title fw-semibold text-dark mb-0" id="viewModalTitle">
                    View Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4" id="viewModalBodyContent">
                <div class="text-center py-5 text-muted">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading details...</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{--add new model--}}
<div class="modal fade modal-xl" id="universalCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 overflow-hidden border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-semibold" id="createModalTitle">
                     Add New Record
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="createModalBody">
                <div class="text-center py-5 text-muted">
                    <div class="spinner-border text-success"></div>
                    <p class="mt-3">Loading form...</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{--edit model script--}}
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

{{--VIEW Modal Script--}}
<script>
    document.addEventListener('click', function(e) {
        if (!e.target.closest('[data-view-url]')) return;

        e.preventDefault();
        const btn = e.target.closest('[data-view-url]');
        const url = btn.getAttribute('data-view-url');
        const title = btn.getAttribute('data-title') || 'Details';

        document.getElementById('viewModalTitle').textContent = title;
        document.getElementById('viewModalBodyContent').innerHTML = `
            <div class="text-center py-5"><div class="spinner-border text-primary"></div><p>Loading...</p></div>`;

        bootstrap.Modal.getOrCreateInstance('#universalViewModal').show();

        fetch(url)
            .then(r => r.text())
            .then(html => {
                const content = new DOMParser().parseFromString(html, 'text/html')
                    .querySelector('.row')?.innerHTML || html;
                document.getElementById('viewModalBodyContent').innerHTML = content;
            });
    });
</script>

{{--add new model--}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new bootstrap.Modal('#universalEditModal');
        const title = document.getElementById('modalTitle');
        const body = document.getElementById('modalBodyContent');

        document.body.addEventListener('click', e => {
            const btn = e.target.closest('button[data-create-url]');
            if (!btn) return;
            e.preventDefault();

            const url = btn.dataset.createUrl;
            const name = url.split('/').slice(-2,-1)[0];
            title.textContent = 'Add New ' + name[0].toUpperCase() + name.slice(1);

            body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary"></div></div>';
            modal.show();

            fetch(url + '?ajax=1')
                .then(r => r.text())
                .then(html => {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    const content = doc.querySelector('.tab-pane') || doc.querySelector('form') || doc.body;
                    body.innerHTML = content.innerHTML;

                    const select = document.getElementById('subjects-select');
                    if (select && !select.tomselect) {
                        new TomSelect(select, { plugins: ['remove_button'] });
                    }
                });
        });
    });
</script>
</body>
</html>
