var listId = [];
$(document).ready(function() {

    var checkFunc = function() {
        if (($(this).prop("checked") === true)) {
            listId.push($(this).val())
            $('label[for=' + $(this).attr('id') + ']').addClass("checked")
        } else {
            var res = listId.findIndex(element => element == $(this).val())
            listId.splice(res, 1)
            $('label[for=' + $(this).attr('id') + ']').removeClass("checked")
        }
    }

    $("#submitSchedule").click(function() {
        if ($("#description").val()) {
            $.ajax({
                url: "/schedule",
                type: "post",
                data: JSON.stringify({ "description": $("#description").val() }),
                contentType: "application/json",
                success: function(resp) {
                    // alert(resp.data.description)
                    $('#checklist').append(' <input type="checkbox" id="checkBox' + resp.data.id + '" value="' + resp.data.id + '" class="checkbox1"> <label for="checkBox' + resp.data.id + '">' + resp.data.description + '<br></label>')

                },
                error: function(resp) {

                }
            })
        } else {
            alert("Schedule anda tidak boleh kosong")
        }
    });
    $("#checklist").on('click', '.checkbox1', checkFunc);

    $("#deleteSchedule").click(function() {
        $.ajax({
            url: "/schedule/?id=" + listId.join(),
            type: "delete",
            contentType: "application/json",
            success: function(resp) {
                $('input:checked').each(function() {
                    $(this).remove();
                    $('label[for=' + $(this).attr('id') + ']').remove();
                });
            },
            error: function(resp) {

            }
        })
    });
});