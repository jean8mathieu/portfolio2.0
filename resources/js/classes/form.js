class Form {
    /**
     * Constructor of form error
     *
     * @param id value of the form id
     */
    constructor(id) {
        let self = this;
        self._id = self.incrementId();

        self.form = $(`#${id}`);
        self.formData = new FormData(self.form[0]);
        self.formData.append("_method", self.form.attr("method"));
        self.formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
        self.formId = id;
    }

    incrementId() {
        if (!this._id) {
            this._id = 1
        } else {
            this._id++;
        }
    }

    /**
     * Send request to server
     *
     * @param redirect
     * @return boolean
     */
    sendRequest(redirect = false) {
        let self = this;
        self.clearError();
        $.ajax({
            type: "POST",
            url: self.form.attr('action'),
            data: self.formData,
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                Notification.message("Success", data.message, 'success', 2000);
                if (redirect) {
                    setTimeout(function () {
                        //window.location.href = data.redirect;
                    }, 2000);
                }
                return true;
            }, error: function (data) {
                Notification.message("Error", self.errorMessage(data), 'danger', 5000);
                return false;
            }
        });
    }

    /**
     * This function will generate the error message depending on what Laravel return
     * It will also add the error in the form
     *
     * @param request
     * @returns {string}
     */
    errorMessage(request) {
        // Parser the json response expected
        let response = JSON.parse(request.responseText);

        let errorString = "";

        //Initialize the error
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');

        // Validation error would return 422 header
        if (request.status === 422) {
            errorString += `<ul>`;
            let response = JSON.parse(request.responseText);
            $.each(response.errors, function (k, value) {
                let element = $(`[name='${k}']`);
                //Adding the error to the input field
                if (element.is(':radio')) {
                    element = $(`input[name='${k}']:checked`)
                } else {
                    if (k.includes('.')) {
                        let [array, key] = k.split('.');
                        element = $(`[name='${array}[${key}]']`);
                    } else {
                        element = $(`[name='${k}']`);
                    }

                    if (!element) {
                        element = $(`[name='${k}[]']`);
                    }
                    element.after(`<div class="invalid-feedback">${value}</div>`);
                }
                element.addClass('is-invalid');
                errorString += `<li>${value}</li>`;
            });

            $.each(response.success, function (key, value) {
                let element = $(`[name='${key}']`);
                //Adding the success to the input field
                if (element.is(':radio')) {
                    element = $(`input[name='${key}']:checked`)
                } else {
                    if (!element) {
                        element = $(`[name='${key}[]']`)
                    }
                    element.after(`<div class="valid-feedback">${value}</div>`);
                }
                element.addClass('is-valid');
            });
            errorString += '</ul>';
        } else {
            errorString += `<ul><li>${response.message}</li></ul>`;
        }

        return errorString
    }

    /**
     * Remove error class
     */
    clearError() {
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');
    }


}
