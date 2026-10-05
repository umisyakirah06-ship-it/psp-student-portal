<!-- Custom Message Modal -->

<div
    class="modal fade message-modal"
    id="messageModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header justify-content-center">

                <button
                    type="button"
                    class="btn-close position-absolute end-0 me-3"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>

            <div class="modal-body">

                <div
                    id="messageIcon"
                    class="message-icon success"
                >
                    ✓
                </div>

                <h5
                    id="messageTitle"
                    class="message-title"
                >
                    Success!
                </h5>

                <p
                    id="messageText"
                    class="message-text"
                >
                    Action completed successfully.
                </p>

                <button
                    type="button"
                    class="message-btn"
                    data-bs-dismiss="modal"
                >
                    OK
                </button>

            </div>

        </div>

    </div>
</div>


<script>

function showMessage(type, title, message) {

    const icon = document.getElementById("messageIcon");
    const titleElement = document.getElementById("messageTitle");
    const textElement = document.getElementById("messageText");

    icon.className = "message-icon " + type;

    if (type === "success") {
        icon.innerHTML = "✓";
    } else {
        icon.innerHTML = "!";
    }

    titleElement.textContent = title;
    textElement.textContent = message;

    const modalElement = document.getElementById("messageModal");

    const modal = new bootstrap.Modal(modalElement);

    modal.show();
}

</script>