let $btn = $(".add-to-cart");

$btn.on("click", function (e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("href"),
        method: "GET",
        success: function (res) {
            let $sticky = $(".sticky-message");
            let message =
                '<div class="alert alert-success">' + res["success"] + "</div>";

            $sticky.html(message);
            let $headerCart = $(".header-cart");
            $headerCart.html("Корзина (" + res["qty"] + ")");
        },
    });
});

$(".change-qty").on("change", function () {
    $(this).closest("form").submit();
});
