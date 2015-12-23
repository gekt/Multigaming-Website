var Popup_send_points = (function() {

    var modalOpen = document.querySelector('[data-modal="open_send_points"]'),
        modalClose = document.querySelector('[data-modal="close_send_points"]'),
        modalWrapper = document.querySelector('[data-modal="wrapper_send_points"]');

    return {
        init: function() {
            this.open();
            this.close();
        },

        open: function() {
            modalOpen.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.add("modal-opened");
            }
        },

        close: function() {
            modalClose.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.remove("modal-opened");
            }
        }
    }
}());

var Popup_vote = (function() {

    var modalOpen = document.querySelector('[data-modal="open_vote"]'),
        modalClose = document.querySelector('[data-modal="close_vote"]'),
        modalWrapper = document.querySelector('[data-modal="wrapper_vote"]');

    return {
        init: function() {
            this.open();
            this.close();
        },

        open: function() {
            modalOpen.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.add("modal-opened");
            }
        },

        close: function() {
            modalClose.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.remove("modal-opened");
            }
        }
    }
}());

var Popup_notifications = (function() {

    var modalOpen = document.querySelector('[data-modal="open_notification"]'),
        modalClose = document.querySelector('[data-modal="close_notification"]'),
        modalWrapper = document.querySelector('[data-modal="wrapper_notification"]');

    return {
        init: function() {
            this.open();
            this.close();
        },

        open: function() {
            modalOpen.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.add("modal-opened");
            }
        },

        close: function() {
            modalClose.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.remove("modal-opened");
            }
        }
    }
}());

Popup_notifications.init();
Popup_vote.init();
Popup_send_points.init();