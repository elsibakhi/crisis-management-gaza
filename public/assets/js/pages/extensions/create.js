

$(document).ready(function () {
$("#modal_submit").on("click", function (event) {
    event.preventDefault();

    if ($("#modalInput").val() != "") {

        $.post(routes.admin_extensions_store,
            {
                _token:token,

                title: $("#modalInput").val(),

            },
            function (data, status) {
                    console.log(data,status)
                $("#extension_form_section").append(`
                     <div class="row">
                        <div class="col-2">

                            <span class="switch switch-icon">
                            <label>
                        <input  class="extension_checkboxes" type="checkbox"  data-target="extension${data[1]}"  />
                        <span></span>
                       ${data[2]}
                          </label>

                          </span>
                        </div>
                        <div class="col-6">
                          <input id="extension${data[1]}" type="number" min="1"  class="form-control"  placeholder="Enter the number of ${data[2]}" name="extensions[${data[1]}]" disabled  />
                                 <x-form.validation name="extensions.${data[1]}" />
                        </div>
                 </div>


                `);
                extension_enable()
                $("#modal_close").click();
                $("#modalInput").val("")
                $("#modalInput").removeClass("is-invalid")
                $("#modal_feedback").text("")
                $("#alert").text(data[0])
                $("#alert").fadeIn("fast")

                setTimeout(function () {
                    $("#alert").fadeOut("slow")
                },1000)
            });

    } else {
        $("#modalInput").addClass("is-invalid")
        $("#modal_feedback").text("The name field is required")
    }

});
});



