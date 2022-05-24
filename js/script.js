//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$(document).ready(function () {
    $(".confirm-delete").on("click", checkConfirm);

    function checkConfirm() {
        let id = $(this).data("id");
        alertify
            .confirm(
                "Advertencia",
                "¿Está seguro/a que quiere eliminar esta ficha?",
                function () {
                    $.ajax({
                        url: "eliminar_ficha.php",
                        method: "POST",
                        data: { id },
                        success: function (data) {
                            if (data.response == "ok") {
                                alertify.success(
                                    "Ficha eliminada correctamente"
                                );
                                $("#ficha-" + id).remove();
                            } else {
                                alertify.error("Ha ocurrido un error");
                            }
                        },
                        error: function () {
                            alertify.error("Ha ocurrido un error");
                        },
                    });
                },
                function () {}
            )
            .set("labels", { ok: "Si", cancel: "No" })
            .set("reverseButtons", true);
    }
});
