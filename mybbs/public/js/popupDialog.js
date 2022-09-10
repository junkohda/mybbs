function openPopup(url, height = 0) {
    parent.$.magnificPopup.open({
        items: {
            src: url
        },
        type: "iframe",
        closeBtnInside: true,
        closeOnBgClick: false,
        enableEscapeKey: false,
        fixedContentPos: true,
    }, 0);

    if (height != 0) {
        $(".mfp-content").css("height", height + "px");
    }
}

function closePopup() {
    var popup = parent.$.magnificPopup.instance;
    parent.vm.search(1);
    popup.close();
}

function cancelPopup() {
    var popup = parent.$.magnificPopup.instance;
    popup.close();
}