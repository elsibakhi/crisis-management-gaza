    // دالة لفتح وإغلاق النافذة مع تأثير fade
    function toggleModal(img) {
        const modal = $("#imageModal");
        const modalImage = $("#modalImage");

        // إذا كانت النافذة ظاهرة، يتم إخفاؤها
        if (modal.is(":visible")) {
            closeModal();
        } else {
            // إذا كانت مخفية، يتم إظهارها مع تأثير fade وعرض الصورة
            modalImage.attr("src", img.src);
            modal.fadeIn();
        }
    }

    // دالة لإغلاق النافذة مع تأثير fade
    function closeModal() {
        $("#imageModal").fadeOut();
    }