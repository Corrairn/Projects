/**
 * @file
 *  Основен файл за javascript обработващи функции.
 */
jQuery(document).ready(function($){
    $(document).on("click", ".edit-control", function() {
        var $parent = $(this).parent();

        var value = $parent.text();
        var type = $parent.attr("data-type");
        var id = $parent.attr("data-id");
        var name = $parent.attr("data-name");

        $parent.html("<input class='edit-input' name='" + name + "' type='" + type + "' value='" + value + "' />");
    });

    $(document).on("blur", ".edit-input", function() {
        var value = $(this).val();
        
        $(this).parent().html(value);
    });
});