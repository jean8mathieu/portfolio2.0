class Notification {
    /**
     * Constructor of the Notification object
     *
     * @param id
     */
    constructor(id) {
        this._id = Notification.incrementId();
    }

    /**
     * This function increment the ID so we can have unique ID
     */
    static incrementId() {
        if (!this._id) {
            this._id = 1
        } else {
            this._id++;
        }
    }

    /**
     * This function populate a toast message (Notifications box) for the user to see.
     *
     * @param title
     * @param message
     * @param type
     * @param delay
     */
    static message(title, message, type, delay = null) {
        let temp = "data-autohide='false'";
        if (delay !== null && !isNaN(delay)) {
            temp = `data-delay='${delay}' data-autohide='true'`;
        }


        $('.toast-dynamic').append(`<div class="toast toast-auto-${this._id}" ${temp}>
               <div class="toast-header">
               <strong class="mr-auto text-${type}">${title}</strong>
               <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                   <span aria-hidden="true" class="close-toast">&times;</span>
               </button>
           </div>
            <div class="toast-body">
                ${message}
            </div></div>`);

        $(`.toast-auto-${this._id}`).toast('show');

        Notification.incrementId();
    }
}
