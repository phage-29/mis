$(document).ready(function () {
    "use strict";

    /**
     * AJAX Form
     */
    $('.ajax-form').on('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Loading",
            html: "Please wait...",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "assets/components/includes/process.php",
            data: formData,
            dataType: 'json',
            success: function (response) {
                setTimeout(function () {
                    Swal.fire({
                        icon: response.status,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect
                        }
                    })
                }, 1000)
            },
            error: function (error) {
                // Handle errors here
                console.log("Error:", error);
                setTimeout(function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 750
                    }).then(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect
                        }
                    })
                }, 1000)
            },
        });
    });

    $('.enctype-form').on('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Loading",
            html: "Please wait...",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        var formData = new FormData($('.enctype-form')[0]);
        $.ajax({
            type: "POST",
            url: "assets/components/includes/process.php",
            data: formData,
            dataType: 'json',
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (response) {
                setTimeout(function () {
                    Swal.fire({
                        icon: response.status,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect
                        }
                    })
                }, 1000)
            },
            error: function (error) {
                // Handle errors here
                console.log("Error:", error);
                setTimeout(function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 750
                    }).then(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect
                        }
                    })
                }, 1000)
            },
        });
    });
});
