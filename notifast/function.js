function notification_function(title_txt, message, color)
{
    let notificationApp = notifast({position: 'bottom-right'})

    let notification = {

        title: title_txt,

        description: message,

        icon: '<i class="fas fa-bell"></i>',

        backgroundColor: '#FFF',

        //fontColor: '#0F73FA',

        fontColor: color,

        //link: 'https://youtu.be/dQw4w9WgXcQ',

        canBeClosed: true
    }
    notificationApp.emitNotification(notification)
}

