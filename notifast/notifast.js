/**
 * Notifast
 * Author: Leandro Campos
 * Version: 0.2
 * License: MIT 
 * Library Github repo: 
 */
function notifast(args){

     //private variables
     let notificationTotal = 0
     let notificationsIds = []

    //notifast api
    let notifastApplication = {
        emitNotification : (props) => emitNotification(props),
        deleteAllNotifications : () => deleteAllNotifications(),
        deleteNotification: (id) => deleteNotification(id),
        getAllNotificationsId : () => getAllNotificationsId()
    }
    
    //initial functions call
    mountContainer(args.position)

    //create a div container for all notifications in document body at desired position
    function mountContainer(position){

        let containerPosition

        if(position === 'bottom-right'){
            containerPosition = 'notifast-bottom-right'
        }

        if(position === 'center'){
            containerPosition = 'notifast-center'
        }

        let notificationContainerTemplate = `<div class='notifast-container ${containerPosition}'></div>`
        
        return document.body.insertAdjacentHTML("beforeend", notificationContainerTemplate)
    }

    //emit a new notification
    function emitNotification(props){
        
        //increase notification total to generate new notification id
        notificationTotal += 1
        
        //notification object
        let notification = {
            title : props.title || '',
            id: `notifast-notification-${notificationTotal}`,
            icon: props.icon || '<i></i>',
            description: props.description || '',
            fontColor: props.fontColor || '#2266EE',
            backgroundColor: props.backgroundColor || '#FFF',
            link: props.link || '',
            soundEffect: props.soundEffect || '',
            canBeClosed: props.canBeClosed
        }

        //notification html template
        let notificationTemplate = `
            <div id='${notification.id}' class='notifast-notification' style='
            background-color: ${notification.backgroundColor};
            border: solid 1px ${notification.fontColor};
            border-left: solid 8px ${notification.fontColor};
            '>
                <a 
                href='${notification.link}' 
                target='_blank' style='color: ${notification.fontColor}'>
                    ${notification.icon}
                    <div class='notifast-notification-body'>
                        <span>${notification.title}</span>
                        <p>${notification.description}</p>
                    </div>
                </a>
            </div>
        `

        document.querySelector('.notifast-container').insertAdjacentHTML('beforeend', notificationTemplate)
        
        //check's if notification can be closed them add a close button to notification container
        
        if(notification.canBeClosed == true){
            document.querySelector(`#${notification.id}`).insertAdjacentHTML('afterbegin',`
            <i class="fas fa-times-circle notifast-notification-close-button" style='color: ${notification.fontColor}'></i>`)
            
            document.querySelector(`#${notification.id} .notifast-notification-close-button`).addEventListener('click',()=>{
                deleteNotification(notification.id)
            })
        }
        
        //create notification sound effect
        if(notification.soundEffect !== ''){
            let sfx = new Audio(`${notification.soundEffect}`)
            sfx.play()
        }

        //add the new notification id to notifications id's array
        notificationsIds.push(notification.id)
    }

    function deleteAllNotifications(){
        document.querySelector('.notifast-container').innerHTML = ''
        notificationsIds = []
    }
    
    function deleteNotification(id){
        document.querySelector(`#${id}`).remove()
        notificationsIds.splice(notificationsIds.indexOf(id), 1) 
    }

    function getAllNotificationsId(){
        return notificationsIds
    }

    return notifastApplication
}