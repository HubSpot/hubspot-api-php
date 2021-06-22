function reloadPage() {
    document.location.reload();
}

function requestNotShownEventsCount() {
    return new Promise((resolve) => {
        $.getJSON("/ajax/events?mark=" + $('#alert-not-shown-events').attr('datetime-mark') , data => {
            const { notShownEventsCount } = data;
            resolve(notShownEventsCount);
        });
    });
}

async function displayNotShownEventsAlertIfNeed() {
    const notShownEventsCount = await requestNotShownEventsCount();
    if (notShownEventsCount > 0) {
        $('#empty-message').hide();
        $('#alert-not-shown-events').show();
    }
}

$(document).ready(async () => {
    setInterval(displayNotShownEventsAlertIfNeed, 10000);
    $('#alert-not-shown-events').click(() => {
       reloadPage();
       return false;
    });
});
