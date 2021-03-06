$(document).ready(function () {

    window.setTopMenuSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\TopMenuSettings') {

            $('.js-project-edit-top-menu-image-filename').val(data.settings.page_elementable.image.filename);
            $('.js-project-edit-top-menu-image-filename').data('id', data.settings.page_elementable.image.id);

            $.each(data.settings.page_elementable.links, function (e, i) {

                $(".top-menu-edit-link-" + (e + 1)).val(i.url);
                $(".top-menu-edit-title-" + (e + 1)).val(i.title);
                $(".top-menu-edit-title-" + (e + 1)).data('id', i.id);

            })

        }

    }

})
