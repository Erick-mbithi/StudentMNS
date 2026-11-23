
<section>

    <header class="mb-4">
        <h5 class="fw-bold text-danger">Delete Account</h5>

        <p class="text-muted">
            Deleting your account is permanent. Your account access
            will be removed, so only proceed if this is genuinely necessary.
        </p>
    </header>

    <button
        type="button"
        class="btn btn-outline-danger"
        data-bs-toggle="modal"
        data-bs-target="#confirmUserDeletion">

        <i class="bi bi-trash me-2"></i>
        Delete Account

    </button>

    {{-- CONFIRMATION MODAL --}}
    <div class="modal fade" id="confirmUserDeletion" tabindex="-1"
         aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title text-danger"
                            id="confirmUserDeletionLabel">
                            Confirm Account Deletion
                        </h5>

                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <p>
                            Are you sure you want to delete your account?
                            This action cannot be undone.
                        </p>

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">
                                Enter Your Current Password
                            </label>

                            <input
                                id="delete_password"
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="Current password"
                                required
                            >

                            @error('password', 'userDeletion')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Confirm Deletion
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</section>
